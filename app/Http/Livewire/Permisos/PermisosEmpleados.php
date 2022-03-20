<?php

namespace App\Http\Livewire\Permisos;

use App\Models\tipo_permiso;
use App\Models\permisos;
use App\Models\empleado;
use App\Models\contrato;
use DateTime;
use Auth;


use Doctrine\DBAL\Query\QueryException;
use Livewire\Component;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;



class PermisosEmpleados extends Component
{
    public function render()
    {
        return view('livewire.permisos.permisos-empleados');
    }


    public function obtenerPermisos()
    {
        try {

            $tipos = DB::SELECT("select if( TP.id != 7,CONCAT(TP.permiso, ' - ' ,UPPER(TGS.tipo)),TP.permiso) as permiso, TP.id
            from tipo_permiso TP
            inner join tipo_gose_sueldo TGS
            on TP.tipo_gose_sueldo_id = TGS.id");

            return response()->json([
                'tipos' => $tipos,

            ], 200);
        } catch (QueryException $e) {

            return response()->json([
                'message' => 'Ha ocurrido un error al obtener los tipos de permisos',
                'color' => 'error',
                'err' => $e,
            ], 402);
        }
    }

    public function notificacionPermisoCreado($data){
        $correos = ['yefryyo@gmail.com', 'luisfaviles18@gmail.com'];
        $subject = 'Solicitud de permiso';
        $for = $data->correoInstitucionalEncargado;
        Mail::send('name',['data' => $data], function($msj) use($subject,$for){
            $msj->from("humansys2021@gmail.com","SISTEMA DE TALENTO HUMANO");
            $msj->subject($subject);
            $msj->to($for);
        });

        return response()->json('Exito');
    }

    public function guardarPermiso(Request $request)
    {

        try {
            DB::beginTransaction();

           // dd($request['tipoPermiso']);

           //


            $identidadUser = Auth::user()->identidad;

            $idEmpleado = empleado::where('identidad', '=', $identidadUser)
                ->select('id')
                ->get();

            //$comprobacion = $this->vacacionesRestaDias($idEmpleado, $request['tipoPermiso'], $request['fechaInicio'], $request['fechaFinal']);//comprobar vacaciones

            /* if($comprobacion == 2){
                return response()->json([
                    'message' => 'No cuenta con vacaciones disponibles',
                    'color' => 'error'
                ], 402);
            } */





            if ($request['unDia'] == 1) {

                $permiso = new permisos;

                $idemp = $idEmpleado[0]['id'];

                /* $permiso->estado = '3';  */ //pendiente
                $permiso->fecha_inicio = $request['fechaInicio'];
                $permiso->fecha_final = $request['fechaFinal'];
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
                $id_permiso = $permiso->id;

                $permisoCreado = permisos::find($id_permiso);
                    $permisoCreado->permiso_id =  $id_permiso;
                    $permisoCreado->save();

                $data =DB::SELECTONE("select emp.nombre as empleadoNombre ,emp.identidad, emp.id, depa.nombre, depa.empleado_encargado_id ,
                (select empleado.email_institucional  from empleado where id = depa.empleado_encargado_id) as correoInstitucionalEncargado
                from departamento depa
                inner join area ar on (ar.departamento_id = depa.id)
                inner join cargo car on (car.area_id = ar.id)
                inner join empleado emp on (emp.cargo_id = car.id)
                where emp.id =".$idemp);
                $this->notificacionPermisoCreado($data);
                return response()->json([
                    'message' => 'Permiso enviado con exito',
                    'color' => 'success'
                ], 200);

            } else {

                $fecha1 = new DateTime($request['fechaInicio']); //fecha inicio
                $fecha2 = new DateTime($request['fechaFinal']); //fecha final
                $diff = $fecha1->diff($fecha2);
                $dias = $diff->days + 1;

                $idemp = $idEmpleado[0]['id'];
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
                    $permiso->estado_permiso_jefe_id = '3'; //pendiente jefe
                    $permiso->estado_permiso_rrhh_id = '5'; //pendiente de recursos humanos
                    $permiso->motivo = $request['motivo'];
                    $permiso->permiso_id =   $idPErmisoPadre;
                    $permiso->fecha_inicio_aprobada = $request['fechaInicio'];
                    $permiso->fecha_final_aprobada = $request['fechaFinal'];
                    $permiso->save();
                }


                $data =DB::SELECTONE("select emp.nombre as empleadoNombre ,emp.identidad, emp.id, depa.nombre, depa.empleado_encargado_id ,
                (select empleado.email_institucional  from empleado where id = depa.empleado_encargado_id) as correoInstitucionalEncargado
                from departamento depa
                inner join area ar on (ar.departamento_id = depa.id)
                inner join cargo car on (car.area_id = ar.id)
                inner join empleado emp on (emp.cargo_id = car.id)
                where emp.id =".$idemp);
                $this->notificacionPermisoCreado($data);

                return response()->json([
                    'message' => 'Permiso enviado con exito',
                    'color' => 'success'
                ], 200);
            }
        } catch (QueryException $e) {
            DB::rollback();

            return response()->json([
                'message' => 'Ha ocurrido un error, favor intente de nuevo ó contacte a soporte técnico.',
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
                        permisos.permiso_id as permiso_id_padre,
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
                    if($row->estado_permiso_rrhh_id == 4 || $row->estado_permiso_jefe_id == 1){
                        $html ='<td> <a class="dropdown-item" href="/permisosempleados/generate-pdf_permiso/'.$row->permiso_id_padre.'" ><i class="fa fa-check text-success"></i>Descargar</a></td>';
                    }else{
                        $html = '
                                <a class="dropdown-item"  href="#" onclick="editarPermiso(' . $row->idPermiso . ')"><i class="fa fa-dot-circle-o text-success"></i> Editar</a>
                        ';
                    }

                    return $html;
                })
                ->rawColumns(['acciones'])
                ->make(true);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Ha ocurrido un error.',
                'color' => 'error',
                'err' => $e,
            ]);
        }
    }


