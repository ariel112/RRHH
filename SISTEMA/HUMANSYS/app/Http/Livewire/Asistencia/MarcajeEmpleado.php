<?php

namespace App\Http\Livewire\Asistencia;

use Livewire\Component;
use Auth;
use DB;
use Illuminate\Http\Request;

class MarcajeEmpleado extends Component
{
    public function render(Request $request)
    {
        $ipAddress = $request->ip();
        $comparacion = substr( $ipAddress, 0, 9);  // devuelve "abcde"
        /* dd($ipAddress); */

        if($comparacion === '10.62.144'){
            $identidad = Auth::user()->identidad;
        $fechaHoy = date("Y-m-d");
        $empleado = DB::selectone("select * from empleado where identidad = ".$identidad);
        $asistencias = DB::SELECTONE("SELECT COUNT(id) as 'conteo', fecha_dia as fecha FROM asistencia WHERE empleado_id ='".$empleado->id."' AND fecha_dia = '".$fechaHoy."' ");
        $asistenciasSalida = DB::SELECTONE("SELECT COUNT(id) as 'conteo', fecha_dia_salida as fechaSalidaHoy FROM asistencia WHERE empleado_id ='".$empleado->id."' AND fecha_dia_salida = '".$fechaHoy."' ");
        /* dd($asistencias); */
        return view('livewire.asistencia.marcaje-empleado', [
            'empleado' => $empleado,
            'asistencia' => $asistencias,
            'asisSalida' => $asistenciasSalida
            ]);
        }else{

          dd($ipAddress);
        }


    }
}
