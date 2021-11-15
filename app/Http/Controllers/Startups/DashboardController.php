<?php

namespace App\Http\Controllers\Startups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Investor;

class DashboardController extends Controller
{
    public function index($value='')
    {
        $investors=Investor::allInvestors();
        
        return view("startup.dashboard",[
            'investors' => $investors,
        ]);
    }
}
