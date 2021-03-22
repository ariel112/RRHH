<?php

namespace App\Http\Livewire\Permisos;

use App\Models\tipo_permiso;
use App\Models\permisos;
use Auth;

use Doctrine\DBAL\Query\QueryException;
use Livewire\Component;

use Illuminate\Http\Request;
class PermisosEmpleados extends Component
{
    public function render()
    {
        return view('livewire.permisos.permisos-empleados');
    }


    public function obtenerPermisos(){
            try{

                $tipos = tipo_permiso::all();

                return response()->json([
                    'tipos' => $tipos,

                ]);


            }catch(QueryException $e){
                   
                return response()->json([
                    'message' => 'Ha ocurrido un error al obtener los tipos de permisos',
                    'error' => $e,
                ]);


            }
    }


    public function guardarPermiso(Request $request){
        try{

            $idUser = Auth::user()->id;

            if($request['unDia']==1){

                $permiso = new permisos;

                $permiso->tipo_permiso = $request['tipoPermisoTexto'];
                $permiso->estado = '3'; //pendiente
                $permiso->hora_entrada = $request['fechaInicio'];
                $permiso->hora_salida = $request['fechaFinal'];
                $permiso->empleado_id = $idUser;
                $permiso->tipo_permiso_id = $request['tipoPermiso'];
                $permiso->estado_permiso = '3';//pendiente
                $permiso->hora_inicio = $request['horaInicio'];
                $permiso->hora_final = $request['horaFinal'];
                $permiso->save();

                return response()->json([
                    'message' => 'Permiso enviado con exito',
                    'color' => 'success'
                ],200);



            }else{

                $permiso = new permisos;

                $permiso->tipo_permiso = $request['tipoPermiso'];
                $permiso->estado = '3'; //pendiente
                $permiso->hora_entrada = $request['fechaInicio'];
                $permiso->hora_salida = $request['fechaFinal'];
                $permiso->empleado_id = $idUser;
                $permiso->tipo_permiso_id = $request['tipoPermiso'];
                $permiso->estado_permiso = '3';//pendiente
              
                $permiso->save();

                return response()->json([
                    'message' => 'Permiso enviado con exito',
                    'color' => 'success'
                ],200);

            }

         



        }catch(QueryException $e){

            return response()->json([
                'message' => 'Ha ocurrido un error, favor intente de nuevo.',
                'color' => 'error',
                'err' => $e
            ],404);


        }
    }
}
