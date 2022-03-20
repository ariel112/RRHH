<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_permiso extends Model
{
    use HasFactory;

    protected $table = 'tipo_permiso';//nombre de la tabla

    protected $primaryKey = 'id';//especifico la llave primaria, en este caso es entero incremental

    public $timestamps = true;

    protected $fillable = [// se rellenan de forma masiva    
                'id', 'permiso'
    ];

}
