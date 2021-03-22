<?php

namespace App\Http\Livewire\Contratos;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\contrato;

class Contratos extends Component
{
    public function render()
    {
        return view('livewire.contratos.contratos');
    }

    public function contrato_show(Request $request){

        $contrato = new contrato();
        $contrato->num_contrato = $request->num_contrato;
        $contrato->tipo_contrato = $request->tipo_contrato;
        $contrato->fecha_inicio = $request->fecha_inicio;
        $contrato->fecha_fin = $request->fecha_fin;
        $contrato->sueldo = $request->sueldo;
        $contrato->vacaciones = $request->vacaciones;
        $contrato->empleado_id= $request->empleado_id;
        $contrato->horarios_id = $request->horarios_id;
        $contrato->users_aprueba_id = $request->users_aprueba_id;
        $contrato->empleado_rrhh = $request->empleado_rrhh;

        $contrato->save();

        return 'EXITO';


    }
}
