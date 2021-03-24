<?php

namespace App\Http\Livewire\Permisos;

use App\Models\tipo_permiso;
use App\Models\permisos;
use App\Models\empleado;
use Auth;

use Doctrine\DBAL\Query\QueryException;
use Livewire\Component;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

            $identidadUser = Auth::user()->identidad;

            $idEmpleado = empleado::where('identidad','=',$identidadUser)
                            ->select('id')
                            ->get();

            if($request['unDia']==1){

                $permiso = new permisos;

                $permiso->tipo_permiso = $request['tipoPermisoTexto'];
                $permiso->nombre = $request['tipoPermisoTexto'];
                $permiso->estado = '3'; //pendiente
                $permiso->fecha_inicio = $request['fechaInicio'];
                $permiso->fecha_final = $request['fechaFinal'];
                $permiso->empleado_id = $idEmpleado[0]['id'];
                $permiso->tipo_permiso_id = $request['tipoPermiso'];
                $permiso->estado_permiso_jefe_id = '3';//pendiente jefe
                $permiso->estado_permiso_rrhh_id = '5';//pendiente de recursos humanos
                $permiso->hora_inicio = $request['horaInicio'];
                $permiso->hora_final = $request['horaFinal'];
                $permiso->motivo = $request['motivo'];
                $permiso->save();

                return response()->json([
                    'message' => 'Permiso enviado con exito',
                    'color' => 'success'
                ],200);



            }else{

                $permiso = new permisos;

                $permiso->tipo_permiso = $request['tipoPermisoTexto'];
                $permiso->nombre = $request['tipoPermisoTexto'];
                $permiso->estado = '3'; //pendiente
                $permiso->hora_entrada = $request['fechaInicio'];
                $permiso->hora_salida = $request['fechaFinal'];
                $permiso->empleado_id = $idEmpleado[0]['id'];
                $permiso->tipo_permiso_id = $request['tipoPermiso'];
                $permiso->estado_permiso_jefe_id = '3';//pendiente jefe
                $permiso->estado_permiso_rrhh_id = '5';//pendiente de recursos humanos
                $permiso->motivo = $request['motivo'];
              
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


    public function listarPermisosEmpleados(){

        // $permisos = permisos::join('estado_permiso','permisos.estado_permiso_jefe_id','=','estado_permiso.id')
                            
                            
        //                     ->get();


        // return datatables()->of($permisos)->toJson();

        try{

            $permisos = DB::select('
            select 
            permisos.id as idPermiso,
            permisos.nombre "nombre_permiso",
            tipo_permiso,
            tipo_permiso_id,
            permisos.fecha_inicio,
            permisos.fecha_final,
            hora_inicio,
            hora_final,
            motivo,    
            estado_permiso_jefe_id,
            estado_permiso_rrhh_id,
            empleado_rrhh_aprueba_id,
            empleado_jefe_aprueba as "empleado_jefe_aprueba_id", 
            estado_permiso.estado AS "estado_jefe_aprueba",
            (select estado_permiso.estado from estado_permiso where  estado_permiso.id = permisos.estado_permiso_rrhh_id ) as "estado_rrhh_aprueba",
            permisos.created_at "fecha_creacion",   
            IF(  permisos.empleado_jefe_aprueba IS NULL, "Aun no diponible" , (select nombre from  empleado where id = permisos.empleado_jefe_aprueba)  ) AS "nombre_jefe",
            IF( permisos.empleado_rrhh_aprueba_id IS NULL, "Aun no disponible", (select nombre from  empleado where id = permisos.empleado_rrhh_aprueba_id) ) as "nombre_rrhh"
          from permisos
          inner join estado_permiso
          on permisos.estado_permiso_jefe_id = estado_permiso.id  
          where permisos.empleado_id = 1;
            ');
    
            return datatables()->of($permisos)
            ->addColumn('acciones', function($row){
                $html = '<div class="dropdown dropdown-action">
                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_leave" onclick="editarPermiso('.$row->idPermiso.')"><i class="fa fa-pencil m-r-5"></i> Editar</a>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_approve"><i class="fa fa-trash-o m-r-5"></i> Eliminar</a>
                </div>
            </div>';
                return $html;
            })            
            ->rawColumns(['acciones'])
            ->make(true);
           


        }catch(QueryException $e){
            return response()->json(['error' => $e]);
        }

      


    }
}
