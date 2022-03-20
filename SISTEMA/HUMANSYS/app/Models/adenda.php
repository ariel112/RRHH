<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adenda extends Model
{
    use HasFactory;
    protected $table = 'adenda';
    protected $fillable = [ 'contrato_id',
                            'sueldo_anterior',
                            'cargo_anterior_id',
                            'sueldo_nuevo',
                            'cargo_nuevo_id',
                            'estatus_id',
                            'empleado_genera_id',
                            'empleado_gerente_id',
                            'fecha_inicio_vigencia',
                            'descripcion'];
}
