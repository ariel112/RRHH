<?php

namespace App\Http\Livewire\Asistencia;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;


class Asistencia extends Component
{
    public function render()
    {
        return view('livewire.asistencia.asistencia');
    }


    public function asistencia_matriz(Request $request){

   
        $carbon=Carbon::now();     
        $fechaentere = $request->fecha;
        $fecha = Carbon::parse($request->fecha.'-01');

        $fin =date('t', strtotime($request->fecha));
       
        $anio =  $fecha->format("Y");
      

        // $asistencia = DB::select("SELECT date_format(A.entrada, '%Y-%m-%e') fecha, A.id, A.empleado_id
        //                              FROM asistencia A");
        $lista_empleado = DB::select("SELECT A.empleado_id 
                                        FROM asistencia A 
                                        WHERE date_format(A.entrada, '%Y-%m')='$request->fecha'
                                        GROUP by A.empleado_id
                                        ");
        
        
        $matriz = [];

        
        for ($i=1; $i <=$fin; $i++) { 
            foreach ($lista_empleado as $list) {
                
                $compara = $fechaentere.'-'.$i;
                $asistencia = DB::selectone("SELECT date_format(A.entrada, '%Y-%m-%e') fecha, A.id, A.empleado_id
                                             FROM asistencia A WHERE A.empleado_id='$list->empleado_id' AND date_format(A.entrada, '%Y-%m-%e') = '$compara'");
                if($asistencia){
                    
                    if($compara === $asistencia->fecha ){
                        array_push($matriz,['asistencia'=>'1', 'id'=>$asistencia->id, 'fecha'=>$compara , 'id_empleado'=>$asistencia->empleado_id]);
                    }else {
                        array_push($matriz,['asistencia'=>'0', 'id'=>0, 'fecha'=>$compara , 'id_empleado'=>$asistencia->empleado_id]);
                    }
                } else {
                    array_push($matriz,['asistencia'=>'0', 'id'=>0, 'fecha'=>$compara , 'id_empleado'=>$list->empleado_id]);

                }
            }
        }
        // for ($i=1; $i <=$fin; $i++) { 
        //     foreach ($lista_empleado as $list) {
                
        //                 foreach ($asistencia as $asis) {

        //                     $compara = $fechaentere.'-'.$i;
        //                         if($compara === $asis->fecha ){
        //                             array_push($matriz,['asistencia'=>'1', 'id'=>$asis->id, 'fecha'=>$compara , 'id_empleado'=>$asis->empleado_id]);
        //                         }else {
        //                             array_push($matriz,['asistencia'=>'0', 'id'=>0, 'fecha'=>$compara , 'id_empleado'=>$asis->empleado_id]);
        //                         }
        //                     }
        //     }
        // }

        dd($matriz);
        


        // data('t', strtotime())

    }
}
