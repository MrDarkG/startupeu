<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvestorDashboardController extends Controller
{
    public function index()
    {
        return view('investor.dashboard');
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
