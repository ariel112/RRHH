<?php

namespace App\Http\Livewire\Empleado;

use Livewire\Component;
use App\Models\despidos;
use Auth;
use DataTables;
use Illuminate\Support\Facades\DB;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Http\Request;
use App\Models\empleado;
use App\Models\contrato;
class Depidos extends Component
{
    public function render()
    {
        return view('livewire.empleado.depidos');
    }

    public function agregarDespido(Request $request){
        try{
            DB::beginTransaction();
                $gerente_id = DB::SELECTONE("select * from empleado where cargo_id = 74;");
                $despido = new despidos();
                $despido->motivo =$request->motivo_despido;
                $despido->fecha_despido =$request->fecha_despido;
                $despido->empleado_id_despedido =$request->empleado_id;
                $despido->empleado_id_gerente =$gerente_id->id;
                $despido->contrato_id =$request->id_contrato;
                $despido->save();

                $empleado = empleado::find($request->empleado_id);
                $empleado->estatus_id = 2;
                $empleado->save();

                $contrato = contrato::find($request->id_contrato);
                $contrato->estatus_id = 2;
                $contrato->save();

            DB::commit();
                /* dd($gerente_id); */
            return response()->json($gerente_id);
        } catch (QueryException $e) {
            DB::rollback();
            return response()->json([
            'message' => 'Ha ocurrido un error, por favor intente de nuevo.',
            'color' => 'error',
            'estado' => 2,
            'exception' => $e,
            ], 402);
        }

    }

    public function llenado_tabla_despidos_realizados(){
        $despidos = DB::SELECT("SELECT * FROM despidos");

         return Datatables::of($despidos)
            ->addColumn('colaborador', function ($despidos) {
                $empleado = DB::SELECTONE("select * from empleado where id = '".$despidos->empleado_id_despedido."'");
                return '<td>'.$empleado->primer_nombre.' '.$empleado->primer_apellido.'</td>';
            })
            ->addColumn('id_emp', function ($despidos) {
                $empleado = DB::SELECTONE("select * from empleado where id = '".$despidos->empleado_id_despedido."'");
                return '<td>'.$empleado->id.'</td>';
            })
            ->addColumn('id_contrato', function ($despidos) {
                return '<td>'.$despidos->contrato_id.'</td>';
           })
            ->addColumn('fecha_despido', function ($despidos) {
                 return '<td>'.$despidos->fecha_despido.'</td>';
            })
            ->addColumn('motivo', function ($despidos) {
                return '<td>'.$despidos->motivo.'</td>';
            })
            ->addColumn('fecha_registro', function ($despidos) {
                return $despidos->created_at;
            })
            /* ->addColumn('acciones', function ($despidos) {
                return '<div class="dropdown dropdown-action text-right">
                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#" onclick ="abrirModalEditar_despido('.$despidos->id.')"><i style="color:#EA964F;" class="fa fa-pencil m-r-5 text-warning"></i>Añadir reembolso</a>
                    </div>
                    </div>';

            }) */
            ->rawColumns(['colaborador','id_emp', 'id_contrato','fecha_despido','motivo'])
            ->make(true);
    }
}
