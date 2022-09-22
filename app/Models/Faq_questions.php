<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq_questions extends Model
{
    use HasFactory;
    protected $fillable=[
        "title",
        "category_id"
    ];
    function answers(){
        return $this->hasMany(Faq_questions::class,'id','question_id');
    }
}
