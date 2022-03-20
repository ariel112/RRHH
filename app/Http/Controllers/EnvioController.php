<?php

namespace App\Http\Controllers;

use App\Mail\EnvioMasivo;
use Illuminate\Http\Request;

use App\Mail\SendMailable;
use DB;
use Illuminate\Support\Facades\Mail;

class EnvioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $correos = ['yefryyo@gmail.com', 'luisfaviles18@gmail.com'];
        $subject = 'Solicitud de permiso';
        $for = $correos;
        Mail::send('name',['data' => '$passTemporal'], function($msj) use($subject,$for){
            $msj->from("humansys2021@gmail.com","SISTEMA DE TALENTO HUMANO");
            $msj->subject($subject);
            $msj->to($for);
        });

        return response()->json('Exito');
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
