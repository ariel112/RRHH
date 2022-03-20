<?php

namespace App\Http\Livewire\Planilla;

use Livewire\Component;
use DataTables;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PlanillaExport;
use App\Models\asistencia;
use App\Models\planilla;
use App\Models\pagos;
use App\Models\empleado;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Http\Request;
use DateTime;
use Auth;
use App\Models\notas;
use PDF;
class HistoricoPlanilla extends Component
{
    public function render(){
        return view('livewire.planilla.historico-planilla');
    }

    public function tbl_planilla(){
        $planillas = DB::SELECT("SELECT * FROM planilla");

         return Datatables::of($planillas)
            ->addColumn('id', function ($planillas) {
                return '<td>'.$planillas->id.'</td>';
            })
            ->addColumn('codigo', function ($planillas) {
                 return '<td>'.$planillas->codigo_unico.'</td>';
            })
            ->addColumn('numero-memo', function ($planillas) {
                 return '<td>'.$planillas->numero_memo.'</td>';
            })
            ->addColumn('encargado', function ($planillas) {
                return '<td>'.$planillas->nombre.'</td>';
            })
            ->addColumn('identidad', function ($planillas) {
                return '<td>'.$planillas->identidad.'</td>';
           })
           ->addColumn('inicio', function ($planillas) {
            return '<td>'.$planillas->fecha_inicio.'</td>';
           })
           ->addColumn('finalizacion', function ($planillas) {
            return '<td>'.$planillas->fecha_final.'</td>';
           })
           ->addColumn('empleado_id', function ($planillas) {
            return '<td>'.$planillas->empleado_genera_id.'</td>';
           })
           ->addColumn('total_pagado', function ($planillas) {
            return '<td>'.$planillas->total_pago_planilla.'</td>';
           })
           ->addColumn('se_genero', function ($planillas) {
            return '<td>'.$planillas->created_at.'</td>';
            })
            ->addColumn('acciones', function ($planillas) {


                    return '<div class="dropdown dropdown-action text-right">
                         <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                         <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#" onclick ="abrirModalNotas('.$planillas->id.')"><i style="color:#EA964F;" class="fa fa-pencil m-r-5 text-warning"></i> Añadir Notas</a>
                            <a class="dropdown-item" href="#" onclick ="mostrarNotasPlanilla('.$planillas->id.')"><i style="color:#6F2FB0;" class="fa fa-eye m-r-5"></i> Ver Notas</a>
                            <a class="dropdown-item" href="/planilla/comprobacion/'.$planillas->id.'"><i style="color:#43CC62;"  class="fa fa-file-excel"></i> Formato de comprobación</a>
                            <a class="dropdown-item" href="#" onclick ="descargarPlanilla('.$planillas->id.')"><i style="color:#43CC62;"  class="fa fa-file-excel"></i>  Ver EXCEL</a>
                            <a class="dropdown-item" href="/planilla/generate-pdf_planilla/'.$planillas->id.'" ><i style="color:#DF0C0C ;"  class="fa fa-file-pdf"></i> Ver PDF</a>

                         </div>
                        </div>';

            })
            ->rawColumns(['id','codigo', 'numero-memo','encargado','identidad','inicio', 'finalizacion','empleado_id','total_pagado','se_genero','acciones'])
            ->make(true);
    }

