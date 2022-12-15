<?php

namespace App\Http\Controllers\Startups;

use App\Http\Controllers\Controller;
use App\Models\Bussiness_model;
use App\Models\Range;
use App\Models\TargetAudience;
use Illuminate\Http\Request;
use App\Models\Startup_looking_for;
use App\Models\Startup_industries;
use App\Models\Country;
use App\Models\Startup;
use App\Models\Stage;
use App\Models\Investor;
use App\Models\Investor_type;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index($value='')
    {
        $types=Investor_type::get();
        $investors=Investor::allInvestors();

        return view("startup.dashboard",[
            'investors' => $investors,
            'types' => $types
        ]);
    }
    public function my_account()
    {
        $startup = Startup::where('user_id',Auth::user()->id)
        ->with([
            'startup_industries',
            'looking_for',
            'business_model',
            'country',
            'stages',
            'investment_range',
            'target_audience'
        ])->first();
        return view("startup.my_account",[
            'startup' => $startup,
            'data' => [
                'industries' => Startup_industries::get(),
                'looking_for' => Startup_looking_for::with('looking_for')->get(),
                'bussiness_model' => Bussiness_model::get(),
                'investment_range' => Range::get(),
                'countries' => Country::get(),
                'stages' => Stage::get(),
                'target_audience' => Investor_type::get()
            ]
        ]);
    }
    public function cards()
    {
        $investors=Investor::allInvestors();
        return $investors;
    }
    public function show($id)
    {
        $investor=Investor::with(["type","ranges"])->where("id",$id)->firstOrFail();
        return view("startup.apply",[
            'investor' => $investor
        ]);
    }
}
