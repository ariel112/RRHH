<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class techos extends Model
{
    use HasFactory;
    protected $table = 'techos';
    protected $fillable = [
        'porcentaje',
        'rango_inicio',
        'rango_final',
        'deducciones_id'];
}
