<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Startup_aditional_info extends Model
{
    use HasFactory;
    protected $fillable = [
        'startup_id',
        'traction',
        'problem',
        'expected_revenue',
        'mmr_data',
        'current_arr',
        'retention',
        'custumer_acquisition',
        'prototype',
        'years_experience',
        'how_much_money',
        'how_much_percent',
        'churn_rate'
    ];
}
