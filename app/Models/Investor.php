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
        "user_id",
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
        ])->thenReturn()->with(["ranges"])->get();
    }
    static public function filterInvestors($value='')
    {
        return $pipeline=app(Pipeline::class)
            ->send(self::query())
            ->through([
                \App\QueryFilters\Countries::class,
                \App\QueryFilters\Markets::class,
                \App\QueryFilters\Ranges::class,
                \App\QueryFilters\Search_title::class,
                \App\QueryFilters\Fields::class,
            ])->thenReturn()->with(["ranges"])->get();
    }
    static public function paginatedInvestors($count)
    {
        return $pipeline=app(Pipeline::class)
            ->send(self::query())
            ->through([
                \App\QueryFilters\Countries::class,
                \App\QueryFilters\Sort::class,
                \App\QueryFilters\Name::class,
                \App\QueryFilters\Fields::class,
                \App\QueryFilters\Issues::class,
            ])->thenReturn()->paginate($count);
    }
    public function type($value='')
    {
        return $this->belongsTo(Investor_type::class,"type_id");
    }

    public function ranges()
    {
        return $this->hasOne(Range::class,"id",'range_id');
    }

}
