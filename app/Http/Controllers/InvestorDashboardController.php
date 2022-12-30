<?php

namespace App\Http\Controllers;

use App\Models\Apply_status;
use App\Models\Bussiness_model;
use App\Models\Country;
use App\Models\Faq_country;
use App\Models\Investor;
use App\Models\Investor_type;
use App\Models\Mentor;
use App\Models\Range;
use App\Models\Stage;
use App\Models\Startup;
use App\Models\Startup_apply_investor;
use App\Models\Startup_industries;
use App\Models\Startup_looking_for;
use App\Services\InvestorServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvestorDashboardController extends Controller
{
    public function __construct(){
        $this->middleware('investor_check');
    }
    public function index()
    {
        $investor_id = Investor::where('user_id',Auth::user()->id)->first()->id;
        $startups = Startup_apply_investor::where('investor_id',$investor_id)->with(['startup','status'])->get();
        return view('investor.dashboard',[
            'startups' => $startups,
            'apply_status' => Apply_status::get(),
        ]);
    }
    public function opportunities()
    {
        return view('investor.opportunities');
    }
    public function startups()
    {
        $mentors=Mentor::paginatedMentors(10);
        $startups=Startup::with('startup_industries')->get();
        $stages=Stage::orderBy('title')->get();
        $countries=Faq_country::orderBy('title')->get();

        return view("investor.startups",[
            'mentors' => $mentors,
            'startups' => $startups,
            'stages' => $stages,
            'countries' => $countries
        ]);
    }
    public function my_account()
    {
        return view('investor.account');
    }
    public function setStatusForStartup(Request $request)
    {
        return InvestorServices::setStatusForStartup($request);
    }
    public function goToDashboardStartupSinglePage($startup_id)
    {
        if(is_numeric($startup_id)){
            $startup = Startup::where('id', $startup_id)
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
            return view('investor.startup_single_page',[
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
        return redirect()->back();
    }
}
