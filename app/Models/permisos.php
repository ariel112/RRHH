<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permisos extends Model
{
    use HasFactory;
    protected $table = 'permisos';

    protected $primaryKey = 'id';//especifico la llave primaria, en este caso es entero incremental

    public $timestamps = true;

    protected $fillable = ['id', 'nombre',  'fecha_inicio', 'fecha_final', 'empleado_id',
     'tipo_permiso','estado_permiso_jefe_id','estado_permiso_jefe_rrhh','empleado_jefe_aprueba_id','empleado_rrhh_aprueba_id','hora_inicio','hora_final','motivo'];
}
