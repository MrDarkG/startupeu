<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
