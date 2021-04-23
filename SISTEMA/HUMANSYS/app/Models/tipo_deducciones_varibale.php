<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_deducciones_varibale extends Model
{
    use HasFactory;
    protected $table = 'tipo_deducciones_varibale';
    protected $fillable = ['id', 'nombre'];
}
