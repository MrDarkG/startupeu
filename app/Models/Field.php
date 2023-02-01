<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;
    protected $fillable=[
        "title"
    ];
    public function mentor(){
        return $this->hasMany(Mentor::class,'fields_id','id');
    }
}
