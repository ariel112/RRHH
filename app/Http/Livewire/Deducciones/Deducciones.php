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
        /* $deducciones = DB::SELECT("select * from deducciones"); */
        $deducciones = DB::SELECT("SELECT D.id, D.nombre,TD.nombre_, D.url_imagen, D.tipo_deducciones_id, D.estatus FROM deducciones D INNER JOIN tipo_deducciones TD ON(TD.id=D.tipo_deducciones_id)/*  WHERE D.id = 23 */");
        /* select D.nombre, T.rango_inicio, T.rango_final, T.porcentaje from deducciones D
        inner join techos T on (D.id = T.deducciones_id) ; */
        return Datatables::of($deducciones)
            ->addColumn('action', function ($deducciones) {

        return '<div class="dropdown dropdown-action text-right">
                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" data-toggle="modal" href="" data-target="#editar_deduc" onclick="editDeduccion('.$deducciones->id.')"  ><i class="fa fa-pencil m-r-5 text-warning"></i>Modificar nombre</a>
                    </div>
                </div>';
                    })
            ->addColumn('perfil', function ($deducciones) {
                return '<a href="/deducciones/perfil_mostrar/'.$deducciones->id.'" class="avatar"><img alt="" src="../../assets/img/_720.png"></a>';
                    })
                    /*{{route('deducciones',$deducciones->id)}}*/

            ->addColumn('estado', function ($deducciones) {
                return '<td><span class="badge badge-pill badge-warning">'.$deducciones->nombre_.'</span></td>';
            })
            ->addColumn('item', function ($deducciones) {

                if($deducciones->estatus==1){
                    return '<td><span class="badge badge-pill badge-success">ACTIVO</span></td>';
                } else if($deducciones->estatus==0){
                    return '<td><span class="badge badge-pill badge-danger">INACTIVO</span></td>';
                }
        })
            ->editColumn('id', 'ID: {{$id}}')
            ->rawColumns(['action','perfil','estado','item'])
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
                    <a class="dropdown-item" data-toggle="modal" href="" data-target="#editar_techo"><i class="fa fa-pencil m-r-5 text-warning"></i> Editar</a>
                </div>
               </div>';
                })
        ->addColumn('perfil', function ($techos) {
            return '<a href="/deducciones/perfil_mostrar/'.$techos->id.'" class="avatar"><img alt="" src="../../assets/img/_720.png"></a>';
                })
                /*{{route('deducciones',$deducciones->id)}}*/
        ->editColumn('id', 'ID: {{$id}}')
        ->rawColumns(['porcentaje','rango_inicio','perfil', 'action'])
        ->make(true);
    }
}
