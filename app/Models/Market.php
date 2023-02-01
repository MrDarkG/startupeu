<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    use HasFactory;
    protected $fillable=[
        "title"
    ];
    public function investor(){
        return $this->hasMany(Investor::class,'market_id','id');
    }
}
