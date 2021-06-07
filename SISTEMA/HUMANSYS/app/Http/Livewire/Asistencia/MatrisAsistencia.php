<?php

namespace App\Http\Livewire\Asistencia;

use Livewire\Component;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PermisoMedioDia;
use Illuminate\Support\Facades\Auth;
use App\Models\empleado;

class MatrisAsistencia extends Component
{
    public function render()
    {
        return view('livewire.asistencia.matris-asistencia');
    }


    public function obtenerMatriz(){
        try{
            $identidadUser = Auth::user()->identidad;
            $idEmpleado = empleado::where('identidad', '=', $identidadUser)
            ->select('id')
            ->get();
            $id = $idEmpleado[0]['id'];
            $sinRegistros = "'No existen registros'";
            $matriz = DB::SELECT('select  IF(entrada_real is null, '.$sinRegistros.' ,entrada_real) as entrada,IF(salida_real is null, '.$sinRegistros.' ,salida_real)  as salida, IF(minutos_tarde is null, 0,minutos_tarde ) as minutos_tarde , monto_deduccion from asistencia where empleado_id ='.$id);

             return response()->json(['data'=>$matriz],200);
        }catch(QueryException $e){

             return response()->json([
            'error'=>$e,
            ],402); }
        }

}
