<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departamento_pais extends Model
{
    use HasFactory;
    protected $table = 'departamento_pais';
    protected $fillable = ['id', 'nombre'];
}
