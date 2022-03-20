<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanda extends Model
{
    use HasFactory;
    protected $table = 'tanda';//nombre de la tabla

    protected $primaryKey = 'id';//especifico la llave primaria, en este caso es entero incremental

    public $timestamps = true;

    protected $fillable = [
      'nombre'
        
    ];
}
