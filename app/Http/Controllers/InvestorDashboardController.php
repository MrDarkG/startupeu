<?php

namespace App\Http\Controllers;

use App\Models\Startup;
use Illuminate\Http\Request;

class InvestorDashboardController extends Controller
{
    public function index()
    {
        $startups = Startup::with('startup_industries')->get();
        return view('investor.dashboard',[
            'startups' => $startups
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
}
