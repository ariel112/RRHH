<?php

namespace App\Http\Livewire\Permisos;

use App\Models\tipo_permiso;
use App\Models\permisos;
use App\Models\empleado;
use Auth;
use DateTime;
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


    public function obtenerPermisos()
    {
        try {

            $tipos = tipo_permiso::all();

            return response()->json([
                'tipos' => $tipos,

            ],200);
        } catch (QueryException $e) {

            return response()->json([
                'message' => 'Ha ocurrido un error al obtener los tipos de permisos',
                'error' => $e,
            ],402);
        }
    }


    public function guardarPermiso(Request $request)
    {
        try {

            $identidadUser = Auth::user()->identidad;

            $idEmpleado = empleado::where('identidad', '=', $identidadUser)
                ->select('id')
                ->get();

            if ($request['unDia'] == 1) {

                $permiso = new permisos;

                
               
                $permiso->estado = '3'; //pendiente
                $permiso->fecha_inicio = $request['fechaInicio'];
                $permiso->fecha_final = $request['fechaInicio'];
                $permiso->fecha_inicio_aprobada = $request['fechaInicio'];
                $permiso->fecha_final_aprobada = $request['fechaFinal'];
                $permiso->empleado_id = $idEmpleado[0]['id'];
                $permiso->tipo_permiso_id = $request['tipoPermiso'];
                $permiso->estado_permiso_jefe_id = '3'; //pendiente jefe
                $permiso->estado_permiso_rrhh_id = '5'; //pendiente de recursos humanos
                $permiso->hora_inicio = $request['horaInicio'];
                $permiso->hora_final = $request['horaFinal'];
                $permiso->motivo = $request['motivo'];
                $permiso->save();

                return response()->json([
                    'message' => 'Permiso enviado con exito',
                    'color' => 'success'
                ], 200);
            } else {

                $fecha1 = new DateTime($request['fechaInicio']);//fecha inicio
                $fecha2 = new DateTime($request['fechaFinal']);//fecha final
                $diff = $fecha1->diff($fecha2);
                $dias=$diff->days+1;

                //$permisosPorDia=[];

             

                    $permiso = new permisos;

                   
                 
                    //$permiso->estado = '3'; //pendiente
                    $permiso->fecha_inicio = $request['fechaInicio'];
                    $permiso->fecha_final = $request['fechaInicio'];
                    $permiso->fecha_inicio_aprobada = $request['fechaInicio'];
                    $permiso->fecha_final_aprobada = $request['fechaFinal'];
                    $permiso->hora_inicio = '08:00:00';
                    $permiso->hora_final = '17:00:00';
                    $permiso->empleado_id = $idEmpleado[0]['id'];
                    $permiso->tipo_permiso_id = $request['tipoPermiso'];
                    $permiso->estado_permiso_jefe_id = '3'; //pendiente jefe
                    $permiso->estado_permiso_rrhh_id = '5'; //pendiente de recursos humanos
                    $permiso->motivo = $request['motivo'];
    
                    $permiso->save();
                    $idPErmisoPadre = $permiso->id;
                    $permisoCreado = permisos::find($permiso->id);
                    $permisoCreado->permiso_id =   $idPErmisoPadre;
                    $permisoCreado->save();


                for($i=1; $i< $dias;$i++){

                    // $suma = strtotime($request['fechaInicio'].'+'.$i.' '.'days');    
                    // array_push($permisosPorDia, ['fecha'=> date("Y-m-d",$suma)]);

                    $permiso = new permisos;

                    $fechaInicio =  strtotime($request['fechaInicio'].'+'.$i.' '.'days');
                  
                   
                 
                    //$permiso->estado = '3'; //pendiente
                    $permiso->fecha_inicio =  date("Y-m-d",$fechaInicio);
                    $permiso->fecha_final = date("Y-m-d",$fechaInicio);
                    $permiso->hora_inicio = '08:00:00';
                    $permiso->hora_final = '17:00:00';
                    $permiso->empleado_id = $idEmpleado[0]['id'];
                    $permiso->tipo_permiso_id = $request['tipoPermiso'];
                    $permiso->estado_permiso_jefe_id = '3'; //pendiente jefe
                    $permiso->estado_permiso_rrhh_id = '5'; //pendiente de recursos humanos
                    $permiso->motivo = $request['motivo'];
                    $permiso->permiso_id =   $idPErmisoPadre;
                    $permiso->fecha_inicio_aprobada = $request['fechaInicio'];
                    $permiso->fecha_final_aprobada = $request['fechaFinal'];
                    $permiso->save();

                    

                       
                }



                return response()->json([
                    'message' => 'Permiso enviado con exito',
                    'color' => 'success'
                ], 200);
            }
        } catch (QueryException $e) {

            return response()->json([
                'message' => 'Ha ocurrido un error, favor intente de nuevo.',
                'color' => 'error',
                'err' => $e
            ], 404);
        }
    }


    public function listarPermisosEmpleados()
    {

        // $permisos = permisos::join('estado_permiso','permisos.estado_permiso_jefe_id','=','estado_permiso.id')


        //                     ->get();


        // return datatables()->of($permisos)->toJson();

        try {

            $identidadUser =  Auth::user()->identidad;

            $idEmpleado = empleado::where('identidad', '=', $identidadUser)
                ->select('id')
                ->get();


            $permisos = DB::select('
            select 

            permisos.id as idPermiso,
                        tipo_permiso.permiso as "nombre_permiso",
                        permisos.permiso_id ,          
                        permisos.fecha_inicio_aprobada as fecha_inicio,
                        permisos.fecha_final_aprobada as fecha_final,
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
            
            from
            
            (select permiso_id from permisos group by permiso_id ) permis
             inner join permisos 
             on permisos.id = permis.permiso_id
             inner join estado_permiso
             on permisos.estado_permiso_jefe_id = estado_permiso.id  
             inner join tipo_permiso 
            on permisos.tipo_permiso_id = tipo_permiso.id
          where permisos.empleado_id = ' . $idEmpleado[0]['id'] .             
          ' order by permisos.created_at desc;
         
            ');

            return datatables()->of($permisos)
                ->addColumn('acciones', function ($row) {
                    $html = '              
                <a class="dropdown-item"  href="#" onclick="editarPermiso(' . $row->idPermiso . ')"><i class="fa fa-dot-circle-o text-success"></i> Editar</a>
          ';
                    return $html;
                })
                ->rawColumns(['acciones'])
                ->make(true);
        } catch (QueryException $e) {
            return response()->json(['error' => $e]);
        }
    }


    public function datosActualizarPermiso($id)
    {

        $permiso = permisos::where('id', '=', $id)
            ->get();


        return response()->json(['permiso' => $permiso[0]]);
    }


    public function editarPermiso(Request $request)
    {

        try {

            if ($request['unDia'] == 1) {

                $permiso = permisos::find($request['id']);

                $permiso->tipo_permiso = $request['tipoPermisoTexto'];
                $permiso->nombre = $request['tipoPermisoTexto'];
                $permiso->estado = '3'; //pendiente
                $permiso->fecha_inicio = $request['fechaInicio'];
                $permiso->fecha_final = $request['fechaFinal'];

                $permiso->tipo_permiso_id = $request['tipoPermiso'];
                $permiso->estado_permiso_jefe_id = '3'; //pendiente jefe
                $permiso->estado_permiso_rrhh_id = '5'; //pendiente de recursos humanos
                $permiso->hora_inicio = $request['horaInicio'];
                $permiso->hora_final = $request['horaFinal'];
                $permiso->motivo = $request['motivo'];
                $permiso->save();

                return response()->json([
                    'message' => 'Permiso enviado con exito',
                    'color' => 'success'
                ], 200);
            } else {

                $permiso = permisos::find($request['id']);

                $permiso->tipo_permiso = $request['tipoPermisoTexto'];
                $permiso->nombre = $request['tipoPermisoTexto'];
                $permiso->estado = '3'; //pendiente
                $permiso->fecha_inicio = $request['fechaInicio'];
                $permiso->fecha_final = $request['fechaFinal'];

                $permiso->tipo_permiso_id = $request['tipoPermiso'];
                $permiso->estado_permiso_jefe_id = '3'; //pendiente jefe
                $permiso->estado_permiso_rrhh_id = '5'; //pendiente de recursos humanos
                $permiso->motivo = $request['motivo'];
                $permiso->hora_inicio = null;
                $permiso->hora_final = null;

                $permiso->save();

                return response()->json([
                    'message' => 'Permiso actualizado con exito',
                    'color' => 'success'
                ], 200);
            }
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e

            ], 402);
        }
    }
}
