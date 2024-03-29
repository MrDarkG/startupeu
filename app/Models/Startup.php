<?php

namespace App\Models;

use App\QueryFilters\Stages;
use App\Models\Stage as StagesModel;
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
    public function startup_industries()
    {
        return $this->hasMany(Startup_industries::class,'startup_id')->with("industry");
    }
    public function target_audience()
    {
        return $this->hasOne(Investor_type::class,'id','target_audience');
    }
    public function looking_for()
    {
        return $this->hasMany(Startup_looking_for::class,'startup_id','id')->with('looking_for');
    }
    public function teamates()
    {
        return $this->hasMany(Startup_team_info::class,'startup_id','id');
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
        return $this->belongsTo(StagesModel::class,'stage_id','id');
    }
    public function investment_range(){
        return $this->hasOne(Range::class,'id','range_id');
    }
    public function aditional_info(){
        return $this->hasOne(Startup_aditional_info::class,'startup_id','id');
    }
    public function apply_status(){
        return $this->hasOne(Startup_apply_investor::class,'startup_id','id')->with('status');
    }
}
