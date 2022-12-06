<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends \TCG\Voyager\Models\User
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'email',
        'user_type',
        'index_id',
        'phone_number',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function startup()
    {
        return $this->hasOne(Startup::class,'user_id','id')
            ->with(['startup_industries','looking_for','business_model','country','stages']);
    }
    public function investor()
    {
        return $this->hasOne(Investor::class,'user_id','id')
            ->with(['type','countries','markets','ranges','industries']);
    }
    public function mentor()
    {
        return $this->hasOne(Mentor::class,'user_id','id')
            ->with(['issues','country','fields']);
    }
}
