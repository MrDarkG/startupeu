<?php

namespace App\Http\Controllers\Startups;

use App\Http\Controllers\Controller;
use App\Models\Apply_status;
use App\Models\Bussiness_model;
use App\Models\Range;
use App\Models\Startup_aditional_info;
use App\Models\Startup_apply_investor;
use App\Models\Startup_team_info;
use App\Models\TargetAudience;
use App\Services\InvestorServices;
use Illuminate\Http\Request;
use App\Models\Startup_looking_for;
use App\Models\Startup_industries;
use App\Models\Country;
use App\Models\Startup;
use App\Models\Stage;
use App\Models\Investor;
use App\Models\Investor_type;
use Illuminate\Support\Facades\Auth;
use App\Services\MainServices;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('startup_check');
    }
    public function index($value='')
    {
        $types=Investor_type::get();
        $investors=Investor::allInvestors();
        $startup_id = Startup::where('user_id',Auth::user()->id)->first()->id;
        $statuses = Apply_status::get();
        return view("startup.dashboard",[
            'statuses' => $statuses,
            'startup_id' => $startup_id,
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
            'target_audience',
            'teamates',
            'aditional_info'
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
    public function addStartupTeamate(Request $request){
        $teamate = $request->validate([
            'name' => 'required|string',
            'lastname' => 'required|string',
            'linkedin' => 'required|string',
            'position' => 'required|string',
            'image' => 'required',
            'about_me' => 'required|string',
        ]);
        $startup_id = Startup::where('user_id',Auth::user()->id)
            ->first()->id;
        $fileName = $teamate['image'];
        if($startup_id){
            $base64 = null;
            if(is_null($request['id'])){
                $fileName = MainServices::generateRandomString().'.jpg';
                $base64 = $teamate['image'];
                $teamate['image'] = $fileName;
            }
            $teamate['id'] = $request['id'];
            $teamate['startup_id'] = $startup_id;
            //$class_name, $is_image_base_64, $base64, $fileName, $value, $model_id, $diskname, $column_name
            return MainServices::getResultWithImageValue(
                new Startup_team_info,
                $base64,
                $teamate['image'],
                $teamate,
                $startup_id,
                'startups_teamate_images',
                'id'
            );
        }
        return null;
    }
    public function addStartupAdditionalInfo(Request $request){
        $additional_info = $request->validate([
            'traction' => 'required|string',
            'problem' => 'required|string',
            'expected_revenue.from' => 'required|numeric',
            'expected_revenue.to' => 'required|numeric',
            'mmr_data.from' => 'required|numeric',
            'mmr_data.to' => 'required|numeric',
            'current_arr.from' => 'required|numeric',
            'current_arr.to' => 'required|numeric',
            'how_much_money.from' => 'required|numeric',
            'how_much_money.to' => 'required|numeric',
            'retention' => 'required|string',
            'custumer_acquisition' => 'required|string',
            'prototype' => 'required|string',
            'retention' => 'required|numeric',
            'years_experience' => 'required|string',
            'how_much_percent' => 'required|string',
            'churn_rate' => 'required|string',
        ]);
        $startup_id = Startup::where('user_id',Auth::user()->id)
            ->first()->id;
        if($startup_id){
            $additional_info['startup_id'] = $startup_id;
            $additional_info['expected_revenue'] = $additional_info['expected_revenue']['from'].'-'.$additional_info['expected_revenue']['to'];
            $additional_info['mmr_data'] = $additional_info['mmr_data']['from'].'-'.$additional_info['mmr_data']['to'];
            $additional_info['current_arr'] = $additional_info['current_arr']['from'].'-'.$additional_info['current_arr']['to'];
            $additional_info['how_much_money'] = $additional_info['how_much_money']['from'].'-'.$additional_info['how_much_money']['to'];
            return MainServices::getResultWithSecondaryKey(
                new Startup_aditional_info,
                $additional_info,
                'startup_id',
                $startup_id
            );
        }
        return null;
    }
    public function setStatusForStartup(Request $request)
    {
        return InvestorServices::setStatusForStartup($request);
    }
}
