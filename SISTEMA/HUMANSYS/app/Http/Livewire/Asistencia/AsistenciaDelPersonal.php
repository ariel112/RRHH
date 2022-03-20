<?php

namespace App\Http\Livewire\Asistencia;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Doctrine\DBAL\Query\QueryException;

use App\Exports\AsistenciaGeneralExport;

use Maatwebsite\Excel\Facades\Excel;

class AsistenciaDelPersonal extends Component
{
    public function render()
    {
        return view('livewire.asistencia.asistencia-del-personal');
    }




    public function obtenerAsistenciageneral(){
        try{



            $listadoAsistencia = DB::SELECT("
            select
            empleado.id as 'CODIGO_EMPLEADO',
            empleado.identidad as 'IDENTIDAD',
            empleado.nombre as 'NOMBRE',
            (select departamento.nombre from departamento inner join area ON departamento.id = area.departamento_id inner join cargo on cargo.area_id = area.id
            inner join empleado on cargo.id = empleado.cargo_id where empleado.id = CODIGO_EMPLEADO ) AS 'DEPARTAMENTO',
            asistencia.fecha_dia as 'FEECHA_DIA',
            IF(DATE_FORMAT(asistencia.entrada_real, '%H:%m:%s') IS NOT NULL , DATE_FORMAT(asistencia.entrada_real, '%H:%m:%s'), 'NO EXISTE REGISTRO') AS 'HORA_ENTRADA',
            IF(DATE_FORMAT(asistencia.salida_real, '%H:%m:%s') IS NOT NULL, DATE_FORMAT(asistencia.salida_real, '%H:%m:%s'), 'NO EXISTE REGISTRO') AS 'HORA_SALIDA',
            IF(DATE_FORMAT(asistencia.entrada_real, '%H:%m:%s') > '08:59:00',  ROUND(TIME_TO_SEC(TIMEDIFF( DATE_FORMAT(asistencia.entrada_real, '%H:%m:%s'), '08:10:59' ))/60,0), '0') as 'MINUTOS_TARDE',
            IF(DATE_FORMAT(asistencia.salida_real, '%H:%m:%s') < '17:00:00',  ROUND(TIME_TO_SEC(TIMEDIFF( '17:00:00',  DATE_FORMAT(asistencia.entrada_real, '%H:%m:%s') ))/60,0), '0') as 'MINUTOS_ANTES',
            IF(DATE_FORMAT(asistencia.salida_real, '%H:%m:%s') > '17:00:00',  ROUND(TIME_TO_SEC(TIMEDIFF(  DATE_FORMAT(asistencia.salida_real, '%H:%m:%s') ,'17:00:00' ))/60,0), '0') as 'MINUTOS_EXTRA',
            IF((SELECT TANDA_ID FROM permisos_mdia WHERE fecha_dia= asistencia.fecha_dia AND empleado_id = empleado.id) IS NOT NULL ,  IF((SELECT TANDA_ID FROM permisos_mdia WHERE fecha_dia= asistencia.fecha_dia AND empleado_id = empleado.id ) = 1, 'ENTRADA-TARDE' , 'SALIDA-TEMPRANO') , 'NO') AS 'SALIDA/ENTRADA_MEDIO_DIA',
            IF((select concat(hora_inicio,' - ',hora_final) from permisos  where estado_permiso_jefe_id = 1 and estado_permiso_rrhh_id = 4 and empleado_id = empleado.id and date(fecha_inicio)= asistencia.fecha_dia) IS NULL, 'NO', (select concat(hora_inicio,' - ',hora_final) from permisos  where estado_permiso_jefe_id = 1 and estado_permiso_rrhh_id = 4 and empleado_id = empleado.id and date(fecha_inicio)= asistencia.fecha_dia)) AS 'PERMISO_SOLICITADO'
      from asistencia
      inner join empleado
      on asistencia.empleado_id = empleado.id
      WHERE fecha_dia = DATE_FORMAT(now(),'%Y-%m-%d')");

        return datatables()->of($listadoAsistencia)->make();



        }catch(QueryException $e){

             return response()->json([
            'error'=>$e,
            ],402); }

    }


    public function asistenciaExcel(Request $request){

        try{
           // dd($request['fechaInicio']);
            $fechaIncio = $request['fechaInicio'];
            $fechaFinal = $request['fechaFinal'];

            $data =[];

            $encabezadosExcel=['CODIGO_EMPLEADO','IDENTIDAD','NOMBRE','DEPARTAMENTO','FEECHA_DIA','HORA_ENTRADA','HORA_SALIDA','MINUTOS_TARDE','MINUTOS_ANTES','MINUTOS_EXTRA','SALIDA/ENTRADA_MEDIO_DIA','PERMISO_SOLICITADO'];

            array_push($data, $encabezadosExcel);

            if($fechaIncio &&  $fechaFinal){

                $datos = DB::SELECT("
                select
            empleado.id as 'CODIGO_EMPLEADO',
            empleado.identidad as 'IDENTIDAD',
            empleado.nombre as 'NOMBRE',
            (select departamento.nombre from departamento inner join area ON departamento.id = area.departamento_id inner join cargo on cargo.area_id = area.id
            inner join empleado on cargo.id = empleado.cargo_id where empleado.id = CODIGO_EMPLEADO ) AS 'DEPARTAMENTO',
            asistencia.fecha_dia as 'FEECHA_DIA',
            IF(DATE_FORMAT(asistencia.entrada_real, '%H:%m:%s') IS NOT NULL , DATE_FORMAT(asistencia.entrada_real, '%H:%m:%s'), 'NO EXISTE REGISTRO') AS 'HORA_ENTRADA',
            IF(DATE_FORMAT(asistencia.salida_real, '%H:%m:%s') IS NOT NULL, DATE_FORMAT(asistencia.salida_real, '%H:%m:%s'), 'NO EXISTE REGISTRO') AS 'HORA_SALIDA',
            IF(DATE_FORMAT(asistencia.entrada_real, '%H:%m:%s') > '08:59:00',  ROUND(TIME_TO_SEC(TIMEDIFF( DATE_FORMAT(asistencia.entrada_real, '%H:%m:%s'), '08:10:59' ))/60,0), '0') as 'MINUTOS_TARDE',
            IF(DATE_FORMAT(asistencia.salida_real, '%H:%m:%s') < '17:00:00',  ROUND(TIME_TO_SEC(TIMEDIFF( '17:00:00',  DATE_FORMAT(asistencia.entrada_real, '%H:%m:%s') ))/60,0), '0') as 'MINUTOS_ANTES',
            IF(DATE_FORMAT(asistencia.salida_real, '%H:%m:%s') > '17:00:00',  ROUND(TIME_TO_SEC(TIMEDIFF(  DATE_FORMAT(asistencia.salida_real, '%H:%m:%s') ,'17:00:00' ))/60,0), '0') as 'MINUTOS_EXTRA',
            IF((SELECT TANDA_ID FROM permisos_mdia WHERE fecha_dia= asistencia.fecha_dia AND empleado_id = empleado.id) IS NOT NULL ,  IF((SELECT TANDA_ID FROM permisos_mdia WHERE fecha_dia= asistencia.fecha_dia AND empleado_id = empleado.id ) = 1, 'ENTRADA-TARDE' , 'SALIDA-TEMPRANO') , 'NO') AS 'SALIDA/ENTRADA_MEDIO_DIA',
            IF((select concat(hora_inicio,' - ',hora_final) from permisos  where estado_permiso_jefe_id = 1 and estado_permiso_rrhh_id = 4 and empleado_id = empleado.id and date(fecha_inicio)= asistencia.fecha_dia) IS NULL, 'NO', (select concat(hora_inicio,' - ',hora_final) from permisos  where estado_permiso_jefe_id = 1 and estado_permiso_rrhh_id = 4 and empleado_id = empleado.id and date(fecha_inicio)= asistencia.fecha_dia)) AS 'PERMISO_SOLICITADO'
      from asistencia
      inner join empleado
      on asistencia.empleado_id = empleado.id
          where fecha_dia BETWEEN '".$fechaIncio."' AND '".$fechaFinal."'
                    "
                );

                    foreach ($datos as $elemento) {

                        $arregloElemento = [];

                        for ($i = 0; $i < count($encabezadosExcel); $i++) {
                            $key = $encabezadosExcel[$i];
                            $valorEmento = $elemento->$key;
                            array_push($arregloElemento, $valorEmento);

                    }
                    array_push($data, $arregloElemento);
                }

                    //  dd($data);
                    $export = new AsistenciaGeneralExport($data);
                    return Excel::download($export, 'productos.xlsx');


            };






            $datos = DB::SELECT("
            select
            empleado.id as 'CODIGO_EMPLEADO',
            empleado.identidad as 'IDENTIDAD',
            empleado.nombre as 'NOMBRE',
            (select departamento.nombre from departamento inner join area ON departamento.id = area.departamento_id inner join cargo on cargo.area_id = area.id
            inner join empleado on cargo.id = empleado.cargo_id where empleado.id = CODIGO_EMPLEADO ) AS 'DEPARTAMENTO',
            asistencia.fecha_dia as 'FEECHA_DIA',
            IF(DATE_FORMAT(asistencia.entrada_real, '%H:%m:%s') IS NOT NULL , DATE_FORMAT(asistencia.entrada_real, '%H:%m:%s'), 'NO EXISTE REGISTRO') AS 'HORA_ENTRADA',
            IF(DATE_FORMAT(asistencia.salida_real, '%H:%m:%s') IS NOT NULL, DATE_FORMAT(asistencia.salida_real, '%H:%m:%s'), 'NO EXISTE REGISTRO') AS 'HORA_SALIDA',
            IF(DATE_FORMAT(asistencia.entrada_real, '%H:%m:%s') > '08:59:00',  ROUND(TIME_TO_SEC(TIMEDIFF( DATE_FORMAT(asistencia.entrada_real, '%H:%m:%s'), '08:10:59' ))/60,0), '0') as 'MINUTOS_TARDE',
            IF(DATE_FORMAT(asistencia.salida_real, '%H:%m:%s') < '17:00:00',  ROUND(TIME_TO_SEC(TIMEDIFF( '17:00:00',  DATE_FORMAT(asistencia.entrada_real, '%H:%m:%s') ))/60,0), '0') as 'MINUTOS_ANTES',
            IF(DATE_FORMAT(asistencia.salida_real, '%H:%m:%s') > '17:00:00',  ROUND(TIME_TO_SEC(TIMEDIFF(  DATE_FORMAT(asistencia.salida_real, '%H:%m:%s') ,'17:00:00' ))/60,0), '0') as 'MINUTOS_EXTRA',
            IF((SELECT TANDA_ID FROM permisos_mdia WHERE fecha_dia= asistencia.fecha_dia AND empleado_id = empleado.id) IS NOT NULL ,  IF((SELECT TANDA_ID FROM permisos_mdia WHERE fecha_dia= asistencia.fecha_dia AND empleado_id = empleado.id ) = 1, 'ENTRADA-TARDE' , 'SALIDA-TEMPRANO') , 'NO') AS 'SALIDA/ENTRADA_MEDIO_DIA',
            IF((select concat(hora_inicio,' - ',hora_final) from permisos  where estado_permiso_jefe_id = 1 and estado_permiso_rrhh_id = 4 and empleado_id = empleado.id and date(fecha_inicio)= asistencia.fecha_dia) IS NULL, 'NO', (select concat(hora_inicio,' - ',hora_final) from permisos  where estado_permiso_jefe_id = 1 and estado_permiso_rrhh_id = 4 and empleado_id = empleado.id and date(fecha_inicio)= asistencia.fecha_dia)) AS 'PERMISO_SOLICITADO'
      from asistencia
      inner join empleado
      on asistencia.empleado_id = empleado.id
            WHERE fecha_dia = DATE_FORMAT(NOW(),'%Y-%m-%d')


            ");

            foreach ($datos as $elemento) {

                $arregloElemento = [];

                for ($i = 0; $i < count($encabezadosExcel); $i++) {
                    $key = $encabezadosExcel[$i];
                    $valorEmento = $elemento->$key;
                    array_push($arregloElemento, $valorEmento);

            }
            array_push($data, $arregloElemento);
        }

            //  dd($data);
            $export = new AsistenciaGeneralExport($data);
            return Excel::download($export, 'productos.xlsx');


        }catch(QueryException $e){

             return response()->json([
            'error'=>$e,
            ],402); }
        }

        public function solicitarAsistenciaRangoFechas(Request $request){

            try{
                $fechaIncio = $request['fechaInicio'];
                $fechaFinal = $request['fechaFinal'];

                //dd($fechaFinal);

                $listadoAsistencia = DB::SELECT("
                select
                empleado.id as 'CODIGO_EMPLEADO',
                empleado.identidad as 'IDENTIDAD',
                empleado.nombre as 'NOMBRE',
                (select departamento.nombre from departamento inner join area ON departamento.id = area.departamento_id inner join cargo on cargo.area_id = area.id
                inner join empleado on cargo.id = empleado.cargo_id where empleado.id = CODIGO_EMPLEADO ) AS 'DEPARTAMENTO',
                asistencia.fecha_dia as 'FEECHA_DIA',
                IF(DATE_FORMAT(asistencia.entrada_real, '%H:%m:%s') IS NOT NULL , DATE_FORMAT(asistencia.entrada_real, '%H:%m:%s'), 'NO EXISTE REGISTRO') AS 'HORA_ENTRADA',
                IF(DATE_FORMAT(asistencia.salida_real, '%H:%m:%s') IS NOT NULL, DATE_FORMAT(asistencia.salida_real, '%H:%m:%s'), 'NO EXISTE REGISTRO') AS 'HORA_SALIDA',
                IF(DATE_FORMAT(asistencia.entrada_real, '%H:%m:%s') > '08:59:00',  ROUND(TIME_TO_SEC(TIMEDIFF( DATE_FORMAT(asistencia.entrada_real, '%H:%m:%s'), '08:10:59' ))/60,0), '0') as 'MINUTOS_TARDE',
                IF(DATE_FORMAT(asistencia.salida_real, '%H:%m:%s') < '17:00:00',  ROUND(TIME_TO_SEC(TIMEDIFF( '17:00:00',  DATE_FORMAT(asistencia.entrada_real, '%H:%m:%s') ))/60,0), '0') as 'MINUTOS_ANTES',
                IF(DATE_FORMAT(asistencia.salida_real, '%H:%m:%s') > '17:00:00',  ROUND(TIME_TO_SEC(TIMEDIFF(  DATE_FORMAT(asistencia.salida_real, '%H:%m:%s') ,'17:00:00' ))/60,0), '0') as 'MINUTOS_EXTRA',
                IF((SELECT TANDA_ID FROM permisos_mdia WHERE fecha_dia= asistencia.fecha_dia AND empleado_id = empleado.id) IS NOT NULL ,  IF((SELECT TANDA_ID FROM permisos_mdia WHERE fecha_dia= asistencia.fecha_dia AND empleado_id = empleado.id ) = 1, 'ENTRADA-TARDE' , 'SALIDA-TEMPRANO') , 'NO') AS 'SALIDA/ENTRADA_MEDIO_DIA',
                IF((select concat(hora_inicio,' - ',hora_final) from permisos  where estado_permiso_jefe_id = 1 and estado_permiso_rrhh_id = 4 and empleado_id = empleado.id and date(fecha_inicio)= asistencia.fecha_dia) IS NULL, 'NO', (select concat(hora_inicio,' - ',hora_final) from permisos  where estado_permiso_jefe_id = 1 and estado_permiso_rrhh_id = 4 and empleado_id = empleado.id and date(fecha_inicio)= asistencia.fecha_dia)) AS 'PERMISO_SOLICITADO'
          from asistencia
          inner join empleado
          on asistencia.empleado_id = empleado.id
                where fecha_dia BETWEEN '".$fechaIncio."' AND '".$fechaFinal."'
                ");

            return datatables()->of($listadoAsistencia)->make();



                 return response()->json([],200);
            }catch(QueryException $e){

                 return response()->json([
                'error'=>$e,
                ],402);
            }





        }





}
