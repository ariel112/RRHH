<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class team_invitations extends Model
{
    use HasFactory;
    protected $table = 'team_invitations';
    protected $fillable = ['id', 'team_id', 'email', 'role'];
}
