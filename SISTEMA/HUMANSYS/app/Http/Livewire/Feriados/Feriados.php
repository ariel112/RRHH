<?php

namespace App\Http\Livewire\Feriados;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\feriado;
use DataTables;
use Illuminate\Http\Request;
use Auth;


class Feriados extends Component
{
    public function render()
    {
        return view('livewire.feriados.feriados');
    }

    public function getFeriadoEdit($id){
        $feriado = DB::SELECTONE("select * from feriado where id = '".$id."'");
        return response()->json($feriado);
    }

    public function editFeriado(Request $request){

        $feriado = DB::SELECTONE("select * from feriado where id = '".$request['id_Feriado_edit']."'");
        DB::table('feriado')
            ->where('id', $feriado->id)
            ->update(['fecha_dia' => $request['fecha_dia_edit'], 'motivo' => $request['motivo_edit'], 'users_id' => Auth::user()->id]);

       /*  return $feriado; */
    }

    public function addFeriado(Request $request){
        $feriados = new feriado();
        $feriados->fecha_dia = $request['fecha_dia'];
        $feriados->motivo = $request['motivo'];
        $feriados->users_id = Auth::user()->id;
        $feriados->estatus_id = 1;
        $feriados->save();

        return $feriados;
    }

    public function cambio_estado_feriado($idFeriado){
        $feriado = DB::SELECTONE("select * from feriado where id = '".$idFeriado."'");
        if($feriado->estatus_id == 1){
            DB::table('feriado')
            ->where('id', $idFeriado)
            ->update(['estatus_id' => 2]);
            return 'cambiado';
        }else{
            DB::table('feriado')
            ->where('id', $idFeriado)
            ->update(['estatus_id' => 1]);
            return 'cambiado';
        }
        return 420;
    }

    public function listar_feriados(){
        $feriados = DB::SELECT("SELECT * FROM feriado");
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
                             <a class="dropdown-item" href="" data-toggle="modal"  data-target="#editar_deduccion_variante" onclick ="feriados_edit_llenar('.$feriados->id.')"><i class="fa fa-pencil m-r-5 text-warning"></i>Editar</a>
                             <a class="dropdown-item text-danger" href="" onclick="cambiarEstadoFeriado('.$feriados->id.')" ><i class="fa fa-trash-o m-r-5 text-danger" ></i >Desactivar</a>
                         </div>
                        </div>';
                }else{
                    return '<div class="dropdown dropdown-action text-right">
                         <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                         <div class="dropdown-menu dropdown-menu-right">
                             <a class="dropdown-item" href="" data-toggle="modal" data-target="#editar_deduccion_variante" onclick ="feriados_edit_llenar('.$feriados->id.')"><i class="fa fa-pencil m-r-5 text-warning"></i>Editar</a>
                             <a class="dropdown-item text-success" href="" onclick="cambiarEstadoFeriado('.$feriados->id.')" ><i class="fa fa-trash-o m-r-5 text-success" ></i >Activar</a>
                         </div>
                        </div>';
                }

            })
            ->editColumn('id', '{{$id}}')
            ->rawColumns(['id','fecha', 'motivo','user','estatus','actions'  ])
            ->make(true);
    }

}
