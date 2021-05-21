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

        $users = DB::SELECT("select * from users");
        /* $usuarios = DB::SELECT("select *from users where identidad ='".$empleados->identidad."'");
        $empleadosUsuarios = DB::SELECT("select * from users U inner join empleados E on (E.identidad = U.identidad);"); */
         return Datatables::of($users)
            ->addColumn('nombre', function ($users) {
                $empleados = DB::SELECTONE("select * from empleado where identidad = '".$users->identidad."'");
                return '<td>'.$empleados->nombre.'</td>';
            })
            ->addColumn('identidad', function ($users) {
                $empleados = DB::SELECTONE("select * from empleado where identidad = '".$users->identidad."'");
                return '<td>'.$empleados->identidad.'</td>';
            })
            ->addColumn('nivel', function ($users) {
                $tipo_user = DB::SELECTONE("select * from tipo_user where id = '".$users->id_tipo_user."'");
                if($users->id_tipo_user == null){
                    return '<td><button type="button" class="btn btn-dangerbtn-lg disabled" tabindex="-1" role="button" aria-disabled="true">Sin asignación</button></td>';
                }else{
                    return '<td><button type="button" class="btn btn-secondary btn-lg disabled" tabindex="-1" role="button" aria-disabled="true">'.$tipo_user->nombre.'</button></td>';
                }

            })
            ->addColumn('accion', function ($users) {
                $empleados = DB::SELECTONE("select * from empleado where identidad = '".$users->identidad."'");
                return '<td><button type="button" class="btn btn-outline-primary" href="" data-toggle="modal" data-target="#modal_asignar_usuario">ASIGNAR ROL</button></td>';
            })
            ->rawColumns(['nombre', 'identidad','nivel','accion'])
            ->make(true);
    }
}
