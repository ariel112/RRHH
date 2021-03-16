<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class isr extends Model
{
    use HasFactory;
    protected $table = 'isr';
    protected $fillable = ['id', 'porcentaje', 'rango_inicio', 'rango_final'];
}
