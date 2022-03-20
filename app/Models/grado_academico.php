<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grado_academico extends Model
{
    use HasFactory;
    protected $table = 'grado_academico';
    protected $fillable = ['id', 'grado'];
}
