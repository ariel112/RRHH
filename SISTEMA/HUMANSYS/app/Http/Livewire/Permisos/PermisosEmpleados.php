<?php

namespace App\Http\Livewire\Permisos;

use App\Models\tipo_permiso;

use Doctrine\DBAL\Query\QueryException;
use Livewire\Component;

class PermisosEmpleados extends Component
{
    public function render()
    {
        return view('livewire.permisos.permisos-empleados');
    }


    public function obtenerPermisos(){
            try{

                $tipos = tipo_permiso::all();

                return response()->json([
                    'tipos' => $tipos,

                ]);


            }catch(QueryException $e){
                   
                return response()->json([
                    'message' => 'Ha ocurrido un error al obtener los tipos de permisos',
                    'error' => $e,
                ]);


            }
    }
}
