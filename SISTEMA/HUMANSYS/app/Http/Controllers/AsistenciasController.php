<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\asistencia;

class AsistenciasController extends Controller
{


    public function marcajeDeEntrada($id){
        $now = new \DateTime();
        $fechaHoy = date("Y-m-d");
        $asistencia = new asistencia();
        if($now->format('H:i')<="08:10"){
            $asistencia -> entrada_fija = $now->format('Y-m-d 08:10:00');
            $asistencia -> entrada_real = $now->format('Y-m-d H:i:s');
            $asistencia -> fecha_dia = $fechaHoy;
            $asistencia -> empleado_id = $id;
            $asistencia -> save();
        }else{
            $asistencia -> entrada_fija = $now->format('Y-m-d H:i:s');
            $asistencia -> entrada_real = $now->format('Y-m-d H:i:s');
            $asistencia -> fecha_dia = $fechaHoy;
            $asistencia -> empleado_id = $id;
            $asistencia -> save();
        }
        return $asistencia;
    }

    public function marcajeDeSalida($id){
        $now = new \DateTime();
        $asistencia = new asistencia();
        $fechaHoy = date("Y-m-d");
        if($now->format('H:i')>="17:00"){
            $asistencia -> salida_fija = $now->format('Y-m-d 17:00:00');
            $asistencia -> salida_real = $now->format('Y-m-d H:i:s');
            $asistencia -> fecha_dia_salida = $fechaHoy;
            $asistencia -> empleado_id = $id;
            $asistencia -> save();
        }else{
            $asistencia -> salida_fija = $now->format('Y-m-d H:i:s');
            $asistencia -> salida_real = $now->format('Y-m-d H:i:s');
            $asistencia -> fecha_dia_salida = $fechaHoy;
            $asistencia -> empleado_id = $id;
            $asistencia -> save();
        }
        return $asistencia;
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
