<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor_issues extends Model
{
    use HasFactory;
    protected $fillable=[
        "mentor_id",
        "issue_id"
    ];
}
