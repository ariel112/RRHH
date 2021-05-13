<?php
namespace App\Http\Livewire\Contratos;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\contrato;
use App\Models\empleado;
use Illuminate\Database\QueryException;

use DataTables;
use Illuminate\Support\Facades\DB;

use Auth;
use PDF;

use Luecano\NumeroALetras\NumeroALetras;

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

                $fechaInicio = $request->fecha_inicio;
                $fechaFinal = $request->fecha_fin;

                $buscContrato = DB::SELECTONE("select COUNT(id) as 'conteo', fecha_fin from contrato where empleado_id = '".$request->empleado_id."' and estatus_id = 1 and '".$fechaInicio."' BETWEEN fecha_inicio and fecha_fin");
                $existenciaContrato = DB::SELECTONE("select COUNT(id) as 'conteo2' from contrato where empleado_id = '".$request->empleado_id."' and estatus_id = 1 ");

                if($buscContrato->conteo > 0){
                    return response()->json([
                        'message' => 'Fecha de inicio no válida: Existe un contrato vigente y activo en ese rango de fecha.',
                        'color' => 'error',
                        'estado' => 2
                    ], 402);
                }else if($existenciaContrato->conteo2 == 1 && $buscContrato->conteo == 0){
                    try {
                        DB::beginTransaction();
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
                            $contrato->estatus_id = 2;
                            $contrato->users_aprueba_id = Auth::user()->id;
                            $contrato->empleado_rrhh = $request->empleado_rrhh;
                            $contrato->save();
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
                }else{

                    try {
                        DB::beginTransaction();
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
                            $contrato->estatus_id = 1;
                            $contrato->users_aprueba_id = Auth::user()->id;
                            $contrato->empleado_rrhh = $request->empleado_rrhh;
                            DB::table('empleado')
                                ->where('id', $contrato->empleado_id)
                                ->update([
                                'estatus_id' => 1]);
                            $contrato->save();
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




    public function contrato_listar(){

        $contrato = DB::select("SELECT A.num_contrato, B.nombre,
                                       A.fecha_inicio, A.fecha_fin, A.estatus_id as estado_contrato,
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
                        <a class="dropdown-item" data-toggle="modal" data-target="#editar_contratos" onclick="editcontrato('.$contrato->id.')"  ><i class="fa fa-pencil m-r-5 text-warning"></i> Editar</a>
                        <a class="dropdown-item" href="/contrato/generate-pdf/'.$contrato->id.'"><i class="fa fa-file-pdf-o m-r-5 text-success"></i> Formato</a>
                        <a class="dropdown-item" href="/contrato/generate-pdf_sin/'.$contrato->id.'"><i class="fa fa-file-pdf-o m-r-5 text-info"></i> Sin Formato</a>
                    </div>
                </div>';
                })
        ->addColumn('item', function ($contrato) {
        if ($contrato->estado_contrato === 2) {
            return '<td><span class="badge bg-inverse-danger">INACTIVO</span></td>';
        } else {

            if($contrato->dif_dia>=0){
                return '<td><span class="badge bg-inverse-success">ACTIVO</span></td>';
            } else{
                return '<td><span class="badge bg-inverse-danger">VENCIDO</span></td>';
            }
        }

                })

        ->editColumn('id', 'ID: {{$id}}')
        ->rawColumns(['action','item'])
        ->make(true);



    }



    public function contrato_muestra($id){

        $contrato = DB::select("SELECT A.num_contrato, B.nombre, A.fecha_inicio, A.fecha_fin, A.num_delegacion, B.identidad,
                                        A.id, A.sueldo, A.vacaciones, A.empleado_id, A.empleado_rrhh, E.nombre gerencia, C.nombre cargo
                                FROM contrato A
                                INNER JOIN empleado B
                                ON(A.empleado_id=B.id)
                                INNER JOIN cargo C
                                ON(B.cargo_id=C.id)
                                INNER JOIN area D
                                ON(C.area_id=D.id)
                                INNER JOIN departamento E
                                ON(D.departamento_id=E.id)
                                WHERE /* A.estatus_id = 1 and A.estatus_id = 2 */ and A.id='$id'");

        return response()->json($contrato);
        // return $contrato;

    }


    public function contratos_edit(Request $request){

        $contrato = contrato::find($request->id);
        $contrato->num_contrato = $request->num_contrato;
        $contrato->num_delegacion = $request->num_delegacion;
        $contrato->tipo_contrato = $request->tipo_contrato;
        $contrato->fecha_inicio = $request->fecha_inicio;
        $contrato->fecha_fin = $request->fecha_fin;
        $contrato->sueldo = $request->sueldo;
        $contrato->vacaciones = $request->vacaciones;
        $contrato->estado_contrato = $request->estado_contrato;
        // $contrato->empleado_id= $request->empleado_id;
        $contrato->horarios_id = 1;
        // $contrato->users_aprueba_id = Auth::user()->id;
        $contrato->empleado_rrhh = $request->empleado_rrhh;
        $contrato->save();

        return response()->json('EXITO');


    }


    public function contrato_elimina($id){

        contrato::destroy($id);


        return response()->json('Eliminado');
    }


    public function generatePDF($id){

        $contrato = DB::selectOne("SELECT A.num_contrato, B.nombre, B.profesion, B.estado_civil,  A.fecha_inicio, A.fecha_fin, A.num_delegacion, B.identidad, A.empleado_rrhh,date_format(A.fecha_inicio, '%m') mes, date_format(A.fecha_fin, '%m') mesf,
                                        A.id, A.sueldo, A.vacaciones, A.empleado_id, A.empleado_rrhh, E.nombre gerencia, C.nombre cargo, C.id cargo_id, date_format(A.fecha_inicio, '%d') numero,  date_format(A.fecha_inicio, '%Y') anio, date_format(A.fecha_fin, '%d') numerof, date_format(A.fecha_fin, '%Y') aniof
                                FROM contrato A
                                INNER JOIN empleado B
                                ON(A.empleado_id=B.id)
                                INNER JOIN cargo C
                                ON(B.cargo_id=C.id)
                                INNER JOIN area D
                                ON(C.area_id=D.id)
                                INNER JOIN departamento E
                                ON(D.departamento_id=E.id)
                                WHERE A.id='$id'
        ");

        if($contrato->mes==01)
            $mes='Enero';
         if($contrato->mes==02)
            $mes='Febrero';
         if($contrato->mes==03)
            $mes='Marzo';
         if($contrato->mes==04)
            $mes='Abril';
         if($contrato->mes==05)
            $mes='Mayo';
         if($contrato->mes==06)
            $mes='Junio';
         if($contrato->mes==07)
            $mes='Julio';
         if($contrato->mes==8)
            $mes='Agosto';
         if($contrato->mes==9)
            $mes='Septiembre';
         if($contrato->mes==10)
            $mes='Octubre';
         if($contrato->mes==11)
            $mes='Noviembre';
         if($contrato->mes==12)
            $mes='Diciembre';


        if($contrato->mesf==01)
            $mesf='Enero';
         if($contrato->mesf==02)
            $mesf='Febrero';
         if($contrato->mesf==03)
            $mesf='Marzo';
         if($contrato->mesf==04)
            $mesf='Abril';
         if($contrato->mesf==05)
            $mesf='Mayo';
         if($contrato->mesf==06)
            $mesf='Junio';
         if($contrato->mesf==07)
            $mesf='Julio';
         if($contrato->mesf==8)
            $mesf='Agosto';
         if($contrato->mesf==9)
            $mesf='Septiembre';
         if($contrato->mesf==10)
            $mesf='Octubre';
         if($contrato->mesf==11)
            $mesf='Noviembre';
         if($contrato->mesf==12)
            $mesf='Diciembre';


        // numero a letras inicio
                $formatter = new NumeroALetras();
                $formatter->apocope = true;
                $numero = strtolower($formatter->toWords($contrato->numero));
        // numero a letras fin
                $formatterf = new NumeroALetras();
                $formatterf->apocope = true;
                $numerof = strtolower($formatterf->toWords($contrato->numerof));
        // $numero = strtolower( (new NumeroALetras())->toMoney($contrato->numero, 0, '', ''));


          $centavos = explode('.',$contrato->sueldo);

          if(sizeof($centavos)>1){
            $sueldo_letras = (new NumeroALetras())->toMoney($contrato->sueldo, 2, 'LEMPIRAS', 'CENTAVOS EXACTOS');
            } else {
                $sueldo_letras = (new NumeroALetras())->toMoney($contrato->sueldo, 2, 'LEMPIRAS EXACTOS', 'CENTAVOS');

          }


        $funciones = DB::select("SELECT * FROM `funciones` WHERE cargo_id='$contrato->cargo_id'");
        $cargos = DB::selectOne("SELECT * FROM `cargo` WHERE id='$contrato->cargo_id'");
        $gerente_rh = DB::selectone("SELECT A.nombre, A.identidad, A.rtn, A.profesion, A.estado_civil
                                             FROM empleado A
                                 WHERE A.id='$contrato->empleado_rrhh'");




        $data = [
            'title' => 'Contrato',
            'contrato' => $contrato,
            'funciones' => $funciones,
            'gerente_rh' => $gerente_rh,
            'sueldo_letras' => $sueldo_letras,
            'cargos' => $cargos,
            'numero' => $numero,
            'mesf' => $mesf,
            'numerof' => $numerof,
            'mes' => $mes
        ];

        $pdf = PDF::loadView('pdf/contrato', $data);

        return $pdf->download('CONTRATO INDIVIDUAL DE'.$contrato->nombre.'.pdf');
      //   return $pdf->download('Contrato.pdf');

    }


    public function generatePDF_sin($id){

      $contrato = DB::selectOne("SELECT A.num_contrato,  B.nombre, B.profesion, B.estado_civil,  A.fecha_inicio, A.fecha_fin, A.num_delegacion, B.identidad, A.empleado_rrhh,date_format(A.fecha_inicio, '%m') mes, date_format(A.fecha_fin, '%m') mesf,
                                      A.id, A.sueldo, A.vacaciones, A.empleado_id, A.empleado_rrhh, E.nombre gerencia, C.nombre cargo, C.id cargo_id, date_format(A.fecha_inicio, '%d') numero,  date_format(A.fecha_inicio, '%Y') anio, date_format(A.fecha_fin, '%d') numerof, date_format(A.fecha_fin, '%Y') aniof
                              FROM contrato A
                              INNER JOIN empleado B
                              ON(A.empleado_id=B.id)
                              INNER JOIN cargo C
                              ON(B.cargo_id=C.id)
                              INNER JOIN area D
                              ON(C.area_id=D.id)
                              INNER JOIN departamento E
                              ON(D.departamento_id=E.id)
                              WHERE A.id='$id'
      ");

      if($contrato->mes==01)
          $mes='Enero';
       if($contrato->mes==02)
          $mes='Febrero';
       if($contrato->mes==03)
          $mes='Marzo';
       if($contrato->mes==04)
          $mes='Abril';
       if($contrato->mes==05)
          $mes='Mayo';
       if($contrato->mes==06)
          $mes='Junio';
       if($contrato->mes==07)
          $mes='Julio';
       if($contrato->mes==8)
          $mes='Agosto';
       if($contrato->mes==9)
          $mes='Septiembre';
       if($contrato->mes==10)
          $mes='Octubre';
       if($contrato->mes==11)
          $mes='Noviembre';
       if($contrato->mes==12)
          $mes='Diciembre';


      if($contrato->mesf==01)
          $mesf='Enero';
       if($contrato->mesf==02)
          $mesf='Febrero';
       if($contrato->mesf==03)
          $mesf='Marzo';
       if($contrato->mesf==04)
          $mesf='Abril';
       if($contrato->mesf==05)
          $mesf='Mayo';
       if($contrato->mesf==06)
          $mesf='Junio';
       if($contrato->mesf==07)
          $mesf='Julio';
       if($contrato->mesf==8)
          $mesf='Agosto';
       if($contrato->mesf==9)
          $mesf='Septiembre';
       if($contrato->mesf==10)
          $mesf='Octubre';
       if($contrato->mesf==11)
          $mesf='Noviembre';
       if($contrato->mesf==12)
          $mesf='Diciembre';


      // numero a letras inicio
              $formatter = new NumeroALetras();
              $formatter->apocope = true;
              $numero = strtolower($formatter->toWords($contrato->numero));
      // numero a letras fin
              $formatterf = new NumeroALetras();
              $formatterf->apocope = true;
              $numerof = strtolower($formatterf->toWords($contrato->numerof));
      // $numero = strtolower( (new NumeroALetras())->toMoney($contrato->numero, 0, '', ''));


        $centavos = explode('.',$contrato->sueldo);

        if(sizeof($centavos)>1){
          $sueldo_letras = (new NumeroALetras())->toMoney($contrato->sueldo, 2, 'LEMPIRAS', 'CENTAVOS EXACTOS');
          } else {
              $sueldo_letras = (new NumeroALetras())->toMoney($contrato->sueldo, 2, 'LEMPIRAS EXACTOS', 'CENTAVOS');

        }


      $funciones = DB::select("SELECT * FROM `funciones` WHERE cargo_id='$contrato->cargo_id'");
      $cargos = DB::selectOne("SELECT * FROM `cargo` WHERE id='$contrato->cargo_id'");
      $gerente_rh = DB::selectone("SELECT A.nombre, A.identidad, A.rtn, A.profesion, A.estado_civil
                                           FROM empleado A
                               WHERE A.id='$contrato->empleado_rrhh'");




      $data = [
          'title' => 'Contrato',
          'contrato' => $contrato,
          'funciones' => $funciones,
          'gerente_rh' => $gerente_rh,
          'sueldo_letras' => $sueldo_letras,
          'cargos' => $cargos,
          'numero' => $numero,
          'mesf' => $mesf,
          'numerof' => $numerof,
          'mes' => $mes
      ];

      $pdf = PDF::loadView('pdf/contrato_sin', $data);

      return $pdf->download('CONTRATO INDIVIDUAL DE'.$contrato->nombre.'.pdf');

  }

}
