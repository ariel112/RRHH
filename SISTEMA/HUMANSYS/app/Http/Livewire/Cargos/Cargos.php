<?php

namespace App\Http\Livewire\Cargos;

use App\Models\cargo;
use App\Models\funciones;
use Livewire\Component;
use Illuminate\Http\Request;


class Cargos extends Component
{
    public function render()
    {
        return view('livewire.cargos.cargos');
    }

    public function cargo_show(Request $request){

        $cargo = new cargo();
        $cargo->nombre = $request->cargo;
        $cargo->area_id = $request->area_id;
        $cargo->empleado_id = $request->tipo_empleado;
        $cargo->save();

        $funciones = $request->input("funciones");
        dd($funciones);
        foreach ($funciones as $fun => $val) {
          $funcion = new funciones();
          $funcion->nombre=$val;
          $funcion->cargo_id= $cargo->id;
          $funcion->save();
        }

     

        return 'EXITO';


    }
}
