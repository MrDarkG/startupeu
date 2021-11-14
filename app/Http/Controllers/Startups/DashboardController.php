<?php

namespace App\Http\Controllers\Startups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Investor;

class DashboardController extends Controller
{
    public function index($value='')
    {
        return view("layouts.main");
        return $investor=Investor::allInvestors();

    }
}
