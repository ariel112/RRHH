<?php

namespace App\Http\Livewire\Salidas;

use Livewire\Component;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalidasMedioDia extends Component
{
    public function render()
    {
        return view('livewire.salidas.salidas-medio-dia');
    }


    public function listarEmpleados(){
        try{

            $empleados = DB::SELECT("
            select 
            empleado.id,
            empleado.nombre,
            empleado.identidad,
            departamento.nombre as departamento
            from departamento
            inner join area
            on departamento.id = area.departamento_id
            inner join cargo 
            on area.id = cargo.area_id
            inner join empleado
            on empleado.cargo_id = cargo.id
            where empleado.estatus_id = 1
           
            ");

           /* return datatables()->of($empleados)
                ->addColumn('acciones', function ($row) {
                    $html = '              
                 <input class="form-check-input" type="checkbox" value="'.$row->id.'" name="empleado">
          ';
                    return $html;
                })
                ->rawColumns(['acciones'])
                ->make(true);
            */
                    //dd($empleados);
            return response()->json(["data"=>$empleados],200);
           
        }catch(QueryException $e){
            
             return response()->json([
            'message'=>$e, 
            ],402); }
        }



        public function guardarSalidas(Request $request){

            

        }
    
}
