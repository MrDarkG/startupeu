<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable=[
        "title",
        "code"
    ];
    public function investor(){
        return $this->hasMany(Investor::class,'country_id','id');
    }
    public function mentor(){
        return $this->hasMany(Mentor::class,'country_id','id');
    }
    public function startup(){
        return $this->hasMany(Startup::class,'country_id','id');
    }
}
