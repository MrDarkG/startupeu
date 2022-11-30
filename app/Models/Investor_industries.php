<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investor_industries extends Model
{
    use HasFactory;
    protected $fillable = [
        'investor_id',
        'industry_id',
        'user_id'
    ];

    function industry(){
        return $this->belongsTo(Industry::class);
    }
}
