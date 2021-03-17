<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cargo extends Model
{
    use HasFactory;
    protected $table = 'cargo';
    protected $fillable = ['id', 'nombre', 'area_id', 'tipo_empleado'];
}