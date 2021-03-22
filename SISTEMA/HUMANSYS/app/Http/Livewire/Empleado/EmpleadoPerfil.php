<?php

namespace App\Http\Livewire\Empleado;

use App\Models\User;
use Livewire\Component;
use DB;

class EmpleadoPerfil extends Component
{
    public function render()
    {
        return view('livewire.empleado.empleado-perfil');
    }

    public function listarempleados(){

        $USERS = User::all();
        // $empleado = DB::SELECT('select * from users ');

        return $USERS;
    }
}
