<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class log_cargo extends Model
{
    use HasFactory;
    protected $table = 'log_cargo';

    protected $fillable = [
                            'cargo_id','nombre_cargo','empleado_id', 'contrato_id'
                          ];
}
