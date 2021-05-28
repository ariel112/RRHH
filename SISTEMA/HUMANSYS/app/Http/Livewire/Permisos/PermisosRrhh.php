<?php

namespace App\Http\Livewire\Permisos;

use App\Models\tipo_permiso;
use App\Models\permisos;
use App\Models\empleado;
use Auth;
use DateTime;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

class PermisosRrhh extends Component
{
    public function render()
    {
        return view('livewire.permisos.permisos-rrhh');
    }




    public function listarPermisosRRHH()
    {

        try {

     $permisos = DB::SELECT('
            select
        permisos.id as "idPermiso",

            empleado.nombre as "nombre_empleado",
            permisos.id as idPermiso,
            tipo_permiso.permiso as "tipo_permiso",
            tipo_permiso_id,
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
        departamento
        inner join area
        on departamento.id = area.departamento_id
        inner join cargo
        on area.id = cargo.area_id
        inner join empleado
        on cargo.id = empleado.cargo_id
        inner join permisos
        on empleado.id = permisos.empleado_id
        inner join (select permiso_id from permisos group by permiso_id ) permis
        on permisos.id = permis.permiso_id
        inner join estado_permiso
        on estado_permiso_jefe_id = estado_permiso.id
        inner join tipo_permiso
        on permisos.tipo_permiso_id = tipo_permiso.id
        where permisos.estado_permiso_jefe_id = 1
        order by permisos.created_at desc;


        ');

            return datatables()->of($permisos)
                ->addColumn('acciones', function ($row) {
                    $html = '<div class="dropdown action-label">
            <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-dot-circle-o text-purple"></i> Accion
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item"  href="#" onclick="modalAprobar(' . $row->idPermiso . ')"><i class="fa fa-dot-circle-o text-success"></i> Aprobar</a>
                <a class="dropdown-item" href="#" onclick="modalDenegar(' . $row->idPermiso . ')" ><i class="fa fa-dot-circle-o text-danger"></i> Declinar</a>
                <a class="dropdown-item"  href="#" onclick="editarPermiso(' . $row->idPermiso . ')"><i class="fa fa-dot-circle-o text-warning"></i> Editar</a>
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


    public function aprobarPermisoRRHH($id)
    {
        try {

            $identidad = Auth::user()->identidad;

            $idEmpleado = empleado::where('identidad', '=', $identidad)
                ->select('id')
                ->get();

            $permiso_id = DB::SELECT("select * from permisos where permiso_id = (select permiso_id from permisos where id = '".$id."')");
            foreach ($permiso_id as $item) {
                DB::table('permisos')
                ->where('permiso_id', $item->permiso_id)
                ->update(['estado_permiso_rrhh_id' => 4,'empleado_rrhh_aprueba_id' => $idEmpleado[0]['id']]);
            }

            /* $permiso  = permisos::find($id);
            $permiso->estado_permiso_rrhh_id = 4;
            $permiso->empleado_rrhh_aprueba_id = $idEmpleado[0]['id'];
            $permiso->save(); */

            return response()->json([
                'message' => "Aprobado con exito",
                'permiso' => $permiso_id
            ], 200);
        } catch (QueryException $e) {

            return response()->json([
                'error' => $e,
            ], 402);
        }
    }

    public function denegarPermisoRRHH($id)
    {
        try {

            $identidad = Auth::user()->identidad;

            $idEmpleado = empleado::where('identidad', '=', $identidad)
                ->select('id')
                ->get();
            $permiso_id = DB::SELECT("select * from permisos where permiso_id = (select permiso_id from permisos where id = '".$id."')");
            foreach ($permiso_id as $item) {
                DB::table('permisos')
                ->where('permiso_id', $item->permiso_id)
                ->update(['estado_permiso_rrhh_id' => 6,'empleado_rrhh_aprueba_id' => $idEmpleado[0]['id'],'estado_permiso_jefe_id' => 2]);
            }

            /* $permiso  = permisos::find($id);
            $permiso->estado_permiso_rrhh_id = 6;
            $permiso->empleado_rrhh_aprueba_id = $idEmpleado[0]['id'];
            $permiso->save(); */

            return response()->json([
                'message' => "Denegado con exito",
                'permiso' => $permiso_id
            ], 200);
        } catch (QueryException $e) {

            return response()->json([
                'error' => $e,
            ], 402);
        }
    }


    public function panelControlRRHH(){

        try{

            $aprobados =  DB::SELECT('select count(id) As "aprobados" from permisos where estado_permiso_rrhh_id = 4');
            $denegados =  DB::SELECT('select count(id) As "denegados" from permisos where estado_permiso_rrhh_id = 6');
            $pendientes =  DB::SELECT('select count(id) As "pendientes" from permisos where estado_permiso_rrhh_id = 5');
            $total =  DB::SELECT('select count(id) As "total" from permisos where estado_permiso_jefe_id = 1');


             return response()->json([
                 'aprobados' => $aprobados[0],
                 'denegados' => $denegados[0],
                 'pendientes'=> $pendientes[0],
                 'total'     => $total[0],
             ],200);
        }catch(QueryException $e){

             return response()->json([
            'error'=>$e,
            ],402); }
        }


        public function guardarPermisoRRHH(Request $request)
        {
            /* dd($request); */
            try {

                $identidadUser = Auth::user()->identidad;

                $idEmpleado = empleado::where('identidad', '=', $identidadUser)
                    ->select('id')
                    ->get();

                if ($request['unDia'] == 1) {

                    $permiso = new permisos;

                    $permiso->tipo_permiso = $request['tipoPermisoTexto'];
                    $permiso->nombre = $request['tipoPermisoTexto'];
                    $permiso->estado = '3'; //pendiente
                    $permiso->fecha_inicio = $request['fechaInicio'];
                    $permiso->fecha_final = $request['fechaFinal'];
                    $permiso->empleado_id = $idEmpleado[0]['id'];
                    $permiso->tipo_permiso_id = $request['tipoPermiso'];
                    $permiso->estado_permiso_jefe_id = '1'; //aprobado jefe inmediato
                    $permiso->estado_permiso_rrhh_id = '4'; //aprobado de recursos humanos
                    $permiso->hora_inicio = $request['horaInicio'];
                    $permiso->hora_final = $request['horaFinal'];
                    $permiso->motivo = $request['motivo'];
                    $permiso->empleado_jefe_aprueba = $idEmpleado[0]['id'];
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


}
