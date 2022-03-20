<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class dataReloj extends Controller
{
    public function getData(){


        /* $datosReloj = DB::connection('sqlsrv')->SELECT("
            select Userinfo.Duty, Checkinout.CheckTime from Checkinout inner join Userinfo
            on Checkinout.Userid = Userinfo.Userid
            where Checkinout.CheckType=0
            ");*/
        $now = new \DateTime();
        $hoy = date('Y-m-d');

        $datosReloj = DB::connection('sqlsrv')->SELECT("select
            Userinfo.Duty as identidad, Checkinout.CheckTime as hora_entrada_real,
			IIF(FORMAT(Checkinout.CheckTime, 'HH:mm:s') < '08:10:00',CONCAT(FORMAT(Checkinout.CheckTime, 'yyyy-MM-dd'),' 08:10:00'),Checkinout.CheckTime) as entrada_fija,
            FORMAT(Checkinout.CheckTime, 'yyyy-MM-dd ') as fecha_dia
            from Checkinout inner join Userinfo
            on Userinfo.Userid = Checkinout.Userid
            where CheckType = 0
            and Userinfo.Duty is not null
            and Userinfo.Duty <>''
            and FORMAT(Checkinout.CheckTime, 'yyyy-MM-dd ') = FORMAT(getDate() , 'yyyy-MM-dd ')
            order by Checkinout.CheckTime ASC ;");



        foreach ($datosReloj as $datos) {
            // dd($datos);
            $idEmpleado =  DB::connection('mysql')->SELECT("select id from empleado where identidad ='" . $datos->identidad . "';");
            /* dd($idEmpleado); */

            if ($idEmpleado) {

                $id = $idEmpleado[0]->id;
                /* dd($id); */
                $cuentaExistencia = DB::connection('mysql')->SELECT("select * from asistencia where fecha_dia = '" . $hoy . "' and empleado_id = '" . $id . "';");

                /*  dd($cuentaExistencia); */
                if (!$cuentaExistencia) {

                    /* dd($id); */
                    DB::connection('mysql')->table('asistencia')
                        ->insert([
                            [
                                'entrada_real' => $datos->hora_entrada_real,
                                'entrada_fija' => $datos->entrada_fija,
                                'fecha_dia' => $datos->fecha_dia,
                                'empleado_id' => $id, 'created_at' => $now->format('Y-m-d H:i:s')
                            ]
                        ]);
                }/* else{ } */
            }
        }


        /*   $datosPlanilla = DB::connection('mysql')->SELECT('select * from empleado'); */

        // print_r($datosPlanilla); // ctrl + u

        /* dd( $idEmpleado); */



    }

    public function setData(){
        $now = new \DateTime();
        /* dd($now->format('Y-m-d')); */
        $hoy = date('Y-m-d');
        /* dd($hoy->format('m-d')); */
        $datosReloj = DB::connection('sqlsrv')->SELECT("select
            Userinfo.Duty as identidad, Checkinout.CheckTime as hora_salida_real,
			IIF(
			    FORMAT(Checkinout.CheckTime, 'HH:mm:s') < '17:00:00',
				Checkinout.CheckTime ,
				CONCAT(
				      FORMAT(Checkinout.CheckTime, 'yyyy-MM-dd'),' 17:00:00'
					)
			) as salida_fija,
            FORMAT(Checkinout.CheckTime, 'yyyy-MM-dd ') as fecha_dia_salida
            from Checkinout inner join Userinfo
            on Userinfo.Userid = Checkinout.Userid
            where CheckType = 1
            and Userinfo.Duty is not null
            and Userinfo.Duty <>''
            and FORMAT(Checkinout.CheckTime, 'yyyy-MM-dd ') = FORMAT(getDate() , 'yyyy-MM-dd ')
            order by Checkinout.CheckTime ASC ;");

        foreach ($datosReloj as $datos) {
            // dd($datos);
            $idEmpleado =  DB::connection('mysql')->SELECT("select id from empleado where identidad ='" . $datos->identidad . "';");
            /* dd($idEmpleado); */
            if ($idEmpleado) {
                $id = $idEmpleado[0]->id;
                /* dd($id); */
                $cuentaExistencia = DB::connection('mysql')->SELECT("select  id from asistencia where fecha_dia = '" . $hoy . "' and empleado_id = '" . $id . "' and salida_fija is null ;");

                /* dd($id_asistencia); */
                if ($cuentaExistencia) {
                    $id_asistencia = $cuentaExistencia[0]->id;
                    /* dd($id); */
                    DB::connection('mysql')->table('asistencia')
                        ->where('id', "=", $id_asistencia)
                        ->update(['salida_real' => $datos->hora_salida_real, 'salida_fija' => $datos->salida_fija, 'fecha_dia_salida' => $datos->fecha_dia_salida, 'updated_at' => $now->format('Y-m-d H:i:s')]);
                }/* else{

               } */
            }
        }
    }

    public function asistencia_fecha(){
        $now = new \DateTime();
        $fecha = '2021-07-07';
        /* esta es la fecha especifica de sqlsrv para mysql */
        $asistencia_fecha = DB::connection('sqlsrv')->SELECT("select
        Userinfo.Duty as identidad, Checkinout.CheckTime as hora_entrada_real,
        IIF(FORMAT(Checkinout.CheckTime, 'HH:mm:s') < '08:10:00',CONCAT(FORMAT(Checkinout.CheckTime, 'yyyy-MM-dd'),' 08:10:00'),Checkinout.CheckTime) as entrada_fija,
        FORMAT(Checkinout.CheckTime, 'yyyy-MM-dd ') as fecha_dia
        from Checkinout inner join Userinfo
        on Userinfo.Userid = Checkinout.Userid
        where CheckType = 0
        and Userinfo.Duty is not null
        and Userinfo.Duty <>''
        and FORMAT(Checkinout.CheckTime, 'yyyy-MM-dd ') = '".$fecha."'
        order by Checkinout.CheckTime ASC ;");

        foreach ($asistencia_fecha as $datos) {
            // dd($datos);
            $idEmpleado =  DB::connection('mysql')->SELECT("select id from empleado where identidad ='" . $datos->identidad . "';");
            /* dd($idEmpleado); */

            if ($idEmpleado) {

                $id = $idEmpleado[0]->id;
                /* dd($id); */
                $cuentaExistencia = DB::connection('mysql')->SELECT("select * from asistencia where fecha_dia = '" . $fecha . "' and empleado_id = '" . $id . "';");

                /*  dd($cuentaExistencia); */
                if (!$cuentaExistencia) {

                    /* dd($id); */
                    DB::connection('mysql')->table('asistencia')
                        ->insert([
                            [
                                'entrada_real' => $datos->hora_entrada_real,
                                'entrada_fija' => $datos->entrada_fija,
                                'fecha_dia' => $datos->fecha_dia,
                                'empleado_id' => $id, 'created_at' => $now->format('Y-m-d H:i:s')
                            ]
                        ]);
                }/* else{ } */
            }
        }
    }

}
