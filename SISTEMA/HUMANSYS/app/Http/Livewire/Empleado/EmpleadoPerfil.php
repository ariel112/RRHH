<?php

namespace App\Http\Livewire\Empleado;

use App\Models\User;
use Livewire\Component;
use App\Models\empleado;
use Illuminate\Http\Request;
use DB;


class EmpleadoPerfil extends Component
{
    public $idEmpleado = '7';
    public function render(Request $rquest)
    {


        return view('livewire.empleado.empleado-perfil', [
            'empleados' => empleado::where('id', 'LIKE',$rquest['id'])->get()
        ]);

    }


    public function listarempleados(){

        $USERS = User::all();
        // $empleado = DB::SELECT('select * from users ');

        return $USERS;
    }
}
