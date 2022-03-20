<?php

namespace App\Http\Livewire\Planilla;

use Livewire\Component;
use Auth;
use DataTables;
use Illuminate\Support\Facades\DB;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Http\Request;
use App\Models\reembolso_;

class ReembolsoHistorico extends Component
{
    public function render()
    {
        return view('livewire.planilla.reembolso-historico');
    }

    public function tbl_reembolso(){
        $reembolsos = DB::SELECT("SELECT * FROM reembolso WHERE estatus_id = 1");

         return Datatables::of($reembolsos)
            ->addColumn('id', function ($reembolsos) {
                return '<td>'.$reembolsos->id.'</td>';
            })
            ->addColumn('estado', function ($reembolsos) {
                return '<td>'.$reembolsos->estatus_id.'</td>';
            })
            ->addColumn('empleado', function ($reembolsos) {
                $empleado = DB::SELECTONE("SELECT * FROM empleado WHERE id = '".$reembolsos->empleado_id."' ");
                return '<td>'.$empleado->nombre.'</td>';
            })
            ->addColumn('monto', function ($reembolsos) {
                return '<td>'.$reembolsos->monto.'</td>';
            })
            ->addColumn('nombre', function ($reembolsos) {
                return '<td>'.$reembolsos->nombre_reembolso.'</td>';
            })
            ->addColumn('descripcion', function ($reembolsos) {
                return '<td>'.$reembolsos->descripcion_reembolso.'</td>';
            })
            ->addColumn('planilla', function ($reembolsos) {
                return '<td>'.$reembolsos->planilla_id_error.'</td>';
            })
            ->addColumn('acciones', function ($reembolsos) {
                $empleado = DB::SELECTONE("SELECT * FROM empleado WHERE id = '".$reembolsos->empleado_id."' ");
                $comiilla= "'";
                    return '<div class="dropdown dropdown-action text-right">
                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#" onclick ="abrirModalReembolso_edit('.$reembolsos->id.', '.$comiilla.''.$empleado->nombre.''.$comiilla.')"><i style="color:#0C4B98;" class="fa fa-eye m-r-5 "></i>Ver reembolso</a>
                        <a class="dropdown-item" href="#" onclick ="desactivarReembolso('.$reembolsos->id.', '.$comiilla.''.$empleado->nombre.''.$comiilla.', '.$reembolsos->monto.')"><i style="color:#DF0C0C ;" class="fas fa-ban m-r-5 "></i>Desactivar</a>
                    </div>
                    </div>';


            })
            ->rawColumns(['id','estado', 'empleado','monto','nombre','descripcion', 'planilla','acciones'])
            ->make(true);
    }

    public function listar_reembolsosedit($idReembolso){
        $reembolso = DB::SELECTONE("select * from reembolso where id='".$idReembolso."'");
        return response()->json($reembolso);
    }

    public function editarReembolso(Request $request){

        $reembolso_edit = reembolso_::find($request->id_reembolso_edit);
        $reembolso_edit->monto = $request->monto_edit;
        $reembolso_edit->nombre_reembolso = $request->nombre_reembolso_edit;
        $reembolso_edit->descripcion_reembolso = $request->descripcion_edit;
        $reembolso_edit->save();
        return response()->json('EXITO');

    }

    public function desactivar($idreembolso){
        $reembolso = reembolso_::find($idreembolso);
        $reembolso->estatus_id = 2;
        $reembolso->save();
        return response()->json('EXITO');
    }
}
