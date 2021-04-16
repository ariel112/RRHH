<?php

namespace App\Http\Livewire\Asistencia;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Livewire\WithPagination;
use App\Models\empleado;
use Illuminate\Support\Collection;


class ListaAsistencia extends Component
{
    use WithPagination;

    public function render(Request $request)
    {
        $carbon =Carbon::now();
        $fecha = Carbon::parse($request->fecha.'-01');

        if ($request->fecha) {
            $fechaentere = $request->fecha;
            # code...
            $fin =date('t', strtotime($request->fecha));
        } else {
            $fechaentere = $carbon->format("Y-m");
            $fin =date('t', strtotime($carbon));

        }

        $anio =  $fecha->format("Y");
        $matriz = [];
        $lista_empleado = DB::select("SELECT A.empleado_id, CONCAT(B.primer_nombre, ' ', B.primer_apellido) nombre
                                        FROM asistencia A
                                        INNER JOIN empleado B
                                        ON(A.empleado_id=B.id)
                                        WHERE date_format(A.entrada, '%Y-%m')='$fechaentere'
                                        GROUP by A.empleado_id
                                        ");
        foreach ($lista_empleado as $list) {
            $dia =[];
            for ($i=1; $i <=$fin; $i++) {
                $compara = $fechaentere.'-'.$i;
                $asistencia = DB::selectone("SELECT date_format(A.entrada, '%Y-%m-%e') fecha, A.id, A.empleado_id, CONCAT(B.primer_nombre, ' ', B.primer_apellido) nombre
                                             FROM asistencia A
                                             INNER JOIN empleado B
                                             ON(A.empleado_id=B.id)
                                             WHERE A.empleado_id='$list->empleado_id' AND date_format(A.entrada, '%Y-%m-%e') = '$compara'");

                    if($asistencia && $compara === $asistencia->fecha  ){
                        array_push($dia,['fecha'=>$compara, 'id'=>$asistencia->id,'asistencia'=>'1', 'id_empleado'=>$asistencia->empleado_id]);
                    }else {
                        array_push($dia,['fecha'=>$compara, 'asistencia'=>'0', 'id_empleado'=>$list->empleado_id]);
                          }
            }

            array_push($matriz,['id_empleado'=>$list->empleado_id , 'nombre'=>$list->nombre, 'dia'=>$dia]);


        }

        /* $collection = collect($matriz);
        return view('livewire.Asistencia.lista_asistencia', [
            'fin'=> $fin,
            'matriz' =>$collection->paginate(10)]); */
        return view('livewire.Asistencia.lista_asistencia', [
            'matriz' =>$matriz,
            'fin'=> $fin
        ]);

        // return view('livewire.asistencia.lista-asistencia');
    }
}
