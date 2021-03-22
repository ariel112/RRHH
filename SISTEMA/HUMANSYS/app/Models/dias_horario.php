<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dias_horario extends Model
{
    use HasFactory;
    protected $table = 'dias_horario';
    protected $fillable = [
        'dia',
        'entrada',
        'salida',
        'hoarios_id'
    ];
}
