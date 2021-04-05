<?php

namespace App\Http\Controllers;

use App\Models\empleado;
use App\Models\referencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use App\Models\Team;
use App\Models\User;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("empleado.empleado-index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){


        /* DB::beginTransaction(); */

        try{

            $empleados = new empleado();
            $empleados->identidad = $request['identidad'];
            $empleados->nombre = $request['primer_nombre'].' '.$request['segundo_nombre'].' '.$request['primer_apellido'].' '.$request['segundo_apellido'];
            $empleados->primer_nombre = $request['primer_nombre'];
            $empleados->segundo_nombre = $request['segundo_nombre'];
            $empleados->primer_apellido = $request['primer_apellido'];
            $empleados->segundo_apellido = $request['segundo_apellido'];
            $empleados->fecha_nacimiento = $request['fecha_nacimiento'];
            $empleados->fecha_ingreso = $request['fecha_ingreso'];
            $empleados->url_foto = 'foto_1';
            $empleados->email = $request['email'];
            $empleados->email_institucional = $request['email_institucional'];
            $empleados->lugar_nacimiento = $request['lugar_nacimiento'];
            $empleados->estado_civil = $request['estado_civil'];
            $empleados->descripcion_laboral = $request['descripcion_laboral'];
            $empleados->telefono_1 = $request['telefono_1'];
            $empleados->telefono_2 = $request['telefono_2'];
            $empleados->estatus_id = $request['estatus_id'];
            $empleados->grado_academico_id = $request['grado_academico_id'];
            $empleados->municipio_id = $request['municipio_id'];
            $empleados->cargo_id = $request['cargo_id'];
            $empleados->sueldo = $request['sueldo'];
            $empleados->rtn = $request['rtn'];
            $empleados -> save();


            $referencias = new referencia();
            $referencias->nombre = $request['nombre'];
            $referencias->telefono = $request['telefono'];
            $referencias->email = $request['email'];
            $referencias->direccion = $request['direccion'];
            $referencias->parentezco = $request['parentezco'];

            /* User::create([
                 'name' => $request['primer_nombre'].' '.$request['segundo_nombre'].' '.$request['primer_apellido'].' '.$request['segundo_apellido'],
                'email' =>  $request['email_institucional'],
                 'password' => Hash::make(rand(5, 15))
                'password' => Hash::make($request['identidad']),
                'identidad'=> $request['identidad']
                 ]);*/

                 $newUser = new User();
                 $newUser->name = $request['primer_nombre'].' '.$request['segundo_nombre'].' '.$request['primer_apellido'].' '.$request['segundo_apellido'];
                 $newUser->email =$request['email_institucional'];
                 $newUser->password = Hash::make($request['identidad']);
                 $newUser->identidad=$request['identidad'];

                 $newUser->save();

                 Team::forceCreate([
                 'user_id' => $newUser->id,
                 'name' => explode(' ', $newUser->name, 2)[0]."'s Team",
                 'personal_team' => true,]);





            return "Exito se supone que si guardó";

        }catch(QueryException $e){
            DB::rollback();
            return $e;
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    public function getDeptos(){
        $depto_pais = DB::SELECT("select * from departamento_pais;");
        return $depto_pais;
    }

    public function getMunicipios($idDepto){
        $municipios = DB::SELECT("select * from municipio where departamento_pais_id ='$idDepto'");
        return $municipios;
    }

    public function getDeptosEmpleado(){
        $departamentos = DB::select("select * from departamento;");
        return $departamentos;
    }

    public function getAreaEmpleado($idDepto){
        $areas = DB::select("select * from area where departamento_id ='$idDepto'");
        return $areas;
    }

    public function getCargoEmpleado($idArea){
        $cargos = DB::select("select * from cargo where area_id ='$idArea'");
        return $cargos;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $primer_nombre = $request['primer_nombre'];
        $segundo_nombre = $request['segundo_nombre'];
        $primer_apellido = $request['primer_apellido'];
        $segundo_apellido = $request['segundo_apellido'];
        $fecha_nacimiento = $request['fecha_nacimiento'];
        $identidad = $request['identidad'];
        $telefono_1 = $request['telefono_1'];
        $nombre = $primer_nombre.' '.$segundo_nombre.' '.$primer_apellido.' '.$segundo_apellido;
        $rtn = $request['rtn'];
        $lugar_nacimiento = $request['lugar_nacimiento'];
        $estado_civil = $request['estado_civil'];
        $fecha_ingreso = $request['fecha_ingreso'];
        $estatus_id = $request['estatus_id'];
        $sueldo = $request['sueldo'];
        $email_institucional = $request['email_institucional'];
        $telefono_2 = $request['telefono_2'];
        /* DB::table('empleado')
            ->updateOrInsert(
                            ['primer_nombre' => $primer_nombre ])
            ->where('id', $id); */
             DB::table('empleado')
            ->where('id', $id)
            ->update(['primer_nombre' => $primer_nombre,
              'segundo_nombre' => $segundo_nombre,
              'primer_apellido' => $primer_apellido,
              'segundo_apellido' => $segundo_apellido,
              'fecha_nacimiento' => $fecha_nacimiento,
              'identidad' => $identidad,
              'telefono_1' => $telefono_1,
              'nombre' => $nombre,
              'rtn' => $rtn,
              'lugar_nacimiento' => $lugar_nacimiento,
              'estado_civil' => $estado_civil,
              'fecha_ingreso' => $fecha_ingreso,
              'estatus_id' => $estatus_id,
              'sueldo' => $sueldo,
              'email_institucional' => $email_institucional,
              'telefono_2' => $telefono_2]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
