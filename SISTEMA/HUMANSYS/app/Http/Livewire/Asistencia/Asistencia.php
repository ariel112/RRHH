<?php

namespace App\Http\Livewire\Asistencia;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class Asistencia extends Component
{
    public function render()
    {
        return view('livewire.asistencia.asistencia');
    }


    public function asistencia_matriz(Request $request){

        // $request->fecha;

        // data('t', strtotime())

    }
}
