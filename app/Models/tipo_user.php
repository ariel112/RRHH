<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_user extends Model
{
    use HasFactory;
    protected $table = 'tipo_user';
    protected $fillable = ['id', 'nombre'];
}
