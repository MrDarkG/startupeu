<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Faq_questions;

class Faq_category extends Model
{
    use HasFactory;
    protected $fillable=[
        "title"
    ];

    function questions(){
        return $this->hasMany(Faq_questions::class,'category_id');
    }
}
