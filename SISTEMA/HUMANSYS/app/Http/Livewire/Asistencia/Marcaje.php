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
                $fechaHoy = new \DateTime();
                $fechaHoy->format('Y-m-d H:i:s');
                $asistencias = DB::SELECT("SELECT COUNT(entrada) FROM asistencia WHERE empleado_id = '.$empleados->id.' ");
                if($asistencias == 0){
                    return '<td><button id="btnEntrada_Emp_'.$empleados->id.'" type="button" class="btn btn-success" onclick="marcarEntrada('.$empleados->id.')">ENTRADA</button></td>';
                }else{
                    return '<td>Prueba</td>';
                }
            })
            ->addColumn('salidas', function ($empleados) {
            return '<td><button id="btnSalida_Emp_'.$empleados->id.'" type="button" class="btn btn-warning" onclick="marcarSalida('.$empleados->id.')">SALIDA</button></td>';
            })
            ->editColumn('id', '{{$id}}')
            ->rawColumns(['id','nombre', 'identidad','entradas','salidas'])
            ->make(true);
    }
}