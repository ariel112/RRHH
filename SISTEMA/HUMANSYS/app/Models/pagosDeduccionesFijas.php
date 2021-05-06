<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pagosDeduccionesFijas extends Model
{
  
    use HasFactory;
    protected $table = 'pagos_deducciones_fijas';//nombre de la tabla

    protected $primaryKey = 'id';//especifico la llave primaria, en este caso es entero incremental

    public $timestamps = true;

    protected $fillable = [
      'nombre_deduccion', 'monto','total_deducciones','deduccion_variable_id','pagos_id','identidad','planilla_id','deduccion_fija_id'
        
    ];
}
