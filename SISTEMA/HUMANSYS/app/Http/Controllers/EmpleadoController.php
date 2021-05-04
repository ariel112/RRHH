<?php

namespace App\Http\Controllers;

use App\Models\direccion;
use App\Models\empleado;
use App\Models\referencia;
use App\Models\deducciones_empleado;
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
    public function guardar(Request $request){
        


        /* dd($request); */

        /* DB::beginTransaction(); */
        $identidadEmpl = $request['identidad'];
        $ident = str_replace ( "-" , "", $identidadEmpl );
        $identResult = str_replace ( "_" , "", $ident);

        $identidadRe = $request['identidad_referencia'];
        $identRE = str_replace ( "-" , "",$identidadRe);
        $identResultRE = str_replace ( "_" , "", $identRE);

        try{

            $empleados = new empleado();
            $empleados->identidad = $identResult;
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
            $empleados->sueldo = 0;
            $empleados->rtn = $request['rtn'];
            $empleados->genero = $request['genero'];
            $empleados->profesion = $request['profesion'];
            $empleados -> save();

            $direccion = new direccion();
            $direccion->numero_casa = $request['numero_casa'];
            $direccion->descripcion = $request['descripcion'];
            $direccion->empleado_id = $empleados -> id;
            $direccion -> save();

            $referencias = new referencia();
            $referencias->nombre = $request['nombre_referencia'];
            $referencias->identidad= $identResultRE;
            $referencias->telefono = $request['telefono_referencia'];
            $referencias->email = $request['email_referencia'];
            $referencias->direccion = $request['direccion_referencia'];
            $referencias->parentezco = $request['parentezco_referencia'];
            $referencias->empleado_id = $empleados -> id;
            $referencias->estatus_referencia_id = 1;
            $referencias -> save();



           return $empleados;

        }catch(QueryException $e){
            DB::rollback();
            return $e;
        }



    }

    public function guardarDeduccion(Request $request){
        $deduc = new deducciones_empleado();
        /* $deduc->nombre = $request['nombre_deduc']; */
        $deduc->descripcion = $request['descripcion_deduc'];
        $deduc->tipo_deducciones_id = 1;
        $deduc->empleado_id = $request['idEmpleadoDe'];
        $deduc->monto = $request['monto_deduc'];
        $deduc->porcentaje = $request['porcentaje_deduc'];
        $deduc->tipo_deducciones_varibale_id=$request['TipodeducSelect_VARIABLES'];
        $deduc->estado = 1;
        $deduc -> save();

        return $deduc;
    }

    public function desactivarDeduccion($id){
        $ded = DB::SELECTONE("select estado, id from deducciones_empleado where id = 61;");
        dd($ded);
        if($ded->estado == 0){
            DB::table('deducciones_empleado')
            ->where('id', $ded->id)
            ->update(['estado' => 1]);
        }else{
            DB::table('deducciones_empleado')
            ->where('id', $ded->id)
            ->update(['estado' => 0]);
        }

    }

    public function guardarReferencia(Request $request, $id){
        $identidadRef = $request['identidad_referencia'];
        $ident = str_replace ( "-" , "", $identidadRef);
        $identResult = str_replace ( "_" , "", $ident);

        $referencias = new referencia();
            $referencias->nombre = $request['nombre_referencia'];
            $referencias->identidad = $identResult;
            $referencias->telefono = $request['telefono_referencia'];
            $referencias->email = $request['email_referencia'];
            $referencias->direccion = $request['direccion_referencia'];
            $referencias->parentezco = $request['parentezco_referencia'];
            $referencias->empleado_id = $id;
            $referencias->estatus_referencia_id = 1;
            $referencias -> save();

            return $referencias;
    }

    public function getReferencias($id){
        $referencias = DB::SELECT("select * from referencia where id ='$id'");
        return $referencias;
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

    public function gettipodeducVariable(){
        $tipodeducVariabl = DB::SELECT("select * from tipo_deducciones_varibale;");
        return $tipodeducVariabl;
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
        $genero = $request['genero'];
        $profesion = $request['profesion'];
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
              'telefono_2' => $telefono_2,
              'genero'=>$genero,
              'profesion'=>$profesion]);
    }

    public function updateReferencia(Request $request, $id){

        $nombre = $request['nombre_referencia_edit'];
        $identidad = $request['identidad_referencia_edit'];
        $telefono = $request['telefono_referencia_edit'];
        $email = $request['email_referencia_edit'];
        $parentezco = $request['parentezco_referencia_edit'];
        $direccion = $request['direccion_referencia_edit'];
        $estatus_referencia_id =$request['estado_referencia_edit'];
        /* DB::table('empleado')
            ->updateOrInsert(
                            ['primer_nombre' => $primer_nombre ])
            ->where('id', $id); */
             DB::table('referencia')
            ->where('id', $id)
            ->update(['nombre' => $nombre,
              'identidad' => $identidad,
              'telefono' => $telefono,
              'email' => $email,
              'direccion' => $direccion,
              'parentezco' => $parentezco,
              'estatus_referencia_id' => $estatus_referencia_id]);
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
