<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deducciones_empleado extends Model
{
    use HasFactory;
    protected $table = 'deducciones_empleado';
    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'tipo_deducciones_id',
        'empleado_id',
        'monto',
        'porcentaje'];
}
