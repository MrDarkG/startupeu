<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Faq_questions;

class Faq_answers extends Model
{
    use HasFactory;
    protected $fillable=[
        "title",
        "question_id",
        "startup_ecosystem_id"
    ];
}
