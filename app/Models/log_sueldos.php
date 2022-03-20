<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class log_sueldos extends Model
{
    use HasFactory;
    protected $table = 'log_sueldos';

    protected $fillable = [
                            'sueldo', 'empleado_id', 'contrato_id'
                          ];
}
