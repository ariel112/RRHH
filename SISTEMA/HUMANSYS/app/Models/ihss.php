<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ihss extends Model
{
    use HasFactory;
    protected $table = 'ihss';
    protected $fillable = ['id', 'nombre'];
}
