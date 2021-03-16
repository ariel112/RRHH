<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departamento extends Model
{
    use HasFactory;
    protected $table = 'departamento';
    protected $fillable = ['id', 'nombre', 'empleado_encargado_id'];
}
