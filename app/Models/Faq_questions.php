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
    function answers($startup_ecosystem_id){
//        return $this->hasOneThrough(
//            Faq_answers::class,
//            Startup_ecosystem::class,
//            'startup_ecosystem_id', // Foreign key on the startup_ecosystem table...
//            'question_id', // Foreign key on the Faq_answers table...
//            'id', // Local key on the Faq_questions table...
//            'id' // Local key on the Startup_ecosystem table...
//        );
        return $this->hasMany(Faq_answers::class,'question_id','id');
    }
}
