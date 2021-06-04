<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Http\Controllers\dataReloj;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();



        $schedule->call(


            function () {
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

            foreach($datosReloj as $datos){
               // dd($datos);
              $idEmpleado =  DB::connection('mysql')->SELECT("select id from empleado where identidad ='".$datos->identidad."';");
              /* dd($idEmpleado); */
              $id = $idEmpleado[0]->id;
              /* dd($id); */
              $cuentaExistencia = DB::connection('mysql')->SELECT("select * from asistencia where fecha_dia = '".$hoy."' and empleado_id = '".$id."';");

             /*  dd($cuentaExistencia); */
              if(!$cuentaExistencia){

                /* dd($id); */
                DB::connection('mysql')->table('asistencia')
                ->insert([
                    ['entrada_real' => $datos->hora_entrada_real,
                    'entrada_fija' => $datos->entrada_fija,
                    'fecha_dia' => $datos->fecha_dia,
                    'empleado_id' => $id , 'created_at' => $now->format('Y-m-d H:i:s')]
                ]);
              }
            }
         })->everyMinute();



         $schedule->call(

            function(){
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

                    foreach($datosReloj as $datos){
                        // dd($datos);
                       $idEmpleado =  DB::connection('mysql')->SELECT("select id from empleado where identidad ='".$datos->identidad."';");
                       /* dd($idEmpleado); */
                       $id = $idEmpleado[0]->id;
                       /* dd($id); */
                       $cuentaExistencia = DB::connection('mysql')->SELECT("select  id from asistencia where fecha_dia = '".$hoy."' and empleado_id = '".$id."' and salida_fija is null ;");

                       /* dd($id_asistencia); */
                       if($cuentaExistencia){
                        $id_asistencia = $cuentaExistencia[0]->id;
                         /* dd($id); */
                         DB::connection('mysql')->table('asistencia')
                        ->where('id',"=" ,$id_asistencia)
                        ->update(['salida_real' => $datos->hora_salida_real, 'salida_fija' => $datos->salida_fija, 'fecha_dia_salida' => $datos->fecha_dia_salida, 'updated_at' => $now->format('Y-m-d H:i:s')]);
                       }/* else{

                       } */
                     }



            }
         )->cron('12 11 * * *');







    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
