<?php

namespace App\Http\Livewire\Planilla;

use App\Models\asistencia;
use App\Models\empleado;
use Livewire\Component;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Support\Facades\DB;

class CrearPlanilla extends Component
{
    public function render()
    {
        return view('livewire.planilla.crear-planilla');
    }


    public function generarPlanilla(){
           try{
               
                $empleados = DB::SELECT('select id from empleado where id=3 or id=4');

                $asistencias=[];

               foreach($empleados as $empleado){

                $dias = DB::SELECT('select * from asistencia where (fecha_dia BETWEEN "2021-04-26" AND "2021-05-02") AND (DAYOFWEEK(fecha_dia) IN (2,3,4,5,6)) and empleado_id = '.$empleado->id.'');

                


                 array_push( $asistencias, [$dias,'idEmpleado'=>$empleado->id] );              
            
                }

                





               



                return response()->json(['empleado'=> $asistencias],200);
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


