<?php

namespace App\Models;

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pagosDeduccionesFijas extends Model
{
  
    use HasFactory;
    protected $table = 'pagos_deducciones_fijas';//nombre de la tabla

    protected $primaryKey = 'id';//especifico la llave primaria, en este caso es entero incremental

    public $timestamps = true;

    protected $fillable = [
      'nombre_deduccion', 'monto','deduccion_fija_id','pagos_id','created_at','updated_at'
        
    ];
}
