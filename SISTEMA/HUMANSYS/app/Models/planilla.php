<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class planilla extends Model
{
    use HasFactory;
    protected $table = 'planilla';
    public $timestamps = true;
    protected $fillable = ['id', 'identidad','codigo_unico', 'numero_memo', 'nombre','fecha_inicio','fecha_final',  'empleado_genera_id', 'total_pago_planilla'];
  
}
