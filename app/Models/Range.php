<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Range extends Model
{
    use HasFactory;
    protected $fillable=[
        "title"
    ];
    public function investor(){
        return $this->hasMany(Investor::class,'range_id','id');
    }
}
