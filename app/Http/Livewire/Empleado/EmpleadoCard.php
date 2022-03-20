<?php

namespace App\Http\Livewire\Empleado;
use Livewire\WithPagination;

use Livewire\Component;
use App\Models\empleado;

class EmpleadoCard extends Component
{
    use WithPagination;

    public $searchNombre = '';
    public function render()
    {
        return view('livewire.empleado.empleado-card', [
            'empleados' => empleado::where('nombre', 'LIKE',"%$this->searchNombre%")
            ->orwhere('identidad', 'LIKE',"%$this->searchNombre%")->paginate(12)
        ]);
    }
}
