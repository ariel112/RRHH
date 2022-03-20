<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class team_user extends Model
{
    use HasFactory;
    protected $table = 'team_user';
    protected $fillable = ['id', 'team_id', 'user_id', 'role'];
}
