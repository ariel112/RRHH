<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feriado extends Model
{
    use HasFactory;
    protected $table = 'feriado';
    protected $fillable = ['fecha_dia', 'motivo', 'users_id','estatus_id'];
}
