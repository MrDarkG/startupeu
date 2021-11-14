<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Startup_looking_for extends Model
{
    use HasFactory;
    protected $fillable=[
        "user_id",
        "startup_id",
        "looking_for_id"
    ];
}
