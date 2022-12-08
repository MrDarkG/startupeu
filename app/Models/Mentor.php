<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;

class Mentor extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'linnkedin',
        'question1',
        'question2',
        'country_id',
        'fields_id',
        'issues_id',
        'user_id',
        'logo'
    ];
    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function fields(){
        return $this->belongsTo(Field::class);
    }
    public function issues(){
        return $this->hasMany(Mentor_issues::class,'mentor_id','user_id')->with('issue');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    static public function allMentors($value='')
    {
        return $pipeline=app(Pipeline::class)
        ->send(self::query())
        ->through([
            \App\QueryFilters\Countries::class,
            \App\QueryFilters\Sort::class,
            \App\QueryFilters\Name::class,
            \App\QueryFilters\Search_title::class,
            \App\QueryFilters\Fields::class,
            \App\QueryFilters\Issues::class,
        ])->thenReturn()->get();
    }

    static public function paginatedMentors($count)
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
}
