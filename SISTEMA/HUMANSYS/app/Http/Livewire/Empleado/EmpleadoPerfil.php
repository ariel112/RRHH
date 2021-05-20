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
use App\Models\tipo_deducciones_variables;
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
       $area = DB::select('select * from area  WHERE id = (select area_id from cargo where id = '.$idCargo.');');
       /* $area = DB::select('select * from area WHERE id = (select area_id from cargo where id = '.$idCargo.');'); */

       foreach ($area as $ar) {
                $idArea = $ar->id;
        }

       $departamento = DB::select('select nombre,id from departamento WHERE id = (select departamento_id from area where id = '.$idArea.');');

       $funcion = DB::select('select * from `funciones` where cargo_id = (select id from cargo where id = '.$idCargo.');');

       $deducciones_emps = DB::select('select * from `tipo_deducciones_variables` t INNER JOIN deducciones_empleado  d on d.tipo_deducciones_varibale_id = t.id where empleado_id = '.$request['id'].'');

       /* foreach ($deducciones_emps as $deduc) {
            $id_tipo_deducciones_varibale = $deduc->tipo_deducciones_varibale_id;
        }

        $TipoDeduccionesVariables = DB::SELECT('select * from `tipo_deducciones_varibale` where id = '.$id_tipo_deducciones_varibale.';'); */

        $deducciones_fijas = DB::select('select * from deducciones where estatus = 1 ;');
        $empleado_has_deducciones = DB::select('select * from empleado_has_deducciones_fijas where empleado_id = '.$request['id'].' ;');

        $direcciones = DB::selectone('select * from direccion where empleado_id = '.$request['id'].';');

        return view('livewire.empleado.empleado-perfil', [
            'empleados' => $empleado,
            'direcciones' => direccion::where('empleado_id', '=', $request['id'])->get(),
            /* 'direcciones' => $direcciones, */
            'referencias' => referencia::where('empleado_id', '=', $request['id'])->get(),
            /* 'deducciones_emps' => deducciones_empleado::where('empleado_id', '=', $request['id'])->get(), */
            /* 'tipoDeducVariable' => $TipoDeduccionesVariables, */
            'deducciones_emps' => $deducciones_emps,
            'cargos' => $cargo,
            'areas' => $area,
            'departamentos' => $departamento,
            'funciones' => $funcion,
            'deducciones' => $deducciones_fijas,
            'empleado_has_deducciones' => $empleado_has_deducciones
           ]);

    }



    public function listarempleados(){
        $USERS = User::all();
        // $empleado = DB::SELECT('select * from users ');

        return $USERS;
    }
}
