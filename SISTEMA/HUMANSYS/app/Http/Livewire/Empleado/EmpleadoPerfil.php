<?php

namespace App\Http\Livewire\Empleado;

use App\Models\User;
use Livewire\Component;
use App\Models\empleado;
use Illuminate\Http\Request;
use App\Models\direccion;
use App\Models\referencia;
use DB;
use LengthException;

class EmpleadoPerfil extends Component
{
    public $idEmpleado = '';

    public function render(Request $request)
    {
        $idCargo = 0;
        $idArea = 0;
        $empleado = empleado::where('id', '=',$request['id'])->get();

        $cargo = DB::select('select * from cargo where id = (select cargo_id from empleado where id ='.$request['id'].')');
        foreach ($cargo as $carg) {
            $idCargo = $carg->id;
        }
       $area = DB::select('select * from area WHERE id = (select area_id from cargo where id = '.$idCargo.');');
       $area = DB::select('select * from area WHERE id = (select area_id from cargo where id = '.$idCargo.');');

       foreach ($area as $ar) {
                $idArea = $ar->id;
        }

       $departamento = DB::select('select nombre from departamento WHERE id = (select departamento_id from area where id = '.$idArea.');');

       $funcion = DB::select('select * from `funciones` where cargo_id = (select id from cargo where id = '.$idCargo.');');
        return view('livewire.empleado.empleado-perfil', [
            'empleados' => $empleado,
            'direcciones' => direccion::where('empleado_id', '=', $request['id'])->get(),
            'referencias' => referencia::where('empleado_id', '=', $request['id'])->get(),
            'cargos' => $cargo,
            'areas' => $area,
            'departamentos' => $departamento,
            'funciones' => $funcion
           ]);

    }



    public function listarempleados(){

        $USERS = User::all();
        // $empleado = DB::SELECT('select * from users ');

        return $USERS;
    }
}
