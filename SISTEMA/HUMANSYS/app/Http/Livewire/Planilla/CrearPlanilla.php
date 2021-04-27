<?php

namespace App\Http\Livewire\Planilla;

use App\Models\asistencia;
use App\Models\empleado;
use Livewire\Component;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Support\Facades\DB;
use DateTime;
class CrearPlanilla extends Component
{
    public function render()
    {
        return view('livewire.planilla.crear-planilla');
    }


    public function generarPlanilla(){
           try{
               
           
            //     $empleados = DB::SELECT('select id from empleado where id=3 or id=4');

            //     $asistencias=[];

            //    foreach($empleados as $empleado){

            //     $dias = DB::SELECT('select * from asistencia where (fecha_dia BETWEEN "2021-04-26" AND "2021-05-02") AND (DAYOFWEEK(fecha_dia) IN (2,3,4,5,6)) and empleado_id = '.$empleado->id.'');


                


            //      array_push( $asistencias, [$dias,'idEmpleado'=>$empleado->id] );              
            
            //     }

            //     //meter en funcion

            //     $arreglo=[];

            //    foreach($asistencias as $asistenciaEmpleado){

            //     $asistenciasEmpleado = $asistenciaEmpleado[0];

            //         foreach($asistenciasEmpleado as $dia){
            //             $permiso = DB::SELECT('select * from permisos where empleado_id ='.$dia->empleado_id);
            //             array_push($arreglo, $permiso);
            //         }

                

            //    }





               
            $fecha1 = new DateTime("2021-04-26");
            $fecha2 = new DateTime("2021-05-02");
            $diff = $fecha1->diff($fecha2);
            $dias=$diff->days+1;

            $arregloDeFechas=[];

            for($i=0; $i< $dias;$i++){
                $suma = strtotime('2021-04-26'.'+'.$i.' '.'days');

                array_push($arregloDeFechas, ['fecha'=> date("Y-m-d",$suma)]);

            }


            //listado de empleados

            $empleados = DB::SELECT('select id from empleado where id=3 or id=4');

            foreach ($arregloDeFechas as $dia) {
                foreach($empleados as $empleado){
                    $asistenciaDia = DB::SELECT('select * from asistencia where fecha_dia = "'.$dia['fecha'].'" and empleado_id='.$empleado->id);

                    

                }


            }

          



               return response()->json( $asistenciaDia,200);
           }catch(QueryException $e){
               
                return response()->json([
               'error'=>$e, 
               ],402); }
           }


    public function asistencia($empleados){
                try{




                     return response()->json([],200);
                }catch(QueryException $e){
                    
                     return response()->json([
                    'error'=>$e, 
                    ],402); }
                

    
        }

    
}


