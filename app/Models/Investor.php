<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;
use App\Models\Investor_industries;
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
        ])->thenReturn()->with(["ranges","apply_status"])->get();
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
    public function countries()
    {
        return $this->belongsTo(Country::class,"country_id");
    }
    public function industries()
    {
        return $this->hasMany(Investor_industries::class)->with("industry");
    }
    public function markets()
    {
        return $this->belongsTo(Market::class,"market_id");
    }
    public function ranges()
    {
        return $this->hasOne(Range::class,"id",'range_id');
    }
    public function apply_status(){
        return $this->hasOne(Startup_apply_investor::class,'investor_id','id')->with('status');
    }
}
