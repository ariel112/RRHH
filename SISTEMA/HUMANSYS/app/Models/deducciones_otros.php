<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deducciones_otros extends Model
{
    use HasFactory;
    protected $table = 'deducciones_otros';
    protected $fillable = ['id', 'nombre', 'cantidad', 'porcentaje', 'tipo_deducciones_id', 'empleado_id'];
}
