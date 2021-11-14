<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;

class Investor extends Model
{
    use HasFactory;

    protected $fillable=[
        "name",
        "company_name",
        "investments",
        "about",
        "website",
        "email",
        "range_id",
        "market_id",
        "interest_id",
        "country_id",
        "type_id",
        "logo"
    ];
    static public function allInvestors($value='')
    {
        return $pipeline=app(Pipeline::class)
        ->send(self::query())
        ->through([
            \App\QueryFilters\Interest::class,
            \App\QueryFilters\Market::class,
            \App\QueryFilters\Type::class,
        ])->thenReturn()->get();
    }

    public function type($value='')
    {
        return $this->belongsTo(Investor_type::class,"type_id");
    }
}
