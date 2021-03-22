<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class referencia extends Model
{
    use HasFactory;
    protected $table = 'referencia';
    protected $fillable = [
        'id',
        'nombre',
        'identidad',
        'telefono',
        'email',
        'direccion',
        'parentezco',
        'empleado_id'];
}
