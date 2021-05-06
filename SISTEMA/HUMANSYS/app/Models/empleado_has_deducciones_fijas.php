<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleado_has_deducciones_fijas extends Model
{
    use HasFactory;
    protected $table = 'empleado_has_deducciones_fijas';
    protected $fillable = [
        'empleado_id',
        'deducciones_id',
        'monto_deduccion'];
}
