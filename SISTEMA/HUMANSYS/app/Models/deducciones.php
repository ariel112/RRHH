<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deducciones extends Model
{
    use HasFactory;
    protected $table = 'deducciones';
    protected $fillable = [
        'id',
        'nombre',
        'url_imagen',
        'tipo_deducciones_id'];
}
