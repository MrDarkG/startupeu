<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone_index extends Model
{
    use HasFactory;
    protected $table='phone_indexs';
    protected $fillable=[
        'code',
        'country'
    ];
}
