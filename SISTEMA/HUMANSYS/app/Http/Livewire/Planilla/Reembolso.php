<?php

namespace App\Http\Livewire\Planilla;

use Livewire\Component;
use DateTime;
use Auth;
use DataTables;
use Illuminate\Support\Facades\DB;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Http\Request;
use App\Models\reembolso_;

class Reembolso extends Component
{
    public function render()
    {
        return view('livewire.planilla.reembolso');
    }

    public function tbl_planilla(){
        $planillas = DB::SELECT("SELECT * FROM planilla");

         return Datatables::of($planillas)
            ->addColumn('id', function ($planillas) {
                return '<td>'.$planillas->id.'</td>';
            })
            ->addColumn('codigo', function ($planillas) {
                 return '<td>'.$planillas->codigo_unico.'</td>';
            })
            ->addColumn('numero-memo', function ($planillas) {
                 return '<td>'.$planillas->numero_memo.'</td>';
            })
            ->addColumn('encargado', function ($planillas) {
                return '<td>'.$planillas->nombre.'</td>';
            })
            ->addColumn('identidad', function ($planillas) {
                return '<td>'.$planillas->identidad.'</td>';
           })
           ->addColumn('inicio', function ($planillas) {
            return '<td>'.$planillas->fecha_inicio.'</td>';
           })
           ->addColumn('finalizacion', function ($planillas) {
            return '<td>'.$planillas->fecha_final.'</td>';
           })
           ->addColumn('empleado_id', function ($planillas) {
            return '<td>'.$planillas->empleado_genera_id.'</td>';
           })
           ->addColumn('total_pagado', function ($planillas) {
            return '<td>'.$planillas->total_pago_planilla.'</td>';
           })
           ->addColumn('se_genero', function ($planillas) {
            return '<td>'.$planillas->created_at.'</td>';
            })
            ->addColumn('acciones', function ($planillas) {
                return '<div class="dropdown dropdown-action text-right">
                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#" onclick ="abrirModalReembolso('.$planillas->id.')"><i style="color:#EA964F;" class="fa fa-pencil m-r-5 text-warning"></i>Añadir reembolso</a>
                    </div>
                    </div>';

            })
            ->rawColumns(['id','codigo', 'numero-memo','encargado','identidad','inicio', 'finalizacion','empleado_id','total_pagado','se_genero','acciones'])
            ->make(true);
    }

    public function guardarReembolso(Request $request){
        try {
            $reembolso = new reembolso_();
            $reembolso->empleado_id = $request['empleado_id'];
            $reembolso->nombre_reembolso = $request['nombre_reembolso'];
            $reembolso->monto = $request['monto_reembolso'];
            $reembolso->descripcion_reembolso = $request['descripcion_reembolso'];
            $reembolso->planilla_id_error = $request['planilla_id_error'];
            $reembolso->estatus_id = 1;
            $reembolso->save();
            /* $reembolso = DB::insert("insert into reembolso(
                                                            empleado_id,
                                                            monto,
                                                            estatus_id,
                                                            nombre_reembolso,
                                                            descripcion_reembolso,
                                                            planilla_id_error
                                                            )values
                                                            (   '".$request['empleado_id']."',
                                                                '".$request['monto_reembolso']."',
                                                                1,
                                                                '".$request['nombre_reembolso']."',
                                                                '".$request['descripcion_reembolso']."',
                                                                '".$request['planilla_id_error']."'
                                                            )"); */
            return response()->json($reembolso);
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e,
            ], 402);
        }
    }
}
