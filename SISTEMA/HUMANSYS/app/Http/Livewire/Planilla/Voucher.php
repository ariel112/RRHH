<?php

namespace App\Http\Livewire\Planilla;

use Livewire\Component;

use Illuminate\Support\Facades\DB;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Support\Facades\Auth;
use DataTables;
use PDF;
class Voucher extends Component
{
    public function render()
    {

        return view('livewire.planilla.voucher');
    }

    public function tbl_planilla_voucher(){
        $planillas = DB::SELECT("select pl.id as idP, pl.codigo_unico, pl.numero_memo, pl.fecha_inicio, pl.fecha_final from planilla pl
        inner join pagos pg on (pg.planilla_id = pl.id)
        where pg.empleado_id = (select id from empleado where identidad = '".Auth::user()->identidad."') ");

         return Datatables::of($planillas)
            ->addColumn('codigo', function ($planillas) {
                 return '<td>'.$planillas->codigo_unico.'</td>';
            })
            ->addColumn('numero-memo', function ($planillas) {
                 return '<td>'.$planillas->numero_memo.'</td>';
            })
           ->addColumn('inicio', function ($planillas) {
            return '<td>'.$planillas->fecha_inicio.'</td>';
           })
           ->addColumn('finalizacion', function ($planillas) {
            return '<td>'.$planillas->fecha_final.'</td>';
           })
            ->addColumn('acciones', function ($planillas) {
                return '<div class="dropdown dropdown-action text-right">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" onclick="mostrarModal('.$planillas->idP.')"><i style="color:#6F2FB0;" class="fa fa-eye m-r-5"></i>Ver Voucher</a>
                            </div>
                        </div>';
                        /* href="/planilla/generate-pdf_voucher/'.$planillas->idP.'" */
            })
            ->rawColumns(['codigo', 'numero-memo','inicio', 'finalizacion','acciones'])
            ->make(true);
    }

    public function mostrar_datosVoucher($idPlanilla){
        $empleado = DB::SELECTONE("select * from empleado where identidad = '".Auth::user()->identidad."'");
        $cargo = DB::SELECTONE("select ca.nombre as cargo, dep.nombre as gerencia from cargo ca inner join area ar on (ar.id = ca.area_id) inner join departamento dep on (dep.id = ar.departamento_id) where ca.id = '".$empleado->cargo_id."'");
        $pago = DB::SELECTONE("select * from pagos where empleado_id = '".$empleado->id."' and planilla_id = '".$idPlanilla."'");
        $pagos_deducciones_fijas = DB::SELECT("select * from pagos_deducciones_fijas where pagos_id = '".$pago->id."'");
        $planilla = DB::SELECTONE("select * from planilla where id ='".$idPlanilla."'");
        $pagos_deducciones_variables = DB::SELECT("select * from pagos_deducciones_variables where pagos_id = '".$pago->id."'");
        $data = [
            'title' => 'Voucher',
            'empleado' => $empleado,
            'pago' => $pago,
            'planilla' => $planilla,
            'pagos_deducciones_fijas' => $pagos_deducciones_fijas,
            'cargo' => $cargo,
            'pagos_deducciones_variables' => $pagos_deducciones_variables
        ];
        return response()->json($data);
    }

    public function generatePDF_voucher($idPlanilla){

        $empleado = DB::SELECTONE("select * from empleado where identidad = '".Auth::user()->identidad."'");
        $cargo = DB::SELECTONE("select ca.nombre as cargo, dep.nombre as gerencia from cargo ca inner join area ar on (ar.id = ca.area_id) inner join departamento dep on (dep.id = ar.departamento_id) where ca.id = '".$empleado->cargo_id."'");
        $pago = DB::SELECTONE("select * from pagos where empleado_id = '".$empleado->id."' and planilla_id = '".$idPlanilla."'");
        $pagos_deducciones_fijas = DB::SELECT("select * from pagos_deducciones_fijas where pagos_id = '".$pago->id."'");
        $planilla = DB::SELECTONE("select * from planilla where id ='".$idPlanilla."'");
        $pagos_deducciones_variables = DB::SELECT("select * from pagos_deducciones_variables where pagos_id = '".$pago->id."'");
        $data = [
            'title' => 'Voucher',
            'empleado' => $empleado,
            'pago' => $pago,
            'planilla' => $planilla,
            'pagos_deducciones_fijas' => $pagos_deducciones_fijas,
            'cargo' => $cargo,
            'pagos_deducciones_variables' => $pagos_deducciones_variables
        ];
        $pdf = PDF::loadView('pdf/voucher-personal', $data);

        //stream para vizualizar y no descargar de un sólo
        return $pdf->stream('VOUCHER DE '.$empleado->nombre.'.pdf');

    }
}
