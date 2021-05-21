<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\empleado;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use DataTables;

class Users extends Component
{
    public $searchNombre ='';
    public function render()
    {

        return view('livewire.user.users', [
            'empleados' => empleado::where('nombre', 'LIKE',"%$this->searchNombre%")->get()
        ]);
    }


    public function listar_tipos(){
        $tipo_user = DB::select("select * from tipo_user");
        return $tipo_user;
    }

    public function guardarTipoUsuario(Request $request){

        $usuarioIdentidad = DB::SELECTONE("select * from users where identidad = '".$request['empleadoIdentidad']."'");
        DB::table('users')
            ->where('id', $usuarioIdentidad->id)
            ->update(['id_tipo_user' => $request->select_tipoUser]);

        return response()->json('EXITO');
    }

    public function listar_usuarios(){
        $empleados = DB::SELECT("select * from empleado");
        $usuarios = DB::SELECT("select * from users where identidad = '".$empleados->identidad."'");
        $empleadosUsuarios = DB::SELECT("select * from users U inner join empleados E on (E.identidad = U.identidad);");
         return Datatables::of($empleados)
            ->addColumn('nombre', function ($empleados) {
                 return '<td>'.$empleados->nombre.'</td>';
            })
            ->addColumn('identidad', function ($empleados) {
                 return '<td>'.$empleados->identidad.'</td>';
            })
            ->addColumn('nivel', function ($empleados) {
                return '<td><button type="button" class="btn btn-warning">SALIDA</button></td>';

            })
            ->rawColumns(['nombre', 'identidad','nivel'])
            ->make(true);
    }
}
