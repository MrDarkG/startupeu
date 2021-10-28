<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;

class Investor extends Model
{
    use HasFactory;
    static public function allInvestors($value='')
    {
        return $pipeline=app(Pipeline::class)
        ->send(self::query())
        ->through([
            \App\QueryFilters\Interest::class,
            \App\QueryFilters\Market::class,
        ])->thenReturn()->get();
    }
}
