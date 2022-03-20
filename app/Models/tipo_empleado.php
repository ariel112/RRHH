<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_empleado extends Model
{
    use HasFactory;
    protected $table = 'tipo_empleado';
    protected $fillable = ['id', 'nombre'];
}
