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
         /* $deducciones = DB::SELECT("select * from deducciones"); */
         $empleados = DB::SELECT("SELECT * FROM empleado");
         /* select D.nombre, T.rango_inicio, T.rango_final, T.porcentaje from deducciones D
         inner join techos T on (D.id = T.deducciones_id) ; */
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
                return '<td><button id="btnEntrada_Emp_'.$empleados->id.'" type="button" class="btn btn-success" onclick="marcarEntrada('.$empleados->id.')">ENTRADA</button></td>';
            })
            ->addColumn('salidas', function ($empleados) {
            return '<td><button id="btnSalida_Emp_'.$empleados->id.'" type="button" class="btn btn-warning" onclick="marcarSalida('.$empleados->id.')">SALIDA</button></td>';
            })
            ->editColumn('id', '{{$id}}')
            ->rawColumns(['id','nombre', 'identidad','entradas','salidas'])
            ->make(true);
    }
}
