<?php

namespace App\Http\Livewire\Asistencia;

use Livewire\WithPagination;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;


class Asistencia extends Component
{
    public $searchNombre = '';
    public function render()
    {
        $fin = 30;
        return view('livewire.asistencia.asistencia',compact("fin"));
    }


    public function asistencia_matriz(Request $request){

   
        
      

    }




}
