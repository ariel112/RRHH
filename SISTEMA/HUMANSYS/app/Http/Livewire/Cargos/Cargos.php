<?php

namespace App\Http\Livewire\Cargos;

use App\Models\cargo;
use App\Models\funciones;
use Livewire\Component;
use Illuminate\Http\Request;

use DataTables;
use Illuminate\Support\Facades\DB;

class Cargos extends Component
{
    public function render()
    {
        return view('livewire.cargos.cargos');
    }

    public function cargo_show(Request $request){

        $cargo = new cargo();
        $cargo->nombre = $request->cargo;
        $cargo->area_id = $request->area;
        $cargo->tipo_empleado_id = $request->tipo_empleado;
        $cargo->save();

        $funciones = $request->input("funciones");
   
        foreach ($funciones as $fun => $val) {
          $funcion = new funciones();
          $funcion->nombre=$val;
          $funcion->cargo_id= $cargo->id;
          $funcion->save();
        }

     

        return 'EXITO';


    }


    public function cargo_listar(){
        // $cargos = DB::select("SELECT A.id, A.nombre cargo, B.nombre area, C.nombre gerencia
        //         FROM cargo A 
        //         INNER JOIN area B 
        //         ON(A.area_id=B.id)
        //         INNER JOIN departamento C 
        //         ON(B.departamento_id=C.id)
        //         LEFT JOIN funciones D 
        //         ON(A.id=D.cargo_id)
        //         ");
        $cargos = DB::select("SELECT A.id, A.nombre cargo, B.nombre area, C.nombre gerencia, COUNT(1) funciones
                FROM cargo A 
                INNER JOIN area B 
                ON(A.area_id=B.id)
                INNER JOIN departamento C 
                ON(B.departamento_id=C.id)
                LEFT JOIN funciones D 
                ON(A.id=D.cargo_id)
                GROUP by A.nombre, A.id, B.nombre, C.nombre");

        return Datatables::of($cargos)
        ->addColumn('action', function ($cargos) {
        
       return '<div class="dropdown dropdown-action text-right">
                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="edit-invoice.html"><i class="fa fa-pencil m-r-5"></i> Editar</a>
                    <a class="dropdown-item" href="invoice-view.html"><i class="fa fa-eye m-r-5"></i> Ver</a>
                </div>
            </div>';


        // return  '<a href="http://localhost:8280/edusystem/public/index.php/becarios/actualizacion/ver/'.$cargos->id.'">           
        //             <img class="center-imagen" width=40 height=40 src="http://localhost:8280/edusystem/public/images/'.($cargos->genero == 1 ? "estudentM.png" : "estudentF.png").'" alt="User profile picture">
        //         </a>';                
                })

        ->editColumn('id', 'ID: {{$id}}')
        ->make(true);

        

    }
}
