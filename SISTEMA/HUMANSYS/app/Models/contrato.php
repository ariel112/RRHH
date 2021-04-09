<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contrato extends Model
{
    use HasFactory;
    protected $table = 'contrato';

    protected $fillable = [
                            'num_contrato',
                            'tipo_contrato',
                            'num_delagacion',
                            'fecha_inicio',
                            'fecha_fin',
                            'sueldo',
                            'vacaciones',
                            'empleado_id',
                            'horarios_id',
                            'users_aprueba_id',
                            'empleado_rrhh'
                          ];
}
