<?php

namespace App\Http\Livewire\Contratos;

use Livewire\Component;
use Auth;
use DataTables;
use Illuminate\Support\Facades\DB;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Http\Request;
use App\Models\adenda;
use App\Models\empleado;

class Adendas extends Component
{
    public function render()
    {
        return view('livewire.contratos.adendas');
    }

    public function llenado_tabla_adendas_realizadas(){
        $adenda = DB::SELECT("SELECT * FROM adenda");

         return Datatables::of($adenda)
            ->addColumn('id', function ($adenda) {
                $empleado = DB::SELECTONE("select * from empleado emp inner join contrato con on (con.empleado_id = emp.id) where con.id = '".$adenda->contrato_id."'");
                return '<td>'.$empleado->identidad.'</td>';
            })
            ->addColumn('codigo_contrato', function ($adenda) {
                $contrato =DB::SELECTONE("select * from contrato where id = '".$adenda->contrato_id."'");
                 return '<td>'.$contrato->num_contrato.'</td>';
            })
            ->addColumn('sueldo_anterior', function ($adenda) {
                 return '<td>'.$adenda->sueldo_anterior.'</td>';
            })
            ->addColumn('cargo_anterior_id', function ($adenda) {
                return '<td>'.$adenda->cargo_anterior_id.'</td>';
            })
            ->addColumn('sueldo_nuevo', function ($adenda) {
                return '<td>'.$adenda->sueldo_nuevo.'</td>';
           })
           ->addColumn('cargo_nuevo_id', function ($adenda) {
            return '<td>'.$adenda->cargo_nuevo_id.'</td>';
           })
           /* ->addColumn('empleado_genera_id', function ($adenda) {
            return '<td>'.$adenda->empleado_genera_id.'</td>';
           })
           ->addColumn('empleado_gerente_id', function ($adenda) {
            return '<td>'.$adenda->empleado_gerente_id.'</td>';
           }) */
           ->addColumn('fecha_inicio_vigencia', function ($adenda) {
            return '<td>'.$adenda->fecha_inicio_vigencia.'</td>';
           })
           ->addColumn('descripcion', function ($adenda) {
            return '<td>'.$adenda->descripcion.'</td>';
            })
            ->addColumn('fecha_registro', function ($adenda) {
                return '<td>'.$adenda->created_at.'</td>';
            })
            ->addColumn('acciones', function ($adenda) {
                return '<div class="dropdown dropdown-action text-right">
                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#" onclick ="abrirModalReembolso('.$adenda->id.')"><i style="color:#EA964F;" class="fa fa-pencil m-r-5 text-warning"></i>Añadir reembolso</a>
                    </div>
                    </div>';

            })
            ->rawColumns(['id','codigo_contrato', 'sueldo_anterior','cargo_anterior_id','sueldo_nuevo','cargo_nuevo_id', /* 'empleado_genera_id','empleado_gerente_id', */'fecha_inicio_vigencia','descripcion','fecha_registro'])
            ->make(true);
    }

    public function guardado_adenda_solo_sueldo(Request $request){
        try {
            DB::beginTransaction();

            $empleado_aprueba = DB::SELECTONE("select id from empleado where identidad = '".Auth::user()->identidad."'");
            $gerente_talento_humano = DB::SELECTONE("select id from empleado where cargo_id = 74");
            $sueldo_contrato = DB::SELECTONE("select * from contrato where id= '".$request->id_contrato_salario."'");
            $adenda = new adenda();
            $adenda->contrato_id = $request->id_contrato_salario;
            $adenda->sueldo_anterior = $sueldo_contrato->sueldo;
            $adenda->cargo_anterior_id = $request->cargo_anterior_salario;
            $adenda->sueldo_nuevo = $request->sueldo_nuevo_salario;
            $adenda->estatus_id = 1;
            $adenda->empleado_genera_id = $empleado_aprueba->id;
            $adenda->empleado_gerente_id = $gerente_talento_humano->id;
            $adenda->fecha_inicio_vigencia = $request->fecha_inicio_vigencia_salario;
            $adenda->descripcion = $request->descripcion_salario;
            $adenda->save();

            DB::commit();
            return response()->json('EXITO');
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

    public function guardado_adenda_solo_puesto(Request $request){
        try {
            DB::beginTransaction();

            $empleado_aprueba = DB::SELECTONE("select id from empleado where identidad = '".Auth::user()->identidad."'");
            $gerente_talento_humano = DB::SELECTONE("select id from empleado where cargo_id = 74");
            $contrato = DB::SELECTONE("select * from contrato where id= '".$request->id_contrato_puesto."'");

            $adenda = new adenda();
            $adenda->contrato_id = $request->id_contrato_puesto;
            $adenda->sueldo_anterior = $contrato->sueldo;
            $adenda->cargo_anterior_id = $request->cargo_anterior_puesto;
            $adenda->cargo_nuevo_id = $request->cargo_id;
            $adenda->estatus_id = 1;
            $adenda->empleado_genera_id = $empleado_aprueba->id;
            $adenda->empleado_gerente_id = $gerente_talento_humano->id;
            $adenda->fecha_inicio_vigencia = $request->fecha_inicio_vigencia_puesto;
            $adenda->descripcion = $request->descripcion_puesto;
            $adenda->save();

            $empleado = empleado::find($contrato->empleado_id);
            $empleado->cargo_id = $adenda->cargo_nuevo_id;
            $empleado->save();


            DB::commit();
            return response()->json('EXITO');
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

    public function guardado_adenda_sueldo_puesto(Request $request){
        try {
            DB::beginTransaction();
            $empleado_aprueba = DB::SELECTONE("select id from empleado where identidad = '".Auth::user()->identidad."'");
            $gerente_talento_humano = DB::SELECTONE("select id from empleado where cargo_id = 74");
            $contrato = DB::SELECTONE("select * from contrato where id= '".$request->id_contrato_sp."'");

            $adenda = new adenda();
            $adenda->contrato_id = $request->id_contrato_sp;
            $adenda->sueldo_anterior = $contrato->sueldo;
            $adenda->cargo_anterior_id = $request->cargo_anterior_sp;
            $adenda->sueldo_nuevo = $request->sueldo_nuevo_salario_sp;
            $adenda->cargo_nuevo_id = $request->cargo_id_salario_puesto;
            $adenda->estatus_id = 1;
            $adenda->empleado_genera_id = $empleado_aprueba->id;
            $adenda->empleado_gerente_id = $gerente_talento_humano->id;
            $adenda->fecha_inicio_vigencia = $request->fecha_inicio_vigencia_salario_sp;
            $adenda->descripcion = $request->descripcion_salario_puesto;
            $adenda->save();

            $empleado = empleado::find($contrato->empleado_id);
            $empleado->cargo_id = $adenda->cargo_nuevo_id;
            $empleado->save();

            DB::commit();
            return response()->json('EXITO');
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
}
