<?php



namespace App\Http\Livewire\permisos;



use App\Models\departamento;
use App\Models\empleado;
use App\Models\permisos;


use Doctrine\DBAL\Query\QueryException;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Auth;

class permisosJefe extends Component
{
    public function render()
    {
        return view('livewire.permisos.permisos');
    }


    public function listarPermisosJefe()
    {

        try {

            $permisos = DB::SELECT('
                                select 
                                            permisos.id as "idPermiso",
                                            empleado.nombre as "nombre_empleado",
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

                                from departamento 

                                            inner join area 
                                            on departamento.id = area.id
                                            inner join cargo
                                            on area.id = cargo.area_id
                                            inner join empleado
                                            on cargo.id = empleado.id
                                            inner join permisos
                                            on empleado.id = permisos.empleado_id
                                            inner join estado_permiso
                                            on estado_permiso_jefe_id = estado_permiso.id  

                                where departamento.id = 1 and  permisos.empleado_jefe_aprueba is null
        ');

        return datatables()->of($permisos)
        ->addColumn('acciones', function ($row) {
            $html = '<div class="dropdown action-label">
            <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-dot-circle-o text-purple"></i> Accion
            </a>
            <div class="dropdown-menu dropdown-menu-right">               
                <a class="dropdown-item"  href="#" onclick="modalAprobar('.$row->idPermiso.')"><i class="fa fa-dot-circle-o text-success"></i> Aprobar</a>
                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Denegar</a>
            </div>
        </div>';
            return $html;
        })
        ->rawColumns(['acciones'])
        ->make(true);
        } catch (QueryException $e) {

            return response()->json([
                'error' => $e,
            ], 402);
        }
    }


   
    public function aprobarPermiso($id){
        try{
            
            $identidad = Auth::user()->identidad;

            $idEmpleado = empleado::where('identidad','=', $identidad)
                                    ->select('id')
                                    ->get();


            $permiso  = permisos::find($id);
            $permiso->estado_permiso_jefe_id = 1;
            $permiso->empleado_jefe_aprueba = $idEmpleado[0]['id'];
            $permiso->save();            

             return response()->json([
                 'message' =>"Aprobado con exito",
                 'permiso' => $permiso
             ],200);
        }catch(QueryException $e){
            
             return response()->json([
            'error'=>$e, 
            ],402); }
        }
}
