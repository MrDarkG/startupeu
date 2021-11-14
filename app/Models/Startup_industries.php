<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Startup_industries extends Model
{
    use HasFactory;
    protected $fillable=[
        "industry_id",
        "startup_id",
        "user_id"
    ];
}
