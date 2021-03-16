<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permisos extends Model
{
    use HasFactory;
    protected $table = 'permisos';
    protected $fillable = ['id', 'nombre', 'tipo_permiso', 'estado', 'hora_entrada', 'hora_salida', 'empleado_id', 'users_aprueba_id'];
}
