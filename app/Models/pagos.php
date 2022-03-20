<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pagos extends Model
{
    use HasFactory;
    protected $table = 'pagos';//nombre de la tabla

    protected $primaryKey = 'id';//especifico la llave primaria, en este caso es entero incremental

    public $timestamps = true;

    protected $fillable = [
      'sueldo_mensual', 'catorcena','total_deducciones','sueldo_neto','empleado_id','identidad','planilla_id'
        
    ];
}
