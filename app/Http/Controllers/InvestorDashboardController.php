<?php

namespace App\Http\Controllers;

use App\Models\Apply_status;
use App\Models\Startup;
use App\Models\Startup_apply_investor;
use Illuminate\Http\Request;

class InvestorDashboardController extends Controller
{
    public function __construct(){
        $this->middleware('investor_check');
    }
    public function index()
    {
        $startups = Startup_apply_investor::with(['startup','status'])->get();
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
        return view('investor.startups');
    }
    public function my_account()
    {
        return view('investor.account');
    }
    public function setStatusForStartup(Request $request)
    {
        $request->validate([
            'startup_id' => 'required|numeric',
            'investor_id' => 'required|numeric',
            'status_id' => 'required|numeric',
        ]);
        $apply_exists = Startup_apply_investor::where('startup_id',$request->startup_id)
            ->where('investor_id',$request->investor_id)->with('status');
        if($apply_exists->count() > 0){
            $apply_exists->update([
                'status_id' => $request->status_id,
            ]);
        }else{
            $apply_exists->create([
                'status_id' => $request->status_id,
                'startup_id' => $request->startup_id,
                'investor_id' => $request->investor_id,
            ]);
        }
        return $apply_exists->first();
    }
}
