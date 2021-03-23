<?php

namespace App\Http\Livewire\Empleado;
use Livewire\WithPagination;

use Livewire\Component;
use App\Models\empleado;

class EmpleadoCard extends Component
{
    use WithPagination;

    public $searchNombre = '';
    public $searchIdentidad = '';
    public function render()
    {
        return view('livewire.empleado.empleado-card', [
            'empleados' => empleado::where('nombre', 'LIKE',"%$this->searchNombre%")->paginate()
            /* 'empleados' => empleado::where('identidad', 'LIKE',$this->searchIdentidad)->get() */
        ]);
    }
}
