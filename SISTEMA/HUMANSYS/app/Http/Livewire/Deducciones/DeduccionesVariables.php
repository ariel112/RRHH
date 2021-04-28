<?php

namespace App\Http\Livewire\Deducciones;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use DataTables;

class DeduccionesVariables extends Component
{
    public function render()
    {
        return view('livewire.deducciones.deducciones-variables');
    }

    public function listar_deducciones_variables(){
        $deducVariables = DB::SELECT("SELECT * FROM tipo_deducciones_varibale");
         return Datatables::of($deducVariables)
            ->addColumn('id', function ($deducVariables) {
                return '<td>'.$deducVariables->id.'</td>';
            })
            ->addColumn('nombre', function ($deducVariables) {
                 return '<td>'.$deducVariables->nombre.'</td>';
            })->editColumn('id', '{{$id}}')
            ->rawColumns(['id','nombre'])
            ->make(true);
    }
}
