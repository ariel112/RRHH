<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reembolso_ extends Model
{
    use HasFactory;
    protected $table = 'reembolso';
    protected $fillable = [
        'empleado_id',
        'monto',
        'estatus_id',
        'nombre_reembolso',
        'descripcion_reembolso',
        'planilla_id_error'];
}
