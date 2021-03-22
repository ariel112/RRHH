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

    protected $fillable = ['id', 'nombre',  'hora_entrada', 'hora_salida', 'empleado_id',
     'users_aprueba_id','tipo_permiso','estado_permiso','hora_inicio','hora_final'];
}
