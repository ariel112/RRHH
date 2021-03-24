<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\contrato;

class Apicontrollers extends Controller
{

    public function gerente(){

        $gerente = DB::select("SELECT A.identidad, A.nombre, A.rtn, A.id
        FROM empleado A
        INNER JOIN cargo B
        ON(A.cargo_id=B.id)
        INNER JOIN area C
        ON(C.id=B.area_id)
        WHERE C.id=35");

        return $gerente;

    }


    public function empleado_contrato(Request $request){
        /* $empleado = DB::select("SELECT A.id, A.identidad, A.nombre, D.nombre departamento, B.nombre cargo
        from empleado A
        INNER JOIN cargo B
        ON(A.cargo_id=B.id)
        INNER JOIN area C
        ON(B.area_id=C.id)
        INNER JOIN departamento D
        ON(C.departamento_id=D.id)
        WHERE A.estatus_id = 1");
        return $empleado; */

        $empleado = DB::select("SELECT A.id, A.identidad, A.nombre, D.nombre departamento, B.nombre cargo
        from empleado A
        INNER JOIN cargo B
        ON(A.cargo_id=B.id)
        INNER JOIN area C
        ON(B.area_id=C.id)
        INNER JOIN departamento D
        ON(C.departamento_id=D.id)
        WHERE A.estatus_id = 1 AND LIKE A.nombre %$request%");
        return $empleado;


        /* $empleado =DB::select("select * from empleado;");
        return $empleado; */



           /*  $term = $request->term ?: '';
            $tags = App\Tag::where('name', 'like', $term.'%')->lists('name', 'id');
            $valid_tags = [];
            foreach ($tags as $id => $tag) {
                $valid_tags[] = ['id' => $id, 'text' => $tag];
            }
            return response()->json($valid_tags); */
    }

    public function area($id){
        $area = DB::select("SELECT A.id, A.nombre
        FROM area A
        WHERE A.departamento_id='$id'");

        return $area;

    }
}
