<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_deducciones extends Model
{
    use HasFactory;
    protected $table = 'tipo_deducciones';
    protected $fillable = ['id', 'nombre'];
}
