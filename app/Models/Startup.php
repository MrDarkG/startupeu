<?php

namespace App\Models;

use App\QueryFilters\Stages;
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
    public function looking_for()
    {
        return $this->belongsTo(Looking_for::class,'startup_id');
    }
    public function business_model()
    {
        return $this->belongsTo(Bussiness_model::class,'bussiness_model','id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class,'country_id','id');
    }
    public function stages()
    {
        return $this->belongsTo(Stages::class,'stage_id','id');
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
