<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Startup_team_info extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'lastname',
        'position',
        'linkedin',
        'startup_id',
        'about_me',
        'image',
    ];
}
