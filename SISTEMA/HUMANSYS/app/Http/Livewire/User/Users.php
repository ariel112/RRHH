<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\empleado;
use Illuminate\Http\Request;
use App\Models\User;
use DB;

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
}
