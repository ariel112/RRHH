<?php

namespace App\Http\Livewire\Asistencia;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use DataTables;

class Marcaje extends Component
{
    public function render()
    {
        return view('livewire.asistencia.marcaje');
    }

    public function listar_marcaje(){

         $empleados = DB::SELECT("SELECT * FROM empleado");
         return Datatables::of($empleados)
            ->addColumn('id', function ($empleados) {
                return '<td>'.$empleados->id.'</td>';
            })
            ->addColumn('nombre', function ($empleados) {
                 return '<td>'.$empleados->nombre.'</td>';
            })
            ->addColumn('identidad', function ($empleados) {
                 return '<td>'.$empleados->identidad.'</td>';
            })
            ->addColumn('entradas', function ($empleados) {
                $fechaHoy = date("Y-m-d");
                $asistencias = DB::SELECTONE("SELECT COUNT(id) as 'conteo', fecha_dia as fecha FROM asistencia WHERE empleado_id ='.$empleados->id.' AND fecha_dia = '".$fechaHoy."' ");
                $fecha_entrada_fija = $asistencias->fecha;
                if($fecha_entrada_fija == "" and $asistencias->conteo == 0){
                    return '<td><button id="btnEntrada_Emp_'.$empleados->id.'" type="button" class="btn btn-success" onclick="marcarEntrada('.$empleados->id.')">ENTRADA</button></td>';
                }elseif($asistencias->conteo > 0){
                    if($fecha_entrada_fija === $fechaHoy){
                        return '<td><i class="fa fa-check text-success"></i></td>';
                    }else{
                        return '<td><button id="btnEntrada_Emp_'.$empleados->id.'" type="button" class="btn btn-success" onclick="marcarEntrada('.$empleados->id.')">ENTRADA</button></td>';
                    }

                }
            })
            ->addColumn('salidas', function ($empleados) {
                $fechaHoy = date("Y-m-d");
                $asistencias = DB::SELECTONE("SELECT COUNT(id) as 'conteo', fecha_dia_salida as fecha FROM asistencia WHERE empleado_id ='.$empleados->id.' AND fecha_dia_salida = '".$fechaHoy."' ");
                $fecha_salida = $asistencias->fecha;
                $nombre = $empleados->nombre;
                if($fecha_salida == "" and $asistencias->conteo == 0){
                    return '<td><button id="btnSalida_Emp_'.$empleados->id.'" type="button" class="btn btn-warning" onclick="marcarSalida('.$empleados->id.','.$nombre.')">SALIDA</button></td>';
                }elseif($asistencias->conteo > 0){
                    if($fecha_salida === $fechaHoy){
                        return '<td><i class="fa fa-check text-success"></i></td>';
                    }else{
                        return '<td><button id="btnSalida_Emp_'.$empleados->id.'" type="button" class="btn btn-warning" onclick="marcarSalida('.$empleados->id.','.$nombre.')">SALIDA</button></td>';
                    }

                }
            })
            ->editColumn('id', '{{$id}}')
            ->rawColumns(['id','nombre', 'identidad','entradas','salidas'])
            ->make(true);
    }
}
