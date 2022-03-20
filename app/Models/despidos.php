<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class despidos extends Model
{
    use HasFactory;
    protected $table = 'despidos';
    protected $fillable = ['motivo', 'fecha_despido', 'empleado_id_despedido', 'empleado_id_gerente','contrato_id'];
}