    public function datosActualizarPermiso($id)
    {
        $permiso = permisos::where('id', '=', $id)
            ->get();
        /* dd($permiso); */
        return response()->json(['permiso' => $permiso[0]]);
    }


    public function editarPermiso(Request $request)
    {

        try {
            $identidadUser = Auth::user()->identidad;

            $idEmpleado = empleado::where('identidad', '=', $identidadUser)
                ->select('id')
                ->get();

            if ($request['unDia'] == 1) {

                $permiso = permisos::find($request['id']);

                $permiso->tipo_permiso_id = $request['tipoPermisoTexto'];
                $permiso->fecha_inicio = $request['fechaInicio'];
                $permiso->fecha_final = $request['fechaFinal'];

                $permiso->tipo_permiso_id = $request['tipoPermiso'];
                /* $permiso->estado_permiso_jefe_id = '3'; //pendiente jefe
                $permiso->estado_permiso_rrhh_id = '5'; //pendiente de recursos humanos */
                $permiso->hora_inicio = $request['horaInicio'];
                $permiso->hora_final = $request['horaFinal'];
                $permiso->motivo = $request['motivo'];
                $permiso->save();

                return response()->json([
                    'message' => 'Permiso enviado con exito',
                    'color' => 'success'
                ], 200);
            } else {
                $permiso_estados = DB::SELECTONE("select * from permisos where id = '" . $request['id'] . "'");
                DB::delete("delete from permisos where permiso_id = '" . $request['id'] . "'");
                $fecha1 = new DateTime($request['fechaInicio']); //fecha inicio
                $fecha2 = new DateTime($request['fechaFinal']); //fecha final
                $diff = $fecha1->diff($fecha2);
                $dias = $diff->days + 1;

                $permiso = new permisos;
                $permiso->fecha_inicio = $request['fechaInicio'];
                $permiso->fecha_final = $request['fechaInicio'];
                $permiso->fecha_inicio_aprobada = $request['fechaInicio'];
                $permiso->fecha_final_aprobada = $request['fechaFinal'];
                $permiso->hora_inicio = '08:00:00';
                $permiso->hora_final = '17:00:00';
                $permiso->empleado_id = $idEmpleado[0]['id'];
                $permiso->tipo_permiso_id = $request['tipoPermiso'];
                $permiso->estado_permiso_jefe_id = $permiso_estados->estado_permiso_jefe_id; //pendiente jefe
                $permiso->estado_permiso_rrhh_id = $permiso_estados->estado_permiso_rrhh_id; //pendiente de recursos humanos
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
                    $permiso->estado_permiso_jefe_id = $permiso_estados->estado_permiso_jefe_id; //pendiente jefe
                    $permiso->estado_permiso_rrhh_id = $permiso_estados->estado_permiso_rrhh_id; //pendiente de recursos humanos
                    $permiso->motivo = $request['motivo'];
                    $permiso->permiso_id =   $idPErmisoPadre;
                    $permiso->fecha_inicio_aprobada = $request['fechaInicio'];
                    $permiso->fecha_final_aprobada = $request['fechaFinal'];
                    $permiso->save();
                }
                return response()->json([
                    'message' => 'Permiso actualizado con exito',
                    'color' => 'success'
                ], 200);
            }
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Ha ocurrido un error, favor intente de nuevo ó contacte a soporte técnico.',
                'color' => 'error',
                'err' => $e

            ], 402);
        }
    }

    public function vacacionesRestaDias($idEmpleado, $idPermiso, $fechaInicio, $fechaFinal)
    {
            $empleadoId= $idEmpleado[0]['id'];
           $fecha1 = new DateTime($fechaInicio);//fecha inicio
           $fecha2 = new DateTime($fechaFinal);//fecha final
           $diff = $fecha1->diff($fecha2);
           $diasDescontar=$diff->days+1;



        if($idPermiso != 7){
            return 0;//no es de tipo vacaciones
        }



        $conteoVacaciones = DB::SELECT("select  id, vacaciones from contrato where    empleado_id = ".$empleadoId." and DATE_FORMAT(fecha_inicio, '%Y') = date_format(now(),'%Y') order by created_at ASC");
       // $ff = $conteoVacaciones->dias_vacaciones;
        //dd($conteoVacaciones[0]->dias_vacaciones);

        if($conteoVacaciones[0]->dias_vacaciones == 0 || $diasDescontar>$conteoVacaciones[0]->dias_vacaciones){
            return 2;//no hay vacaciones disponibles
        }


        $listaContratos = DB::SELECT("select id, vacaciones from contrato where  empleado_id = ".$empleadoId.". order by created_at ASC");

        foreach($listaContratos As $contrato){

            if( $diasDescontar != 0 && $contrato->vacaciones != 0){


        $conteoVacaciones = DB::SELECT("select sum(vacaciones) as 'dias_vacaciones' from contrato where empleado_id = ". $empleadoId ." group by empleado_id;");
 

                            $restarVacacionesContrato = contrato::find($contrato->id);

                            $restarVacacionesContrato->vacaciones = $resta;

                            $restarVacacionesContrato->save();

                        }



        $listaContratos = DB::SELECT("select  id, vacaciones from contrato where    empleado_id = " . $empleadoId . " and DATE_FORMAT(fecha_inicio, '%Y') = date_format(now(),'%Y') order by created_at ASC");


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

    public function generate_pdf_permiso($permiso_id_padre){
        $permiso = DB::SELECTONE("select hora_inicio, hora_final , count(permiso_id) as dias,
                                        tipo_permiso_id as idTipoPermiso,
                                        DATE_FORMAT(fecha_inicio, '%Y-%m-%d') as fecha_inicio,
                                        (
                                            select DATE_FORMAT(fecha_final, '%Y-%m-%d') as fecha_final
                                            from permisos
                                            where permiso_id = '".$permiso_id_padre."'
                                            order by fecha_final DESC LIMIT 1
                                        ) as fecha_final, motivo
                                   from permisos
                                   where permiso_id = '".$permiso_id_padre."'
                                   order by fecha_inicio ASC LIMIT 1");

        $empleado = DB::SELECTONE("select nombre,cargo_id
                                   from empleado
                                   where id = (
                                                select permisos.empleado_id
                                                from permisos
                                                where permisos.permiso_id = 85 LIMIT 1
                                                )");
        $gerencia = DB::SELECTONE("select depa.nombre
                                    from departamento depa
                                    inner join area ar on (ar.departamento_id = depa.id)
                                    inner join cargo car on (car.area_id = ar.id)
                                    where car.id = '".$empleado->cargo_id."'");
        $gocesueldo = DB::SELECTONE("select * from tipo_permiso where id = '".$permiso->idTipoPermiso."'");
        $data = [
            'title' => 'Permiso',
            'permiso' => $permiso,
            'empleado' => $empleado,
            'gerencia' => $gerencia,
            'goce' => $gocesueldo
        ];
        $pdf = PDF::loadView('pdf/permiso-personal', $data);

        //stream para vizualizar y no descargar de un sólo
        return $pdf->stream('PERMISO DE .pdf');
    }

}
