<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class accion extends Model
{
    use HasFactory;
    protected $table = 'accion';
    protected $fillable = ['id', 'descripcion', 'tipo_accion_id', 'empleado_id', 'users_aprueba_id'];
}
