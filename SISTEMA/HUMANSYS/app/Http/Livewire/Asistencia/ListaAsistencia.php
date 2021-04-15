<?php

namespace App\Http\Livewire\Asistencia;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ListaAsistencia extends Component
{
    public function render(Request $request)
    {   

       

        $carbon=Carbon::now();     
        $fechaentere = $request->fecha;
        $fecha = Carbon::parse($request->fecha.'-01');
        $fin =date('t', strtotime($request->fecha));
        $anio =  $fecha->format("Y");

        $matriz = [];

        // $asistencia = DB::select("SELECT date_format(A.entrada, '%Y-%m-%e') fecha, A.id, A.empleado_id
        //                              FROM asistencia A");
        $lista_empleado = DB::select("SELECT A.empleado_id, B.nombre
                                        FROM asistencia A 
                                        INNER JOIN empleado B
                                        ON(A.empleado_id=B.id)
                                        WHERE date_format(A.entrada, '%Y-%m')='2021-04'
                                        GROUP by A.empleado_id
                                        ");
        // $lista_empleado = DB::select("SELECT A.empleado_id, B.nombre
        //                                 FROM asistencia A 
        //                                 INNER JOIN empleado B
        //                                 ON(A.empleado_id=B.id)
        //                                 WHERE date_format(A.entrada, '%Y-%m')='$request->fecha'
        //                                 GROUP by A.empleado_id
        //                                 ");

        
    
      
        foreach ($lista_empleado as $list) {  
            $dia =[];
            
            for ($i=1; $i <=$fin; $i++) { 
                $compara = '2021-04-'.$i;
                $asistencia = DB::selectone("SELECT date_format(A.entrada, '%Y-%m-%e') fecha, A.id, A.empleado_id, B.nombre
                                             FROM asistencia A 
                                             INNER JOIN empleado B
                                             ON(A.empleado_id=B.id)
                                             WHERE A.empleado_id='$list->empleado_id' AND date_format(A.entrada, '%Y-%m-%e') = '$compara'");

                    
                
                if($asistencia){
                    
                    if($compara === $asistencia->fecha ){
                       

                        array_push($dia,['fecha'=>$compara, 'id'=>$asistencia->id,'asistencia'=>'1', 'id_empleado'=>$asistencia->empleado_id]);
                    }else {
                        array_push($dia,['fecha'=>$compara, 'id'=>$asistencia->id,'asistencia'=>'0', 'id_empleado'=>$asistencia->empleado_id]);
                       
                    }
                } else {
                    array_push($dia,[ 'fecha'=>$compara, 'asistencia'=>'0',  'id_empleado'=>$list->empleado_id]);

                }

                
            }
           
            array_push($matriz,['id_empleado'=>$list->empleado_id , 'nombre'=>$list->nombre, 'dia'=>$dia]);

            // array_push( $matriz, array($dia));



        }
        // for ($i=1; $i <=$fin; $i++) { 
        //     foreach ($lista_empleado as $list) {
                
        //         // $compara = $fechaentere.'-'.$i;
        //         $compara = '2021-04-'.$i;
        //         $asistencia = DB::selectone("SELECT date_format(A.entrada, '%Y-%m-%e') fecha, A.id, A.empleado_id, B.nombre
        //                                      FROM asistencia A 
        //                                      INNER JOIN empleado B
        //                                      ON(A.empleado_id=B.id)
        //                                      WHERE A.empleado_id='$list->empleado_id' AND date_format(A.entrada, '%Y-%m-%e') = '$compara'");
        //         if($asistencia){
                    
        //             if($compara === $asistencia->fecha ){
        //                 array_push($matriz,['asistencia'=>'1', 'id'=>$asistencia->id, 'fecha'=>$compara , 'id_empleado'=>$asistencia->empleado_id , 'nombre'=>$asistencia->nombre]);
        //             }else {
        //                 array_push($matriz,['asistencia'=>'0', 'id'=>0, 'fecha'=>$compara , 'id_empleado'=>$asistencia->empleado_id, 'nombre'=>$asistencia->nombre]);
        //             }
        //         } else {
        //             array_push($matriz,['asistencia'=>'0', 'id'=>0, 'fecha'=>$compara , 'id_empleado'=>$list->empleado_id, 'nombre'=>$list->nombre]);

        //         }
        //     }
        // }



       
    

        return view('livewire.Asistencia.lista_asistencia', [
            'matriz' =>$matriz,
            'fin'=> $fin
        ]);

        // return view('livewire.asistencia.lista-asistencia');
    }
}
