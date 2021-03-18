<?php

namespace App\Http\Livewire\Empleado;

use Livewire\Component;

use App\Models\User;

class EmpleadoIndex extends Component
{
    public function render()
    {
        $usuario = User::select('id')
                        ->get();
      
        return view('livewire.empleado.empleado-index', compact("usuario"));
    }

}
