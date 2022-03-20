<?php

namespace App\Http\Livewire\Planilla;



use Livewire\Component;
use Illuminate\Http\Request;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PlanillaExport;
use App\Models\asistencia;
use App\Models\planilla;
use App\Models\pagos;
use App\Models\empleado;

use DateTime;
use Auth;

class CrearPlanilla extends Component
{
    public function render()
    {
        return view('livewire.planilla.crear-planilla');
    }


    public function generarPlanilla(Request $request)
    {
        //dd($request['nombre']);
        try {
            $fechaInicio = $request['fechaInicio'];
            $fechaFin = $request['fechaFin'];
            $nombrePlanilla = $request['nombre'];


           /* $validador = $this->verficiarFechas($fechaInicio, $fechaFin);

            if ($validador) {
                return response()->json([
                    "message" => 'Rango de fechas invalido',
                    "icon" => "error"
                ], 402);
            }*/

            DB::beginTransaction();


            //-------------------datos persona que genera planilla----------------//


            //$idUser = Auth::user()->id;
            $identidad = Auth::user()->identidad;
            $codigoUnico = time();



            $empleadoGenera = DB::SELECT('select id, nombre from empleado where identidad =' . $identidad);
            $datosEmpleadoGenera = $empleadoGenera[0]; //el primer elemento





            $numMemo = $request['nombre'];

            $fecha1 = new DateTime($fechaInicio);
            $fecha2 = new DateTime($fechaFin);


            $diff = $fecha1->diff($fecha2);
            $dias = $diff->days + 1;

            $arregloDeFechas = [];


            //arreglo de fechas se exeptuan los sabados y domingos
            for ($i = 0; $i < $dias; $i++) {
                $suma = strtotime($fechaInicio . '+' . $i . ' ' . 'days');
                $fecha = date("Y-m-d", $suma);

                $diaSemana = date("N", strtotime($fecha));

                if ($diaSemana !== "6" && $diaSemana !== "7") { //estoy excluyendo sabado(6) y domingo(7)
                    array_push($arregloDeFechas, ['fecha' => $fecha]);
                }
            }




            //------------------------------------------------------------inicio de calculo de asitencia-----------------------------------------------------------//
            //listado de empleados tomar en cuenta los que tienen contrato activo
            //solo toma los empleado de tipo empleado y con estado activo los gerentes son libre de deducciones por asistencia
            $empleados = DB::SELECT('select

            empleado.id,
            contrato.sueldo

            from tipo_empleado
            inner join cargo
            on tipo_empleado.id = cargo.tipo_empleado_id
            inner join empleado
            on empleado.cargo_id = cargo.id
            inner join contrato
            on empleado.id = contrato.empleado_id
            where tipo_empleado.id = 1

            and empleado.estatus_id = 1 and contrato.estatus_id=1'); 

            //---------calcula la deduccion por asistencia


            foreach ($arregloDeFechas as $dia) {//por cada verifico todos los empleados
                foreach ($empleados as $empleado) {

                    $verificarAsistencia = DB::SELECT('
                    select
                    id
                    from
                    asistencia
                    where fecha_dia = "' . $dia['fecha'] . '" and empleado_id=' . $empleado->id);

                    if (!$verificarAsistencia) { //si no existe asistencia para ese dia, se crea con valores nulos para registrar y descontar ese dia o posiblemente tenga un permiso
                        $inasistencia = new asistencia;
                        $inasistencia->fecha_dia =  $dia['fecha'];
                        $inasistencia->empleado_id =  $empleado->id;
                        $inasistencia->save();
                    }


                    $asistenciaDia = DB::SELECT('
                    select  id,
                        IF(salida_fija is NULL or entrada_fija is NULL, 0 , date_format(entrada_fija, "%H:%i:%S")) as entrada_fija,
                        IF(salida_fija is NULL or entrada_fija is NULL, 0 , date_format(salida_fija, "%H:%i:%S")) as salida_fija
                     from
                     asistencia where fecha_dia = "' . $dia['fecha'] . '" and empleado_id=' . $empleado->id);




                    //calculando minuto
                    $horaInicio = strtotime($asistenciaDia[0]->entrada_fija); //inicial
                    $horaFinal = strtotime($asistenciaDia[0]->salida_fija); //final
                    $minutosTrabajados = ($horaFinal - $horaInicio) / 60;

                    /* DD($minutosTrabajados); */

                    //calculando minutos de permiso

                    $permisos = DB::SELECT('
                    select
                        hora_inicio, hora_final
                    FROM permisos p
                    	INNER JOIN tipo_permiso tp on (tp.id = p.tipo_permiso_id)
                        WHERE DATE(fecha_inicio)="' . $dia['fecha'] . '" and
                        DATE(fecha_final)="' . $dia['fecha'] . '" and
                        tp.tipo_gose_sueldo_id = 1 and empleado_id =' . $empleado->id);



                    if ($permisos) {
                        $horaInicioPermiso = strtotime($permisos[0]->hora_inicio); //inicial
                        $horaFinalPermiso = strtotime($permisos[0]->hora_final); //final
                        $minutosPermiso = ($horaFinalPermiso - $horaInicioPermiso) / 60;

                        // $paso = $minutosTrabajados + $minutosPermiso;

                        $minutosTrabajados = $minutosTrabajados + $minutosPermiso;
                    }

                    //FIN calculando minutos de permiso


//------------------------------------------------------------------------------------------------//

                    // CALCULO DE MINUTOS ENTRADA O SALIDA DE MEDIO DIA

                        $permisos_mdia = DB::SELECT('
                        select
                            hora_inicio, hora_final
                        FROM permisos_mdia
                                WHERE DATE(fecha_dia)="' . $dia['fecha'] . '" and empleado_id = ' . $empleado->id);

                        if ($permisos_mdia) {
                            $horaInicioPermiso_mdia = strtotime($permisos_mdia[0]->hora_inicio); //inicial
                            $horaFinalPermiso_mdia = strtotime($permisos_mdia[0]->hora_final); //final
                            $minutosPermiso_mdia = ($horaFinalPermiso_mdia - $horaInicioPermiso_mdia) / 60;
                            $minutosTrabajados = $minutosTrabajados + $minutosPermiso_mdia;
                        }

                    // FIN CALCULO DE MINUTOS ENTRADA O SALIDA DE MEDIO DIA


//------------------------------------------------------------------------------------------------//

                    // CALCULO DE MINUTOS ENTRADA O SALIDA DE FERIADOS
                        $feriado = DB::SELECT('
                        select
                            hora_inicio, hora_fin
                        FROM feriado
                                WHERE DATE(fecha_dia)="' . $dia['fecha'] . '" and estatus_id = 1');

                        if ($feriado) {
                            $horaInicio_feriado = strtotime($feriado[0]->hora_inicio); //inicial
                            $horaFinal_feriado = strtotime($feriado[0]->hora_fin); //final
                            $minutos_feriado = ($horaFinal_feriado - $horaInicio_feriado) / 60;
                            $minutosTrabajados = $minutosTrabajados + $minutos_feriado;
                        }

                    // FIN CALCULO DE MINUTOS ENTRADA O SALIDA DE FERIADOS




                    $valorDia =  ($empleado->sueldo / 28);
                    $valorHora = $valorDia / 8;
                    $valorMinuto = $valorHora / 60;

                    if ($minutosTrabajados >= 530) {


                        $asistenciaN = asistencia::find($asistenciaDia[0]->id);
                        $asistenciaN->monto_deduccion = '0';
                        $asistenciaN->minutos_tarde = '0';
                        $asistenciaN->save();
                    } else {

                        $minutosDeducir = 530 - $minutosTrabajados;
                        $montoDeducir =  $minutosDeducir * $valorMinuto;

                        $asistencia = asistencia::find($asistenciaDia[0]->id);
                        $asistencia->monto_deduccion = round($montoDeducir, 2);
                        $asistencia->minutos_tarde = $minutosDeducir;
                        $asistencia->save();
                    }
                }
            }

            //--------------------------------fin del calculo de asitencia---------------------------------------------------/



            //-------------------------------------inicio de calculo de ducciones-----------------------------------------/


            //consultar todos los empleados incluyendo gerentes
            // mediante if verificar si es empleado o gerente
            // si no es gerente restarle llegadas tarde --- select sum(monto_deduccion) from asistencia where (DATE(fecha_dia) > "2021-04-26" and DATE(fecha_dia) < "2021-05-02" ) and empleado_id = 3

            // $horaInicio = strtotime("08:00:00");//inicial
            // $horaFinal = strtotime("17:00:00");//final
            // $minutosTrabajados = ($horaFinal-$horaInicio)/60;


            //esta consulta obtiene los empleados y gerentes activos; Con su tipo de empleado, 1 es empleado y 2 es gerente
            $empleadosGeneral = DB::SELECT('
            select
                empleado.id,
                empleado.identidad,
                contrato.sueldo,
                empleado.nombre,
                tipo_empleado.id as tipo_empleado,
                contrato.sueldo as sueldoContrato
            from
                tipo_empleado
                inner join cargo
                on tipo_empleado.id = cargo.tipo_empleado_id
                inner join empleado
                on empleado.cargo_id = cargo.id
                inner join contrato
                on empleado.id = contrato.empleado_id
                where
                empleado.estatus_id = 1 and contrato.estatus_id=1
            ');


            //se crea la planilla
            $planilla = new planilla;
            $planilla->codigo_unico = $codigoUnico;
            $planilla->numero_memo = $numMemo;
            $planilla->nombre = $datosEmpleadoGenera->nombre; //nombre de quien la creo
            $planilla->fecha_inicio = $fechaInicio;
            $planilla->fecha_final = $fechaFin;
            $planilla->identidad =  $identidad;
            $planilla->empleado_genera_id =   $datosEmpleadoGenera->id;
            $planilla->save();
            $idPlanilla = $planilla->id; //recupero el id de la planilla


            //pagos de empleados

            foreach ($empleadosGeneral as $empleado) {
                $sueldoBruto = 0;
                $sueldoNeto = 0;
                $totalDeducciones = 0;
                $deduccionAsistenciaMonto = 0;
                $deduccionesFijasMonto = 0;
                $deduccionesVariablesMonto = 0;
                $deducionesFijas = [];
                $deduccioneVariables = [];



                if ($empleado->tipo_empleado == '1') {

                    $deduccionAsistencia = DB::SELECT('
                    select sum(monto_deduccion) as monto
                    from asistencia
                    where (DATE(fecha_dia) >= "' . $fechaInicio . '"and
                    DATE(fecha_dia) <= "' . $fechaFin . '" )  and
                    DAYOFWEEK(fecha_dia) IN (2,3,4,5,6) and
                    empleado_id = ' . $empleado->id);

                    $deduccionAsistenciaMonto =  $deduccionAsistencia[0]->monto;
                    // dd($deduccionAsistenciaMonto);

                }
                //MONTOS
                $deduccionesFijas = DB::SELECT("select sum(monto_deduccion) as monto
                FROM empleado_has_deducciones_fijas
                 where empleado_has_deducciones_fijas.empleado_id = " . $empleado->id);

                $deduccionesFijasMonto = $deduccionesFijas[0]->monto;


                //VARIABLES
                $deduccionesVariables = DB::SELECT("select sum(monto) as monto FROM deducciones_empleado
                 where deducciones_empleado.estado = 1 and deducciones_empleado.empleado_id =" . $empleado->id);

                $deduccionesVariablesMonto =  $deduccionesVariables[0]->monto;

                $totalDeducciones =  $deduccionAsistenciaMonto + $deduccionesFijasMonto + $deduccionesVariablesMonto;
                $sueldoBruto = $empleado->sueldoContrato; //revisar eso
                $catorcena =  ($sueldoBruto / 2);
                $sueldoNeto =  $catorcena -  $totalDeducciones;

                $pagos = new pagos;
                $pagos->sueldo_mensual =  $sueldoBruto;
                $pagos->catorcena =  $catorcena;
                $pagos->total_deducciones =  $totalDeducciones;
                $pagos->sueldo_neto  =  $sueldoNeto;
                $pagos->empleado_id = $empleado->id;
                $pagos->identidad = $empleado->identidad;
                $pagos->planilla_id = $idPlanilla;
                $pagos->llegadas_tarde_monto = $deduccionAsistenciaMonto;
                $pagos->nombre_empleado = $empleado->nombre;
                $pagos->save();
                $idPago =  $pagos->id;

                //actualiza el sueldo neto del empleado
                $empleadoActualizar = empleado::find($empleado->id);
                $empleadoActualizar->sueldo =  $sueldoNeto;
                $empleadoActualizar->save();



                $detalleDeduccionesFijas = DB::SELECT(
                    '
                select
                deducciones.id as deduccion_fija_id,
                deducciones.nombre as nombre_deduccion,
                edf.monto_deduccion as monto

                from
                deducciones inner join empleado_has_deducciones_fijas edf
                on deducciones.id = edf.deducciones_id
                where edf.empleado_id=' . $empleado->id
                );

                $detalleDeduccionVariable = DB::SELECT(
                    '
                select
                A.id,
                A.nombre,
                B.monto
                from
                tipo_deducciones_variables A inner join deducciones_empleado B
                on A.id = B.tipo_deducciones_varibale_id
                where B.estado = 1 and B.empleado_id =' . $empleado->id
                );

                foreach ($detalleDeduccionesFijas as $deduccionfija) {
                    array_push($deducionesFijas, [
                        'deduccion_fija_id' => $deduccionfija->deduccion_fija_id,
                        'nombre_deduccion' => $deduccionfija->nombre_deduccion,
                        'monto' => $deduccionfija->monto,
                        'pagos_id' => $idPago,

                    ]);
                };


                foreach ($detalleDeduccionVariable as $deduccionVariable) {
                    array_push($deduccioneVariables, [
                        'deduccion_variable_id' => $deduccionVariable->id,
                        'nombre_deduccion' => $deduccionVariable->nombre,
                        'monto' => $deduccionVariable->monto,
                        'pagos_id' => $idPago,

                    ]);
                }



                DB::table('pagos_deducciones_fijas')->insert($deducionesFijas);
                DB::table('pagos_deducciones_variables')->insert($deduccioneVariables);
            };


            $totalPlanilla = DB::SELECT('select sum(sueldo_neto) As totalPlanilla from pagos  where planilla_id = ' . $idPlanilla);

            $montoPlanilla = planilla::find($idPlanilla);
            $montoPlanilla->total_pago_planilla =  $totalPlanilla[0]->totalPlanilla;
            $montoPlanilla->save();

            //---listar deducciones fijas---//





            DB::commit();

            //generacion de excel
            $encabezadosExcel = [];
            $deduccionesFijasCadena = "";
            $deduccionesVariablesCadena = "";


            $listaDeduccionesFija = DB::SELECT("select id,  UPPER(REPLACE(NOMBRE,' ','_')) as NOMBRE  from deducciones");
            $listarDeduccionesVariables = DB::SELECT("select id,  UPPER(REPLACE(NOMBRE,' ','_')) as NOMBRE from tipo_deducciones_variables");

            $data = [];

            $encabezadosInicio = ["IDENTIDAD", "NOMBRE_EMPLEADO", "FECHA_INGRESO", "CARGO", "SUELDO_MENSUAL", "CATORCENA"];
            $encabezadosFin = ["LLEGADAS_TARDE_MONTO", "TOTAL_DEDUCCIONES", "SUELDO_NETO"];


            foreach ($listaDeduccionesFija as $elemento) {
                array_push($encabezadosInicio, $elemento->NOMBRE);

                $deduccionesFijasCadena = $deduccionesFijasCadena . "(select A.monto from pagos_deducciones_fijas A
                where A.pagos_id = pagos.id and A.deduccion_fija_id=" . $elemento->id . " ) as '" . $elemento->NOMBRE . "',";
            }

            foreach ($listarDeduccionesVariables as $elemento) {
                array_push($encabezadosInicio, $elemento->NOMBRE);
                $deduccionesVariablesCadena = $deduccionesVariablesCadena . "(select B.monto from pagos_deducciones_variables B
                 where B.pagos_id = pagos.id and B.deduccion_variable_id=" . $elemento->id . ") as '" . $elemento->NOMBRE . "',";
            }

            $encabezadosExcel = array_merge($encabezadosInicio, $encabezadosFin);
            array_push($data, $encabezadosExcel);

            //----consulta en partes--------//
            $parte1 = '
            select
                pagos.identidad AS IDENTIDAD,
                pagos.nombre_empleado AS NOMBRE_EMPLEADO,
                (select DATE_FORMAT(fecha_ingreso,"%d-%m-%Y") from empleado where id=pagos.empleado_id) as "FECHA_INGRESO",
                (select cargo.nombre from empleado inner join cargo ON cargo.id = empleado.cargo_id where empleado.id = pagos.empleado_id) as CARGO,
                pagos.sueldo_mensual as SUELDO_MENSUAL,
                pagos.catorcena as CATORCENA,';

            $parte2 = $deduccionesFijasCadena . $deduccionesVariablesCadena;

            $parte3 = '
             pagos.llegadas_tarde_monto as LLEGADAS_TARDE_MONTO,
             pagos.total_deducciones as TOTAL_DEDUCCIONES,
             pagos.sueldo_neto as SUELDO_NETO

           from
             pagos
           where planilla_id='.$idPlanilla;

            $tt = $parte1 . $parte2 . $parte3;

            $pp = DB::select($tt);

            foreach ($pp as $elemento) {
                $arregloElemento = [];

                for ($i = 0; $i < count($encabezadosExcel); $i++) {
                    $key = $encabezadosExcel[$i];
                    $valorEmento = $elemento->$key;
                    if ($valorEmento) {
                        array_push($arregloElemento, $valorEmento);
                    } else {
                        array_push($arregloElemento, "0");
                    }
                }

                array_push($data, $arregloElemento);
            }

            //  dd($data);
            $export = new PlanillaExport($data);
            return Excel::download($export, 'productos.xlsx');


            // return response()->json(["message" => "La planilla ha sido creada con exito."], 200);
        } catch (QueryException $e) {
            DB::rollback();
            return response()->json([
                'error' => $e,
                'message' => "Ha ocurrido un error, por favor intente de nuevo."
            ], 402);
        }
    }


    public function generarPlanillaSinDeducciones()
    {
        try {

            return response()->json([], 200);
        } catch (QueryException $e) {

            return response()->json([
                'error' => $e,
            ], 402);
        }
    }

    public function generarSinDeducciones(Request $request)
    {
        try {
            $numMemo = $request['nombre'];
            $fechaInicio = $request['fechaInicio'];
            $fechaFin = $request['fechaFin'];

            $validador = $this->verficiarFechas($fechaInicio, $fechaFin);

            if ($validador) {
                return response()->json([
                    "message" => 'Rango de fechas invalido',
                    "icon" => "error"
                ], 402);
            }
            DB::beginTransaction();



            $identidad = Auth::user()->identidad;
            $codigoUnico = time();

            $empleados = DB::SELECT("select

                    empleado.id,
                    empleado.identidad,
                    empleado.nombre,
                    contrato.sueldo


                    from
                    empleado inner join contrato  on
                    empleado.id = contrato.empleado_id
                    where empleado.estatus_id = 1 and contrato.estatus_id=1
                    ");

            $empleadoGenera = DB::SELECT('select id, nombre from empleado where identidad =' . $identidad);
            $datosEmpleadoGenera = $empleadoGenera[0]; //el primer elemento



            $planilla = new planilla;
            $planilla->codigo_unico = $codigoUnico;
            $planilla->numero_memo = $numMemo;
            $planilla->nombre = $datosEmpleadoGenera->nombre; //nombre de quien la creo
            $planilla->fecha_inicio = $fechaInicio;
            $planilla->fecha_final = $fechaFin;
            $planilla->identidad =  $identidad;
            $planilla->empleado_genera_id =   $datosEmpleadoGenera->id;
            $planilla->save();
            $idPlanilla = $planilla->id; //recupero el id de la planilla

            foreach ($empleados as $empleado) {
                $pagos = new pagos;

                $sueldo = $empleado->sueldo;
                $catorcena =  $sueldo / 2;

                $pagos->sueldo_mensual =  $empleado->sueldo;
                $pagos->catorcena =  $catorcena;
                $pagos->total_deducciones =  0;
                $pagos->sueldo_neto =   $catorcena;
                $pagos->empleado_id = $empleado->id;
                $pagos->identidad = $empleado->identidad;
                $pagos->planilla_id = $idPlanilla;
                $pagos->llegadas_tarde_monto = 0;
                $pagos->nombre_empleado = $empleado->nombre;
                $pagos->save();
            }



            DB::commit();

            //generacion de excel
            $encabezadosExcel = [];
            $deduccionesFijasCadena = "";
            $deduccionesVariablesCadena = "";


            $listaDeduccionesFija = DB::SELECT("select id,  UPPER(REPLACE(NOMBRE,' ','_')) as NOMBRE  from deducciones");
            $listarDeduccionesVariables = DB::SELECT("select id,  UPPER(REPLACE(NOMBRE,' ','_')) as NOMBRE from tipo_deducciones_variables");

            $data = [];

            $encabezadosInicio = ["IDENTIDAD", "NOMBRE_EMPLEADO", "FECHA_INGRESO", "CARGO", "SUELDO_MENSUAL", "CATORCENA"];
            $encabezadosFin = ["LLEGADAS_TARDE_MONTO", "TOTAL_DEDUCCIONES", "SUELDO_NETO", "BANCO"];


            foreach ($listaDeduccionesFija as $elemento) {
                array_push($encabezadosInicio, $elemento->NOMBRE);

                $deduccionesFijasCadena = $deduccionesFijasCadena . "(select A.monto from pagos_deducciones_fijas A
                where A.pagos_id = pagos.id and A.deduccion_fija_id=" . $elemento->id . " ) as '" . $elemento->NOMBRE . "',";
            }

            foreach ($listarDeduccionesVariables as $elemento) {
                array_push($encabezadosInicio, $elemento->NOMBRE);
                $deduccionesVariablesCadena = $deduccionesVariablesCadena . "(select B.monto from pagos_deducciones_variables B
                 where B.pagos_id = pagos.id and B.deduccion_variable_id=" . $elemento->id . ") as '" . $elemento->NOMBRE . "',";
            }

            $encabezadosExcel = array_merge($encabezadosInicio, $encabezadosFin);
            array_push($data, $encabezadosExcel);

            //----consulta en partes--------//
            $parte1 = '
            select
                pagos.identidad AS IDENTIDAD,
                pagos.nombre_empleado AS NOMBRE_EMPLEADO,
                (select DATE_FORMAT(fecha_ingreso,"%d-%m-%Y") from empleado where id=pagos.empleado_id) as "FECHA_INGRESO",
                (select cargo.nombre from empleado inner join cargo ON cargo.id = empleado.cargo_id where empleado.id = pagos.empleado_id) as CARGO,
                pagos.sueldo_mensual as SUELDO_MENSUAL,
                pagos.catorcena as CATORCENA,';

            $parte2 = $deduccionesFijasCadena . $deduccionesVariablesCadena;

            $parte3 = '
            pagos.llegadas_tarde_monto as LLEGADAS_TARDE_MONTO,
            pagos.total_deducciones as TOTAL_DEDUCCIONES,
            pagos.sueldo_neto as SUELDO_NETO,
            bancos.nombre as BANCO

        from
            pagos
            inner join empleado on (pagos.empleado_id = empleado.id)
            inner join bancos on (empleado.bancos_id = bancos.id)
        where planilla_id='.$idPlanilla;

            $tt = $parte1 . $parte2 . $parte3;

            $pp = DB::select($tt);

            foreach ($pp as $elemento) {
                $arregloElemento = [];

                for ($i = 0; $i < count($encabezadosExcel); $i++) {
                    $key = $encabezadosExcel[$i];
                    $valorEmento = $elemento->$key;
                    if ($valorEmento) {
                        array_push($arregloElemento, $valorEmento);
                    } else {
                        array_push($arregloElemento, "0");
                    }
                }

                array_push($data, $arregloElemento);
            }

            //  dd($data);
            $export = new PlanillaExport($data);
            return Excel::download($export, 'productos.xlsx');
        } catch (QueryException $e) {
            DB::rollback();
            return response()->json([
                'error' => $e,
            ], 402);
        }
    }


    public function verficiarFechas($fechaInicio, $fechaFinal)
    {
        try {

            $verificar = DB::SELECT(
                "
                            select
                        id
                        from planilla
                        where
                        (DATE(fecha_inicio) between '" . $fechaInicio . "' and '" . $fechaFinal . "' ) or
                        (DATE(fecha_final) between '" . $fechaInicio . "' and '" . $fechaFinal . "' )

                            "
            );

            if ($verificar) {
                return true;
            } else {
                return false;
            }
        } catch (QueryException $e) {

            return response()->json([
                'error' => $e,
            ], 402);
        }
    }
}
