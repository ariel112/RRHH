<?php

namespace App\Http\Livewire\Planilla;

use App\Models\asistencia;
use App\Models\empleado;
use App\Models\permisos;
use Livewire\Component;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Support\Facades\DB;
use DateTime;
class CrearPlanilla extends Component
{
    public function render()
    {
        return view('livewire.planilla.crear-planilla');
    }


    public function generarPlanilla(){
           try{
               
           
            





               
            $fecha1 = new DateTime("2021-04-26");
            $fecha2 = new DateTime("2021-05-02");
            $diff = $fecha1->diff($fecha2);
            $dias=$diff->days+1;

            $arregloDeFechas=[];

            for($i=0; $i< $dias;$i++){
                $suma = strtotime('2021-04-26'.'+'.$i.' '.'days');

                array_push($arregloDeFechas, ['fecha'=> date("Y-m-d",$suma)]);

            }


            //listado de empleados tomar en cuenta los que tienen contrato activo

            $empleados = DB::SELECT('select id from empleado where id=3 or id=4');

            foreach ($arregloDeFechas as $dia) {
                foreach($empleados as $empleado){
                    $asistenciaDia = DB::SELECT('select date_format(entrada_fija, "%H:%i:%S") as entrada_fija,  date_format(salida_fija, "%H:%i:%S") as salida_fija from asistencia where fecha_dia = "'.$dia['fecha'].'" and empleado_id='.$empleado->id);

                    //calculando minuto
                    $horaInicio = strtotime($asistenciaDia[0]->entrada_fija);//inicial
                    $horaFinal = strtotime($asistenciaDia[0]->salida_fija);//final
                    $minutosTrabajados = ($horaFinal-$horaInicio)/60;

                    //calculando minutos de permiso 

                    $permisos = DB::SELECT('select hora_inicio, hora_final FROM permisos WHERE DATE(fecha_inicio)="'.$dia['fecha'].'" and DATE(fecha_final)="'.$dia['fecha'].'" and tipo_gose_sueldo_id = 1 and empleado_id = '.$empleado->id);
                    
                    if( $permisos ){
                    $horaInicioPermiso = strtotime($permisos[0]->hora_inicio);//inicial
                    $horaFinalPermiso = strtotime($permisos[0]->hora_final);//final
                    $minutosPermiso = ($horaFinalPermiso-$horaInicioPermiso)/60;

                    $paso = $minutosTrabajados + $minutosPermiso;
                    
                    $minutosTrabajados = $minutosTrabajados + $minutosPermiso;


                    }

                    if($minutosTrabajados > 540){
                        
                    }
                


                }


            }

          
            // $horaInicio = strtotime("08:00:00");//inicial
            // $horaFinal = strtotime("17:00:00");//final
            // $minutosTrabajados = ($horaFinal-$horaInicio)/60;
          


               return response()->json(  $paso,200);
           }catch(QueryException $e){
               
                return response()->json([
               'error'=>$e, 
               ],402); }
           }


    public function asistencia($empleados){
                try{




                     return response()->json([],200);
                }catch(QueryException $e){
                    
                     return response()->json([
                    'error'=>$e, 
                    ],402); }
                

    
        }

    
}


