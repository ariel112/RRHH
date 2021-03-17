<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleado extends Model
{
    use HasFactory;
    protected $table = 'empleado';
    protected $fillable = ['id', 'identidad', 'nombre', 'primer_nombre', 'segundo_nombre', 'primer_apellido', 'segundo_apellido', 'fecha_nacimiento', 'fecha_ingreso','url_foto', 'email', 'email_institucional', 'estado_civil', 'lugar_nacimiento', 'municipio', 'descripcion_laboral', 'telefono_1', 'telefono_2', 'estatus_id', 'grado_academico_id'];
}