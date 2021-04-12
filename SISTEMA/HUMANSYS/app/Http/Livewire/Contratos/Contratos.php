<?php

namespace App\Http\Livewire\Contratos;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\contrato;
use App\Models\empleado;

use DataTables;
use Illuminate\Support\Facades\DB;

use Auth;

class Contratos extends Component
{
    public $searchNombre ='';

    public function render()
    {
        return view('livewire.contratos.contratos', [
            'empleados' => empleado::where('nombre', 'LIKE',"%$this->searchNombre%")->get()
        ]);
    }

    public function contrato_show(Request $request){

 

        $contrato = new contrato();
        $contrato->num_contrato = $request->num_contrato;
        $contrato->num_delegacion = $request->num_delegacion;
        $contrato->tipo_contrato = $request->tipo_contrato;
        $contrato->fecha_inicio = $request->fecha_inicio;
        $contrato->fecha_fin = $request->fecha_fin;
        $contrato->sueldo = $request->sueldo;
        $contrato->vacaciones = $request->vacaciones;
        $contrato->empleado_id= $request->empleado_id;
        $contrato->horarios_id = 1;
        $contrato->users_aprueba_id = Auth::user()->id;
        $contrato->empleado_rrhh = $request->empleado_rrhh;

        $contrato->save();
 
        return response()->json('EXITO');
 

    }




    public function contrato_listar(){
       
        $contrato = DB::select("SELECT A.num_contrato, B.nombre, 
                                       A.fecha_inicio, A.fecha_fin, 
                                       A.id,TIMESTAMPDIFF(MONTH, A.fecha_inicio, A.fecha_fin) dif_mes, 
                                       TIMESTAMPDIFF(DAY, NOW(), A.fecha_fin) dif_dia
                                    FROM contrato A 
                                    INNER JOIN empleado B 
                                    ON(A.empleado_id=B.id)");

        return Datatables::of($contrato)
        ->addColumn('action', function ($contrato) {
        
       return '<div class="dropdown dropdown-action text-right">
                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" data-toggle="modal" data-target="#editar_cargos" onclick="editcargo('.$contrato->id.')"  ><i class="fa fa-pencil m-r-5"></i> Editar</a>
                    <a class="dropdown-item" data-toggle="modal" data-target="#vw_cargos" onclick="setcargo('.$contrato->id.')" ><i class="fa fa-eye m-r-5"></i> Ver</a>
                </div>
               </div>';              
                })
        ->addColumn('item', function ($contrato) {
        if($contrato->dif_dia>=0){
            return '<td><span class="badge bg-inverse-success">Activos</span></td>';
        } else{
            return '<td><span class="badge bg-inverse-danger">Vencidos</span></td>';
        }
                 
                })

        ->editColumn('id', 'ID: {{$id}}')
        ->rawColumns(['action','item'])
        ->make(true);

        

    }

}
