<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Startup_apply_investor extends Model
{
    use HasFactory;
    protected $fillable = [
        'startup_id',
        'investor_id',
        'status_id',
    ];
    public function status(){
        return $this->hasOne(Apply_status::class,'id','status_id');
    }
    public function startup(){
        return $this->hasOne(Startup::class, 'id', 'startup_id');
    }
}
