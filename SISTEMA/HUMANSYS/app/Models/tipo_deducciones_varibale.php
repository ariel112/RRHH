<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_deducciones_variables extends Model
{
    use HasFactory;
    protected $table = 'tipo_deducciones_variables';
    protected $fillable = ['id', 'nombre'];
}
