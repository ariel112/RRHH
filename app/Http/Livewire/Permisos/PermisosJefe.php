<?php



namespace App\Http\Livewire\permisos;



use App\Models\departamento;
use App\Models\empleado;
use App\Models\permisos;
use Illuminate\Support\Facades\Mail;

use Doctrine\DBAL\Query\QueryException;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Http\Request;
use App\Models\contrato;
use DateTime;

class permisosJefe extends Component
{
    public function render()
    {
        return view('livewire.permisos.permisos');
    }


    public function listarPermisosJefe()
    {

        //consulta para obtener departamento a cargo

        try {

            $identidadUser = Auth::user()->identidad;

            $idEmpleado = empleado::where('identidad', '=', $identidadUser)
                ->select('id')
                ->get();

            $idDepartamento = departamento::where('empleado_encargado_id', '=', $idEmpleado[0]['id'])
                ->select('id')
                ->get();


            $permisos = DB::SELECT('
            select
 permisos.id as "idPermiso",
            empleado.nombre as "nombre_empleado",
            permisos.id as idPermiso,
            tipo_permiso.permiso "nombre_permiso",
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
            IF(  permisos.empleado_jefe_aprueba IS NULL, "Aun no disponible" , (select nombre from  empleado where id = permisos.empleado_jefe_aprueba)  ) AS "nombre_jefe",
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
      where departamento.id =' . $idDepartamento[0]['id'] . '
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

    public function notificacionPermisoCreado($gerenteAprueba, $correosJefes){
        $correos = ['yefryyo@gmail.com', 'luisfaviles18@gmail.com'];
        $subject = 'Solicitud de permiso';
        $arrayCorreos=[];
        foreach ($correosJefes as $correo){
            /* dd($correo->email_institucional); */
            $item = $correo->email_institucional;
            /* dd($item); */
            array_push($arrayCorreos,$item);
            /* dd($arrayCorreos); */
        }

        $for = $arrayCorreos;
        Mail::send('name',['data' => $gerenteAprueba], function($msj) use($subject,$for){
            $msj->from("humansys2021@gmail.com","SISTEMA DE TALENTO HUMANO");
            $msj->subject($subject);
            $msj->to($for);
        });

        return response()->json('Exito');
    }

public function aprobarPermiso($id){
        try {
            $identidad = Auth::user()->identidad;
            $idEmpleado = empleado::where('identidad', '=', $identidad)
                ->select('id')
                ->get();

            $permiso_id = DB::SELECT("select * from permisos where permiso_id = (select permiso_id from permisos where id = '".$id."')");
            foreach ($permiso_id as $item) {
                DB::table('permisos')
                ->where('permiso_id', $item->permiso_id)
                ->update(['estado_permiso_jefe_id' => 1,'empleado_jefe_aprueba' => $idEmpleado[0]['id']]);
            }

            $gerenteAprueba =DB::SELECTONE("select * from empleado where id =".$idEmpleado[0]['id']);
            $correosJefes = DB::SELECT("select empleado.email_institucional from empleado where cargo_id = 111 or cargo_id = 74");
            /* dd($correosJefes); */
            $this->notificacionPermisoCreado($gerenteAprueba, $correosJefes);
                //CARGO ES EL 111 y 74
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
public function denegarPermiso($id){
        try {

            $identidad = Auth::user()->identidad;

            $idEmpleado = empleado::where('identidad', '=', $identidad)
                ->select('id')
                ->get();


                $permiso_id = DB::SELECT("select * from permisos where permiso_id = (select permiso_id from permisos where id = '".$id."')");
                foreach ($permiso_id as $item) {
                    DB::table('permisos')
                    ->where('permiso_id', $item->permiso_id)
                    ->update(['estado_permiso_jefe_id' => 2,'empleado_jefe_aprueba' => $idEmpleado[0]['id']]);
                }

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




public function guardarPermisoJefe(Request $request){
        try {
            DB::beginTransaction();

            $identidadUser = Auth::user()->identidad;

            $idEmpleado = empleado::where('identidad', '=', $identidadUser)
                ->select('id')
                ->get();

                $comprobacion = $this->vacacionesRestaDias($idEmpleado, $request['tipoPermiso'], $request['fechaInicio'], $request['fechaFinal']); //comprobar vacaciones
                if ($comprobacion == 2) {
                    DB::rollback();
                   return response()->json([
                       'message' => 'No cuenta con días de vacaciones disponibles o suficientes.',
                       'color' => 'error'
                   ], 402);
               }
   

            if ($request['unDia'] == 1) {    
                $permiso = new permisos;

                /* $permiso->estado = '3';  */ //pendiente
                $permiso->fecha_inicio = $request['fechaInicio'];
                $permiso->fecha_final = $request['fechaInicio'];
                $permiso->fecha_inicio_aprobada = $request['fechaInicio'];
                $permiso->fecha_final_aprobada = $request['fechaFinal'];
                $permiso->empleado_id = $idEmpleado[0]['id'];
                $permiso->tipo_permiso_id = $request['tipoPermiso'];
                $permiso->estado_permiso_jefe_id = '1'; //aprobado jefe
                $permiso->estado_permiso_rrhh_id = '5'; //pendiente de recursos humanos
                $permiso->hora_inicio = $request['horaInicio'];
                $permiso->hora_final = $request['horaFinal'];
                $permiso->motivo = $request['motivo'];
                $permiso->empleado_jefe_aprueba = $idEmpleado[0]['id'];
                $permiso->save();
                $id_permiso = $permiso->id;

                $permisoCreado = permisos::find($id_permiso);
                $permisoCreado->permiso_id =  $id_permiso;
                $permisoCreado->save();
                DB::commit();
                return response()->json([
                    'message' => 'Permiso enviado con exito',
                    'color' => 'success'
                ], 200);
            } else {  
                $fecha1 = new DateTime($request['fechaInicio']); //fecha inicio
                $fecha2 = new DateTime($request['fechaFinal']); //fecha final
                $diff = $fecha1->diff($fecha2);
                $dias = $diff->days + 1;
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
                $permiso->estado_permiso_jefe_id = '1'; //aprobado jefe
                $permiso->estado_permiso_rrhh_id = '5'; //pendiente de recursos humanos
                $permiso->motivo = $request['motivo'];

                $permiso->save();
                $idPErmisoPadre = $permiso->id;
                $permisoCreado = permisos::find($permiso->id);
                $permisoCreado->permiso_id =   $idPErmisoPadre;
                $permisoCreado->save();


                for ($i = 1; $i < $dias; $i++) {

                    // $suma = strtotime($request['fechaInicio'].'+'.$i.' '.'days');
                    // array_push($permisosPorDia, ['fecha'=> date("Y-m-d",$suma)]);

                    $permiso = new permisos;

                    $fechaInicio =  strtotime($request['fechaInicio'] . '+' . $i . ' ' . 'days');



                    //$permiso->estado = '3'; //pendiente
                    $permiso->fecha_inicio =  date("Y-m-d", $fechaInicio);
                    $permiso->fecha_final = date("Y-m-d", $fechaInicio);
                    $permiso->hora_inicio = '08:00:00';
                    $permiso->hora_final = '17:00:00';
                    $permiso->empleado_id = $idEmpleado[0]['id'];
                    $permiso->tipo_permiso_id = $request['tipoPermiso'];
                    $permiso->estado_permiso_jefe_id = '1'; //aprobado jefe
                    $permiso->estado_permiso_rrhh_id = '5'; //pendiente de recursos humanos
                    $permiso->motivo = $request['motivo'];
                    $permiso->permiso_id =   $idPErmisoPadre;
                    $permiso->fecha_inicio_aprobada = $request['fechaInicio'];
                    $permiso->fecha_final_aprobada = $request['fechaFinal'];
                    $permiso->save();
                }


                DB::commit();
                return response()->json([
                    'message' => 'Permiso enviado con exito',
                    'color' => 'success'
                ], 200);




            }
        } catch (QueryException $e) {
            DB::rollback();
            return response()->json([
                'message' => 'Ha ocurrido un error, favor intente de nuevo.',
                'color' => 'error',
                'err' => $e
            ], 404);
        }
    }

    public function vacacionesRestaDias($idEmpleado, $idPermiso, $fechaInicio, $fechaFinal)
    {
        if ($idPermiso != 7) {
            return 0; //no es de tipo vacaciones            
        }

        $empleadoId = $idEmpleado[0]['id'];
        $fecha1 = new DateTime($fechaInicio); //fecha inicio
        $fecha2 = new DateTime($fechaFinal); //fecha final
        $diff = $fecha1->diff($fecha2);
        $diasDescontar = $diff->days + 1;
     


        $conteoVacaciones = DB::SELECT("select sum(vacaciones) as 'dias_vacaciones' from contrato where empleado_id = ". $empleadoId ." group by empleado_id;");
 

        if ($conteoVacaciones[0]->dias_vacaciones == 0 || $diasDescontar > $conteoVacaciones[0]->dias_vacaciones) {
            return 2; //no hay vacaciones disponibles
        }


        $listaContratos = DB::SELECT("select  id, vacaciones from contrato where    empleado_id = " . $empleadoId . " and DATE_FORMAT(fecha_inicio, '%Y') = date_format(now(),'%Y') order by created_at ASC");

        foreach ($listaContratos as $contrato) {
            $numDiasVacaciones =  $contrato->vacaciones;
            $contratoId = $contrato->id;
            
            

            if ($numDiasVacaciones != 0) {

                //if anidado
                if ($diasDescontar <= $numDiasVacaciones) {                      
                    $resta = $contrato->vacaciones - $diasDescontar;                    
                    $restarVacacionesContrato = contrato::find($contratoId);
                    $restarVacacionesContrato->vacaciones =  $resta;
                    $restarVacacionesContrato->save();
                    $diasDescontar =  $resta;
                } else {                    
                    $resta = $diasDescontar - $numDiasVacaciones;
                    $restarVacacionesContrato = contrato::find($contratoId);
                    $restarVacacionesContrato->vacaciones = '0';
                    $restarVacacionesContrato->save();
                    $diasDescontar = $resta;
                }
            };

            if ($diasDescontar == 0) {
                break;
            };
        };

        return 1; //exito
    }
}
