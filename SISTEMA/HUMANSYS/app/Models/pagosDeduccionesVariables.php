<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pagosDeduccionesVariables extends Model
{
    
    use HasFactory;
    protected $table = 'pagos_deducciones_variables';//nombre de la tabla

    protected $primaryKey = 'id';//especifico la llave primaria, en este caso es entero incremental

    public $timestamps = true;

    protected $fillable = [
      'nombre_deduccion', 'monto','deduccion_variable_id','pagos_id','created_at','updated_at'
        
    ];
}
