<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermisoMedioDia extends Model
{
    use HasFactory;
    protected $table = 'permisos_mdia';//nombre de la tabla

    protected $primaryKey = 'id';//especifico la llave primaria, en este caso es entero incremental

    public $timestamps = true;

    protected $fillable = [
      'fecha_dia', 'hora_inicio','hora_final','empleado_id','empleado_registra','tanda_id'
        
    ];

}
