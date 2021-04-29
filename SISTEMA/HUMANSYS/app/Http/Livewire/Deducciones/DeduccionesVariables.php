<?php

namespace App\Http\Livewire\Deducciones;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use DataTables;
use App\Models\deduccionesVariantes;

class DeduccionesVariables extends Component
{
    public function render()
    {
        return view('livewire.deducciones.deducciones-variables');
    }

    public function listar_deducciones_variables(){
        $deducVariables = DB::SELECT("SELECT * FROM tipo_deducciones_varibale");
         return Datatables::of($deducVariables)
            ->addColumn('id', function ($deducVariables) {
                return '<td>'.$deducVariables->id.'</td>';
            })
            ->addColumn('nombre', function ($deducVariables) {
                 return '<td>'.$deducVariables->nombre.'</td>';
            })
            ->addColumn('estado', function ($deducVariables) {
                $estado = DB::SELECTONE("SELECT * FROM estado_tdv WHERE id = $deducVariables->estado_tdv_id");
                if($estado->id == 1){
                    return '<td><span class="badge badge-pill badge-success">'.$estado->estado.'</span></td>';
                }else{
                    return '<td><span class="badge badge-pill badge-danger">'.$estado->estado.'</span></td>';
                }
            })
            ->addColumn('action', function ($deducVariables) {
                $comilla="'";
                if($deducVariables->estado_tdv_id == 1){
                    return '<div class="dropdown dropdown-action text-right">
                         <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                         <div class="dropdown-menu dropdown-menu-right">
                             <a class="dropdown-item" data-toggle="modal" href="" data-target="#editar_deduccion_variante" onclick="addIdTipoDeduccion('.$deducVariables->id.','.$comilla.''.$deducVariables->nombre.''.$comilla.')"><i class="fa fa-pencil m-r-5 text-warning"></i>Editar</a>
                             <a class="dropdown-item text-danger"  onclick="estadoVariantes('.$deducVariables->id.', '.$comilla.''.$deducVariables->nombre.''.$comilla.', '.$deducVariables->estado_tdv_id.')" ><i class="fa fa-trash-o m-r-5 text-danger" ></i >Desactivar</a>
                         </div>
                        </div>';
                }else{
                    return '<div class="dropdown dropdown-action text-right">
                         <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                         <div class="dropdown-menu dropdown-menu-right">
                             <a class="dropdown-item" data-toggle="modal" href="" data-target="#editar_deduccion_variante" ><i class="fa fa-pencil m-r-5 text-warning"></i>Editar</a>
                             <a class="dropdown-item text-success"  onclick="estadoVariantes('.$deducVariables->id.', '.$comilla.''.$deducVariables->nombre.''.$comilla.', '.$deducVariables->estado_tdv_id.')" ><i class="fa fa-trash-o m-r-5 text-success" ></i >Activar</a>
                         </div>
                        </div>';
                }

            })
            ->rawColumns(['id','nombre','estado', 'action'])
            ->make(true);
    }

    public function guardarVariantes(Request $request){
        $deduccionesVariantes= new deduccionesVariantes();
        $deduccionesVariantes-> nombre = $request['nombre_deduc_variante'];
        $deduccionesVariantes-> estado_tdv_id = 1;
        $deduccionesVariantes->save();
        return $deduccionesVariantes;
    }

    public function editarVariantes(Request $request, $id){
        $deduccionesVariantes = deduccionesVariantes::find($id);
        $deduccionesVariantes-> nombre = $request['nombre_deduc_variante_edit'];
        $deduccionesVariantes-> estado_tdv_id = $request['select_estado_deduc'];
            $deduccionesVariantes->save();

            return $deduccionesVariantes;
    }

    public function estadoVariantes($id, $idestado){
        $deduccionesVariantes = deduccionesVariantes::find($id);
        if($idestado == 1){
            $deduccionesVariantes-> estado_tdv_id = 0;
            $deduccionesVariantes->save();
        }else{
            $deduccionesVariantes-> estado_tdv_id = 1;
            $deduccionesVariantes->save();
        }

            return $deduccionesVariantes;
    }

    public function getEstadoVariante(){
        $estados = DB::SELECT("select * from estado_tdv;");
        return $estados;
    }
    public function geTipoDeducVariante(){
        $TipoDeducVariante = DB::SELECT("select * from tipo_deducciones_varibale;");
        return $TipoDeducVariante;
    }
}
