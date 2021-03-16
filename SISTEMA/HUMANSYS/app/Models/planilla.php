<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class planilla extends Model
{
    use HasFactory;
    protected $table = 'planilla';
    protected $fillable = ['id', 'identidad', 'numero_memo', 'nombre', 'sueldo_mensual', 'catorcena', 'empleado_id', 'isr', 'ihss', 'elga', 'cargo_id', 'optica_innova', 'total_deducciones', 'seguro_hmc','total_pagar'];
}
