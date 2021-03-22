<?php

namespace App\Http\Controllers;

use App\Models\empleado;
use Illuminate\Http\Request;
use DB;

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
    public function store(Request $request)
    {
        $empleados = new empleado();
        $empleados->identidad = $request['identidad'];
        $empleados->nombre = $request['primer_nombre'].' '.$request['segundo_nombre'].' '.$request['primer_apellido'].' '.$request['segundo_apellido'];
        $empleados->primer_nombre = $request['primer_nombre'];
        $empleados->segundo_nombre = $request['segundo_nombre'];
        $empleados->primer_apellido = $request['primer_apellido'];
        $empleados->segundo_apellido = $request['segundo_apellido'];
        $empleados->fecha_nacimiento = $request['fecha_nacimiento'];
        $empleados->fecha_ingreso = $request['fecha_ingreso'];
        $empleados->email = $request['email'];
        $empleados->email_institucional = $request['email_institucional'];
        $empleados->estado_civil = $request['estado_civil'];
        $empleados->lugar_nacimiento = $request['lugar_nacimiento'];
        $empleados->descripcion_laboral = $request['descripcion_laboral'];
        $empleados->telefono_1 = $request['telefono_1'];
        $empleados->telefono_2 = $request['telefono_2'];
        $empleados->estatus_id = $request['estatus_id'];
        $empleados->grado_academico_id = $request['grado_academico_id'];
        $empleados->estatus_id = $request['municipio_id'];

        $empleados -> save();

        return "Exito";
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
    public function update(Request $request, $id)
    {
        //
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
