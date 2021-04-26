<?php

namespace App\Http\Livewire\Planilla;
use App\Models\empleado;
use Livewire\Component;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Support\Facades\DB;

class CrearPlanilla extends Component
{
    public function render()
    {
        return view('livewire.planilla.crear-planilla');
    }


    public function generarPlanilla(){
           try{
               
                $empleados = DB::SELECT('select id from empleado');

                return response()->json(['empleado'=> $empleados],200);
           }catch(QueryException $e){
               
                return response()->json([
               'error'=>$e, 
               ],402); }
           }


    
}
