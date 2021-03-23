<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class funciones extends Model
{
    use HasFactory;
    protected $table = 'funciones';
    protected $fillable = [ 'nombre', 'cargo_id'];
}
