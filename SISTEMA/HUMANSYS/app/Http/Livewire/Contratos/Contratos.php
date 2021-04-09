<?php

namespace App\Http\Livewire\Contratos;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\contrato;
use App\Models\empleado;


use Auth;

class Contratos extends Component
{
    public $searchNombre ='';

    public function render()
    {
        return view('livewire.contratos.contratos', [
            'empleados' => empleado::where('nombre', 'LIKE',"%$this->searchNombre%")->get()
        ]);
    }

    public function contrato_show(Request $request){

 

        $contrato = new contrato();
        $contrato->num_contrato = $request->num_contrato;
        $contrato->num_delegacion = $request->num_delegacion;
        $contrato->tipo_contrato = $request->tipo_contrato;
        $contrato->fecha_inicio = $request->fecha_inicio;
        $contrato->fecha_fin = $request->fecha_fin;
        $contrato->sueldo = $request->sueldo;
        $contrato->vacaciones = $request->vacaciones;
        $contrato->empleado_id= $request->empleado_id;
        $contrato->horarios_id = 1;
        $contrato->users_aprueba_id = Auth::user()->id;
        $contrato->empleado_rrhh = $request->empleado_rrhh;

        $contrato->save();
 
        return response()->json('EXITO');
 

    }
}
