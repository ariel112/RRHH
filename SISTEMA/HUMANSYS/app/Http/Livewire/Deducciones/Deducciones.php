<?php

namespace App\Http\Livewire\Deducciones;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use DataTables;
use App\Models\techos;
use App\Models\deducciones_fijas;
class Deducciones extends Component
{
    public function render(Request $request)
    {
        return view('livewire.deducciones.deducciones',['techos' => techos::where('deducciones_id', '=', $request['id'])->get(),'deducciones' => deducciones_fijas::where('id', '=', $request['id'])->get()]);
    }

    public function listar_deducciones(){
        $deducciones = DB::SELECT("select * from deducciones");
        /* select D.nombre, T.rango_inicio, T.rango_final, T.porcentaje from deducciones D
        inner join techos T on (D.id = T.deducciones_id) ; */
        return Datatables::of($deducciones)
        ->addColumn('action', function ($deducciones) {

       return '<div class="dropdown dropdown-action text-right">
                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" data-toggle="modal" data-target="#editar_deduc" onclick="editDeduccion('.$deducciones->id.')"  ><i class="fa fa-pencil m-r-5 text-warning"></i> Editar</a>
                    <a class="dropdown-item text-danger" href="#" onclick="inactivar('.$deducciones->id.')" ><i class="fa fa-trash-o m-r-5 text-danger" ></i > Eliminar</a>
                </div>
               </div>';
                })
        ->addColumn('perfil', function ($deducciones) {
            return '<a href="/deducciones/perfil_mostrar/'.$deducciones->id.'" class="avatar"><img alt="" src="../../assets/img/_720.png"></a>';
                })
                /*{{route('deducciones',$deducciones->id)}}*/
        ->editColumn('id', 'ID: {{$id}}')
        ->rawColumns(['action','perfil'])
        ->make(true);
    }

    public function lista_techos(Request $request){
        $techos = DB::SELECT("select * from techos where deducciones_id = ".$request['id']."");
        /* select D.nombre, T.rango_inicio, T.rango_final, T.porcentaje from deducciones D
        inner join techos T on (D.id = T.deducciones_id) ; */
        return Datatables::of($techos)
        ->addColumn('action', function ($techos) {

       return '<div class="dropdown dropdown-action text-right">
                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" data-toggle="modal" data-target="#editar_deduc" onclick="editDeduccion('.$techos->id.')"  ><i class="fa fa-pencil m-r-5 text-warning"></i> Editar</a>
                    <a class="dropdown-item text-danger" href="#" onclick="inactivar('.$techos->id.')" ><i class="fa fa-trash-o m-r-5 text-danger" ></i > Eliminar</a>
                </div>
               </div>';
                })
        ->addColumn('perfil', function ($techos) {
            return '<a href="/deducciones/perfil_mostrar/'.$techos->id.'" class="avatar"><img alt="" src="../../assets/img/_720.png"></a>';
                })
                /*{{route('deducciones',$deducciones->id)}}*/
        ->editColumn('id', 'ID: {{$id}}')
        ->rawColumns(['porcentaje','rango_inicio','perfil'])
        ->make(true);
    }
}
