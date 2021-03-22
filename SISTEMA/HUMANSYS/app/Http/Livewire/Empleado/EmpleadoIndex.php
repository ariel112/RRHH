<?php

namespace App\Http\Livewire\Empleado;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\empleado;

class EmpleadoIndex extends Component
{
    public function render()
    {
        $usuario = User::select('id')
                        ->get();

        return view('livewire.empleado.empleado-index', compact("usuario"));
    }

    public function guardarEmpleado(Request $request){
        $empleados = new empleado();
        $empleados->identidad = $request['identidad'];
        $empleados->nombre = $request['primer_nombre'].' '.$request['segundo_nombre'].' '.$request['primer_apellido'].' '.$request['segundo_apellido'];
        $empleados->primer_nombre = $request['primer_nombre'];
        $empleados->segundo_nombre = $request['segundo_nombre'];
        $empleados->primer_apellido = $request['primer_apellido'];
        $empleados->segundo_apellido = $request['segundo_apellido'];
        $empleados->fecha_nacimiento = $request['fecha_nacimiento'];
        $empleados->fecha_ingreso = $request['fecha_ingreso'];
        $empleados->url_foto = 'foto_1';
        $empleados->email = $request['email'];
        $empleados->email_institucional = $request['email_institucional'];
        $empleados->lugar_nacimiento = $request['lugar_nacimiento'];
        $empleados->estado_civil = $request['estado_civil'];
        $empleados->descripcion_laboral = $request['descripcion_laboral'];
        $empleados->telefono_1 = $request['telefono_1'];
        $empleados->telefono_2 = $request['telefono_2'];
        $empleados->estatus_id = $request['estatus_id'];
        $empleados->grado_academico_id = $request['grado_academico_id'];
        $empleados->municipio_id = $request['municipio_id'];
        $empleados -> save();

        return "Exito";
    }
}
