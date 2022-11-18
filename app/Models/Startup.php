<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;

class Startup extends Model
{
    use HasFactory;
    protected $fillable=[
        "name",
        "founded",
        "full_name",
        "phone_index",
        "number",
        "ceo_email",
        "startup_email",
        "website",
        "what_your_company_does",
        "description",
        "inovation",
        "stage_id",
        "bussiness_model",
        "target_audience",
        // "industries_id",
        "country_id",
        // "looking_for_id",
        "user_id",
        "logo"
    ];
    public function startup_industries()
    {
        return $this->hasMany(Startup_industries::class,'startup_id')->with("industry");
    }
    static public function allStartups($value='')
    {
        return $pipeline=app(Pipeline::class)
            ->send(self::query())
            ->through([
                \App\QueryFilters\Countries::class,
                \App\QueryFilters\Stages::class,
                \App\QueryFilters\Search_title::class,
                \App\QueryFilters\Sort::class,
                \App\QueryFilters\Name::class,
                \App\QueryFilters\Fields::class,
            ])->thenReturn()->get();
    }
}
