<?php

namespace App\Http\Livewire\Planilla;

use App\Models\asistencia;
use App\Models\empleado;
use App\Models\permisos;
use Livewire\Component;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Support\Facades\DB;
use DateTime;
use Auth;

class CrearPlanilla extends Component
{
    public function render()
    {
        return view('livewire.planilla.crear-planilla');
    }


    public function generarPlanilla()
    {
        try {
            $idUser = Auth::user()->id;
            $codigo = time();           
            $numMemo = "Prueba-06-05-2021";
            $nombre = "prueba";
            $fecha1 = new DateTime("2021-04-26");
            $fecha2 = new DateTime("2021-05-02");


            $diff = $fecha1->diff($fecha2);
            $dias = $diff->days + 1;

            $arregloDeFechas = [];

            for ($i = 0; $i < $dias; $i++) {
                $suma = strtotime('2021-04-26' . '+' . $i . ' ' . 'days');

                array_push($arregloDeFechas, ['fecha' => date("Y-m-d", $suma)]);
            }

            //------------------------------------------------------------inicio de calculo de asitencia-----------------------------------------------------------//
            //listado de empleados tomar en cuenta los que tienen contrato activo
            //solo toma los empleado de tipo empleado y con estado activo los gerentes son libre de deducciones por asistencia 
            $empleados = DB::SELECT('select empleado.id, empleado.sueldo from tipo_empleado 
            inner join cargo 
            on tipo_empleado.id = cargo.tipo_empleado_id
            inner join empleado
            on empleado.cargo_id = cargo.id
            where tipo_empleado.id = 1  and (empleado.id=3 or empleado.id=4) and empleado.estatus_id = 1'); //ojo para efectos de prueba solo estoy calculando dos empleados 3 y 4
            //---------calcula la deduccion por asistencia
            foreach ($arregloDeFechas as $dia) {
                foreach ($empleados as $empleado) {
                    $asistenciaDia = DB::SELECT('select id,date_format(entrada_fija, "%H:%i:%S") as entrada_fija,  date_format(salida_fija, "%H:%i:%S") as salida_fija from asistencia where fecha_dia = "' . $dia['fecha'] . '" and empleado_id=' . $empleado->id);

                    //calculando minuto
                    $horaInicio = strtotime($asistenciaDia[0]->entrada_fija); //inicial
                    $horaFinal = strtotime($asistenciaDia[0]->salida_fija); //final
                    $minutosTrabajados = ($horaFinal - $horaInicio) / 60;

                    //calculando minutos de permiso 

                    $permisos = DB::SELECT('select hora_inicio, hora_final FROM permisos WHERE DATE(fecha_inicio)="' . $dia['fecha'] . '" and DATE(fecha_final)="' . $dia['fecha'] . '" and tipo_gose_sueldo_id = 1 and empleado_id = ' . $empleado->id);

                    if ($permisos) {
                        $horaInicioPermiso = strtotime($permisos[0]->hora_inicio); //inicial
                        $horaFinalPermiso = strtotime($permisos[0]->hora_final); //final
                        $minutosPermiso = ($horaFinalPermiso - $horaInicioPermiso) / 60;

                        $paso = $minutosTrabajados + $minutosPermiso;

                        $minutosTrabajados = $minutosTrabajados + $minutosPermiso;
                    }

                    $valorDia =  ($empleado->sueldo / 28);
                    $valorHora = $valorDia / 8;
                    $valorMinuto = $valorHora / 60;

                    if ($minutosTrabajados >= 530) {


                        $flight = asistencia::find($asistenciaDia[0]->id);
                        $flight->monto_deduccion = '0';
                        $flight->save();
                    } else {

                        $minutosDeducir = 530 - $minutosTrabajados;
                        $montoDeducir =  $minutosDeducir * $valorMinuto;

                        $flight = asistencia::find($asistenciaDia[0]->id);
                        $flight->monto_deduccion = round($montoDeducir, 2);
                        $flight->save();
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
                select empleado.id, empleado.sueldo, tipo_empleado.id as tipo_empleado from tipo_empleado 
                inner join cargo 
                on tipo_empleado.id = cargo.tipo_empleado_id
                inner join empleado
                on empleado.cargo_id = cargo.id
                inner join contrato
                on empleado.id = contrato.empleado_id
                where  (empleado.id=3 or empleado.id=4 or empleado.id=3009 or empleado.id=3008 ) and empleado.estatus_id = 1
            ');

             foreach($empleadosGeneral as $empleado){
                 $sueldoNeto = 0;
                 $deduccionAsistenciaMonto = 0;
                 $deduccionesFijasMonto=0;
                 $deduccionesFijasVariablesMonto =0;

                 $sueldoBruto=$empleado->sueldo;

                 if($empleado->tipo_empleado==='1'){                 

                 $deduccionAsistencia = DB::SELECT("select sum(monto_deduccion) as monto from asistencia
                  where (DATE(fecha_dia) >= '2021-04-26' and DATE(fecha_dia) <= '2021-05-02' ) 
                  and empleado_id = ".$empleado->id);
                  
                  $deduccionAsistenciaMonto =  $deduccionAsistencia['monto'];


                 }

                 $deduccionesFijas = DB::SELECT("select sum(monto_deduccion) as monto
                FROM empleado_has_deducciones_fijas                
                 where empleado_has_deducciones_fijas.empleado_id = ".$empleado->id);

                 $deduccionesFijasMonto = $deduccionesFijas['monto'];


                 $deduccionesVariables = DB::SELECT("select sum(monto) as monto FROM deducciones_empleado 
                 where deducciones_empleado.empleado_id =".$empleado->id);
                 
                 $deduccionesFijasVariablesMonto = $deduccionesVariables['monto'];


                 


             };



            return response()->json($paso, 200);
        } catch (QueryException $e) {

            return response()->json([
                'error' => $e,
            ], 402);
        }
    }


    public function calcularAsistencia($empleados)
    {
        try {
            DB::beginTransaction();


            DB::commit();

            return true;
        } catch (QueryException $e) {
            DB::rollBack();
            return  false;
        }
    }
}
