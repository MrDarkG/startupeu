<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'linnkedin',
        'question1',
        'question2',
        'country_id',
        'fields_id',
        'issues_id',
        'user_id',
        'logo'
    ];
}
