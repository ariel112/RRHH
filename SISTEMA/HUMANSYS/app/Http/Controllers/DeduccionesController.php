<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\deducciones_fijas;
use App\Models\techos;
use Illuminate\Support\Facades\DB;
use DataTables;

class DeduccionesController extends Controller
{
    public function guardarTechos(Request $request){
        $techos = new techos();
        $techos->porcentaje = $request["porcentaje_techo"];
        $techos->rango_inicio = $request["rangoInicio_techo"];
        $techos->rango_final = $request["rangoFinal_techo"];
        $techos->deducciones_id = $request["idde"];
        $techos -> save();
        return $techos;
    }

    public function guardar(Request $request){
        $deducciones = new deducciones_fijas();
        $deducciones->nombre = $request['nombre_deduccion'];
        $deducciones->tipo_deducciones_id = 2;
        $deducciones->estatus=1;
        $deducciones -> save();

        $techos = new techos();
        $techos->porcentaje = $request["porcentaje_techo"];
        $techos->rango_inicio = $request["rangoInicio_techo"];
        $techos->rango_final = $request["rangoFinal_techo"];
        $techos->deducciones_id = $deducciones-> id;
        $techos -> save();

        return $deducciones;
    }

    public function actualizarEstado($id, $estatus){

            $deducciones = deducciones_fijas::find($id);
            if($estatus==1){$deducciones-> estatus = 0;}elseif($estatus==0){$deducciones-> estatus = 1;}
            $deducciones->save();

            return $deducciones;
    }

    public function editTechos($id, Request $request){
            $techos = techos::find($id);
            $techos-> porcentaje = $request['porcentaje_techo_edit'];
            $techos-> rango_inicio = $request['rangoInicio_techo_edit'];
            $techos-> rango_final = $request['rangoFinal_techo_edit'];
            $techos->save();

            return $techos;
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
