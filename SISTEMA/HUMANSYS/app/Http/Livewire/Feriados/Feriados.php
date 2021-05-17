<?php

namespace App\Http\Livewire\Feriados;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use DataTables;

class Feriados extends Component
{
    public function render()
    {
        return view('livewire.feriados.feriados');
    }

    public function listar_feriados(){
        $feriados = DB::SELECT("SELECT * FROM feriados");
         return Datatables::of($feriados)
            ->addColumn('id', function ($feriados) {
                return '<td>'.$feriados->id.'</td>';
            })
            ->addColumn('fecha', function ($feriados) {
                 return '<td>'.$feriados->fecha_dia.'</td>';
            })
            ->addColumn('motivo', function ($feriados) {
                 return '<td>'.$feriados->motivo.'</td>';
            })
            ->addColumn('user', function ($feriados) {
                $usuario = DB::SELECTONE("select * from users where id = '".$feriados->users_id."'");
                return '<td>'.$usuario->name.'</td>';
            })
            ->addColumn('estatus', function ($feriados) {
                if($feriados->estatus_id == 1){
                    return '<td><td><span class="badge bg-inverse-success">ACTIVO</span></td></td>';
                }else{
                    return '<td><span class="badge bg-inverse-danger">INACTIVO</span></td>';
                }
            })
            ->addColumn('actions', function ($feriados) {
                if($feriados->estatus_id == 1){
                    return '<div class="dropdown dropdown-action text-right">
                         <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                         <div class="dropdown-menu dropdown-menu-right">
                             <a class="dropdown-item" data-toggle="modal"  data-target="#editar_deduccion_variante" onclick="renderDatodsEditar_modal()" ><i class="fa fa-pencil m-r-5 text-warning"></i>Editar</a>
                             <a class="dropdown-item text-danger"  onclick="estadoVariantes()" ><i class="fa fa-trash-o m-r-5 text-danger" ></i >Desactivar</a>
                         </div>
                        </div>';
                }else{
                    return '<div class="dropdown dropdown-action text-right">
                         <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                         <div class="dropdown-menu dropdown-menu-right">
                             <a class="dropdown-item" data-toggle="modal" data-target="#editar_deduccion_variante" onclick="renderDatodsEditar_modal()"><i class="fa fa-pencil m-r-5 text-warning"></i>Editar</a>
                             <a class="dropdown-item text-success" onclick="estadoVariantes()" ><i class="fa fa-trash-o m-r-5 text-success" ></i >Activar</a>
                         </div>
                        </div>';
                }

            })
            ->editColumn('id', '{{$id}}')
            ->rawColumns(['id','fecha', 'motivo','user','estatus','actions'  ])
            ->make(true);
    }

}
