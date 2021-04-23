<?php

namespace App\Http\Livewire\Empleado;

use App\Models\User;
use Livewire\Component;
use App\Models\empleado;
use Illuminate\Http\Request;
use App\Models\direccion;
use App\Models\referencia;
use App\Models\deducciones_empleado;
use DB;
use App\Models\tipo_deducciones_varibale;
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

       $deducciones_emps = DB::select('select * from `deducciones_empleado` where empleado_id = '.$request['id'].'');
       foreach ($deducciones_emps as $deduc) {
        $idtipo_deducciones_varibale = $deduc->tipo_deducciones_varibale_id;
        }
        return view('livewire.empleado.empleado-perfil', [
            'empleados' => $empleado,
            'direcciones' => direccion::where('empleado_id', '=', $request['id'])->get(),
            'referencias' => referencia::where('empleado_id', '=', $request['id'])->get(),
            /* 'deducciones_emps' => deducciones_empleado::where('empleado_id', '=', $request['id'])->get(), */
            'tipoDeducVariable' => tipo_deducciones_varibale::where('id', '=', $idtipo_deducciones_varibale)->get(),
            'deducciones_emps' => $deducciones_emps,
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