    public function descarga_planilla($idPlanilla){
        try {//generacion de excel
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

    public function agregarNotas(Request $request){
        $notas = $request->input("funciones");

        foreach ($notas as $not=> $val) {

          $nota = new notas();
          $nota->descripcion= $val;
          $nota->planilla_id = $request['idPlanilla'];
          $nota->save();
        }



        return response()->json('EXITO');
    }

    public function getNotas($idPlanilla){
        $notas = DB::SELECT("select * from notas where planilla_id = ".$idPlanilla);
        return response()->json($notas);
    }

    public function eliminar_notas($id){

        $id_data=$id;
        notas::destroy($id);
        return response()->json($id_data);

    }

    public function editarNotas(Request $request){

        try {
            /* return response()->json($request); */
            /* dd($request); */
            DB::table('notas')->where('planilla_id', '=', $request->idPlanilla_edit)->delete();
            $notas = $request->input("funciones_edit");
            $notasViejas = $request->input("funciones_editar");
            if($notasViejas){
                foreach ($notasViejas as $notv=> $valu) {

                    $notav = new notas();
                    $notav->descripcion= $valu;
                    $notav->planilla_id = $request['idPlanilla_edit'];
                    $notav->save();
                }
            }
            if($notas){
                foreach ($notas as $not=> $val) {

                    $nota = new notas();
                    $nota->descripcion= $val;
                    $nota->planilla_id = $request['idPlanilla_edit'];
                    $nota->save();
                }
            }


            return response()->json('éxito');
        } catch (QueryException $e) {
            DB::rollback();
            return response()->json([
                'error' => $e,
            ], 402);
        }
    }

    public function generatePDF_planilla($idPlanilla){
        $data = [];
        $encabezadosExcel = [];
                $deduccionesFijasCadena = "";
                $deduccionesVariablesCadena = "";


                $listaDeduccionesFija = DB::SELECT("select id,  UPPER(REPLACE(NOMBRE,' ','_')) as NOMBRE  from deducciones");
                $listarDeduccionesVariables = DB::SELECT("select id,  UPPER(REPLACE(NOMBRE,' ','_')) as NOMBRE from tipo_deducciones_variables");



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
                $deducciones_totales = DB::SELECTONE("select
                SUM(pagos.sueldo_neto) as sueldos_netos,
                SUM(pagos.catorcena) as sueldos_catorcenales,
                SUM(pagos.total_deducciones) as total_deducciones,
                SUM(pagos.llegadas_tarde_monto) as total_llegadas_tarde,
                SUM(pagos.ajuste_salarial) as total_ajuste
                from pagos where pagos.planilla_id = '".$idPlanilla."'");
                $notas = DB::SELECT("select * from notas where planilla_id = '".$idPlanilla."'");
                $planilla = DB::SELECTONE("select date_format(fecha_inicio, '%m') AS mes,date_format(fecha_inicio, '%d') AS dia, date_format(fecha_final, '%m') AS mesf, date_format(fecha_final, '%d') AS diaf from planilla where id = '".$idPlanilla."'");
                $gerente = DB::SELECTONE("select nombre from empleado where cargo_id = 74;");

                $mes_inicia = '';
                $mes_finaliza = '';
                $meses = [
                    '01' => 'ENERO',
                    '02' => 'FEBRERO',
                    '03' => 'MARZO',
                    '04' => 'ABRIL',
                    '05' => 'MAYO',
                    '06' => 'JUNIO',
                    '07' => 'JULIO',
                    '08' => 'AGOSTO',
                    '09' => 'SEPTIEMBRE',
                    '10' => 'OCTUBRE',
                    '11' => 'NOVIEMBRE',
                    '12' => 'DICIEMBRE'
                ];
                foreach($meses as $key => $val){
                    if($planilla->mes == $key){
                        $mes_inicia = $val;
                    }

                    if($planilla->mesf == $key){
                        $mes_finaliza = $val;
                    }
                }
      /*  if($planilla->mesf==01)
        $mes_finaliza='ENERO';
       if($planilla->mesf==02)
        $mes_finaliza='FEBRERO';
       if($planilla->mesf==03)
        $mes_finaliza='MARZO';
       if($planilla->mesf==04)
        $mes_finaliza='ABRIL';
       if($planilla->mesf==05)
        $mes_finaliza='MAYO';
       if($planilla->mesf==06)
        $mes_finaliza='JUNIO';
       if($planilla->mesf==07)
        $mes_finaliza='JULIO';
       if($planilla->mesf==8)
        $mes_finaliza='AGOSTO';
       if($planilla->mesf==9)
        $mes_finaliza='SEPTIEMBRE';
       if($planilla->mesf==10)
        $mes_finaliza='OCTUBRE';
       if($planilla->mesf==11)
        $mes_finaliza='NOVIEMBRE';
       if($planilla->mesf==12)
        $mes_finaliza='DICIEMBRE';

        if($planilla->mes==01)
         $mes_inicia='ENERO';
        if($planilla->mes==02)
         $mes_inicia='FEBRERO';
        if($planilla->mes==03)
         $mes_inicia='MARZO';
        if($planilla->mes==04)
         $mes_inicia='ABRIL';
        if($planilla->mes==05)
         $mes_inicia='Mayo';
        if($planilla->mes==06)
         $mes_inicia='JUNIO';
        if($planilla->mes==07)
         $mes_inicia='JULIO';
        if($planilla->mes==8)
         $mes_inicia='AGOSTO';
        if($planilla->mes==9)
         $mes_inicia='SEPTIEMBRE';
        if($planilla->mes==10)
         $mes_inicia='OCTUBRE';
        if($planilla->mes==11)
         $mes_inicia='NOVIEMBRE';
        if($planilla->mes==12)
         $mes_inicia='DICIEMBRE'; */

                /* dd($data); */
        $pdf = PDF::loadView('pdf/planilla_pdf_', compact('data', 'notas', 'deducciones_totales', 'planilla','gerente', 'mes_inicia', 'mes_finaliza') )->setPaper('legal', 'landscape');

        //stream para vizualizar y no descargar de un sólo
        return $pdf->stream('VOUCHER DE.pdf');
    }

    public function formato_comprobacion($idPlanilla){
        $data =[];

            $encabezadosExcel=['BANCO','NOMBRE','PAGO'];

            array_push($data, $encabezadosExcel);
            $datos = DB::SELECT("select bancos.nombre as 'BANCO', empleado.nombre as 'NOMBRE', empleado.sueldo as 'PAGO'
            from empleado
            inner join bancos on (empleado.bancos_id = bancos.id)
            inner join pagos on (pagos.empleado_id = empleado.id)
            where pagos.planilla_id = '".$idPlanilla."'");
        foreach ($datos as $elemento) {

            $arregloElemento = [];

            for ($i = 0; $i < count($encabezadosExcel); $i++) {
                $key = $encabezadosExcel[$i];
                $valorEmento = $elemento->$key;
                array_push($arregloElemento, $valorEmento);

            }
            array_push($data, $arregloElemento);
        }

        $export = new PlanillaExport($data);
        return Excel::download($export, 'formato_comprobacion.xlsx');
    }
}
