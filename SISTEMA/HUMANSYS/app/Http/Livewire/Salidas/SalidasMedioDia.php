<?php

namespace App\Http\Livewire\Salidas;

use Livewire\Component;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PermisoMedioDia;
use Illuminate\Support\Facades\Auth;
use App\Models\empleado;

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

            try{
                $identidadUser = Auth::user()->identidad;
                $idEmpleado = empleado::where('identidad', '=', $identidadUser)
                ->select('id')
                ->get();



                $guardarPermiso = [];

                $fecha = $request['fecha'];
                $tanda = $request['tanda'];
                $arregloEmpleados = $request['empleados'];

                if( $tanda == 1){
                    $horaInicio = '08:00';
                    $horaFinal = '12:00';
                }else{
                    $horaInicio = '13:00';
                    $horaFinal = '17:00';

                }

                $id = $idEmpleado[0]['id'];

                foreach($arregloEmpleados as $empleado){
                   // $empleado->id;
                    array_push($guardarPermiso,['fecha_dia'=>$fecha, 'hora_inicio'=>$horaInicio,
                     'hora_final'=> $horaFinal, 'empleado_id'=>$empleado['id'],
                      'empleado_registra'=>  $id, 'tanda_id'=> $tanda]);
                      $id='4000';
                }
                DB::table('permisos_mdia')->insert($guardarPermiso);
                //dd($guardarPermiso);



                
                 return response()->json(['message'=>'guardado con exito'],200);
            }catch(QueryException $e){
                
                 return response()->json([
                'error'=>$e, 
                'message'=>'Ha ocurrido un error'
                ],402); }
        }



        
    
}
