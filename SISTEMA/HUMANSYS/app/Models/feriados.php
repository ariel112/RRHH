<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feriados extends Model
{
    use HasFactory;
    protected $table = 'estatus';
    protected $fillable = ['fecha_dia', 'motivo', 'users_id','estatus_id'];
}
