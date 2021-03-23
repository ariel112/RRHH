<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Apicontrollers extends Controller
{
    
    public function gerente(){

        $gerente = DB::select("SELECT A.identidad, A.nombre, A.rtn, A.id
        FROM empleado A 
        INNER JOIN cargo B 
        ON(A.id=B.empleado_id)
        INNER JOIN area C 
        ON(C.id=B.area_id)
        WHERE C.id=35");

        return $gerente;
        
    }
}
