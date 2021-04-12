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

     

        return response()->json('EXITO');


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
        $cargos = DB::select("SELECT A.id, A.nombre cargo, B.nombre area, C.nombre gerencia, (SELECT COUNT(Z.id) FROM funciones Z WHERE Z.cargo_id =A.id) funciones
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
                    <a class="dropdown-item" data-toggle="modal" data-target="#editar_cargos" onclick="editcontrato('.$cargos->id.')"  ><i class="fa fa-pencil m-r-5"></i> Editar</a>
                    <a class="dropdown-item" data-toggle="modal" data-target="#vw_cargos" onclick="setcargo('.$cargos->id.')" ><i class="fa fa-eye m-r-5"></i> Ver</a>
                </div>
            </div>';


        // return  '<a href="http://localhost:8280/edusystem/public/index.php/becarios/actualizacion/ver/'.$cargos->id.'">           
        //             <img class="center-imagen" width=40 height=40 src="http://localhost:8280/edusystem/public/images/'.($cargos->genero == 1 ? "estudentM.png" : "estudentF.png").'" alt="User profile picture">
        //         </a>';                
                })

        ->editColumn('id', 'ID: {{$id}}')
        ->make(true);

        

    }


    public function cargo_muestra($id){

    $cargo = DB::select("SELECT A.id id_cargo,
                                    A.nombre cargo, 
                                    B.id id_area, B.nombre area, 
                                    C.id id_gerencia, C.nombre gerencia,
                                    D.nombre tipo_empleado, D.id id_empleado_tipo

                                            FROM cargo A 
                                            INNER JOIN area B 
                                            ON(A.area_id=B.id)
                                            INNER JOIN departamento C 
                                            ON(B.departamento_id=C.id)
                                            INNER JOIN tipo_empleado D
                                            ON(D.id=A.tipo_empleado_id)
                                            WHERE A.id='$id'");

      $funciones = DB::select("SELECT * FROM funciones A
                                WHERE A.cargo_id='$id'");

      $tipo_empleado = DB::select("SELECT * FROM tipo_empleado");
      

    
            return response()->json([                    
                'cargo' => $cargo,
                'funciones' => $funciones,
                'tipo_empleado' => $tipo_empleado
            ]);

    }


    public function cargos_edit(Request $request){

  
        

        $cargo = cargo::find($request->id_cargo);
        $cargo->nombre = $request->cargo_nombre;
        $cargo->area_id =$request->area;
        $cargo->tipo_empleado_id =$request->tipo_empleado;
        $cargo->save();


       
        // editar funciones
        $funciones = $request->input("funciones_editar");
        $id_funcion = $request->input("id_funcion");
        if(!empty($funciones)){
        
            for ($i=0; $i <sizeof($id_funcion) ; $i++) { 
                   $funcion = funciones::find($id_funcion[$i]);
                   $funcion->nombre=$funciones[$i];
                   $funcion->save();

            }

            
            
        }


        // agregar funciones

        $funciones_editar = $request->input("funciones");
        
        if($funciones_editar){

        foreach ($funciones_editar as $fun => $val) {
          $funcion = new funciones();
          $funcion->nombre=$val;
          $funcion->cargo_id= $cargo->id;
          $funcion->save();
        }

    }


       return response()->json('EXITO');


    }


    public function eliminar_funciones($id){

        $id_data=$id;
        funciones::destroy($id);


        return response()->json($id_data);

    }


}
