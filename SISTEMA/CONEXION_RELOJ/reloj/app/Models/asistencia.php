<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asistencia extends Model
{
    use HasFactory;
    protected $fillable = [
        'entrada_real',
        'fecha_dia',
        'salida_real',
        'entrada_fija',
        'salida_fija',
        'empleado_id',
        'fecha_dia_salida'
    ];
}
