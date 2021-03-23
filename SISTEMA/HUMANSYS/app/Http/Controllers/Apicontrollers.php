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


    public function empleado_contrato(){
        $empleado = DB::select("SELECT A.id, A.identidad, A.nombre, D.nombre departamento, B.nombre cargo
        from empleado A
        INNER JOIN cargo B 
        ON(A.id=B.empleado_id)
        INNER JOIN area C 
        ON(B.area_id=C.id)
        INNER JOIN departamento D 
        ON(C.departamento_id=D.id)
        WHERE A.estatus_id = 1");

        return $empleado;
        
    }
}
