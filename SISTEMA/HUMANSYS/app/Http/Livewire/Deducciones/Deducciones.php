<?php

namespace App\Http\Livewire\Deducciones;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use DataTables;

class Deducciones extends Component
{
    public function render()
    {
        return view('livewire.deducciones.deducciones');
    }

    public function listar_deducciones(){
        $deducciones = DB::SELECT("select * from deducciones");
        return Datatables::of($deducciones)
        ->addColumn('action', function ($deducciones) {

       return '<div class="dropdown dropdown-action text-right">
                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" data-toggle="modal" data-target="#editar_contratos" onclick="editcontrato('.$deducciones->id.')"  ><i class="fa fa-pencil m-r-5 text-warning"></i> Editar</a>
                    <a class="dropdown-item text-danger" href="#" onclick="eliminar_contrato('.$deducciones->id.')" ><i class="fa fa-trash-o m-r-5 text-danger" ></i > Eliminar</a>
                </div>
               </div>';
                })
        ->addColumn('perfil', function ($deducciones) {
            return '<a href="#" class="avatar"><img alt="" src="../../assets/img/c.jpg"></a>';
                })

        ->editColumn('id', 'ID: {{$id}}')
        ->rawColumns(['action','perfil'])
        ->make(true);
    }
}
