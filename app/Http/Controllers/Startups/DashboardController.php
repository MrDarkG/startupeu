<?php

namespace App\Http\Controllers\Startups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Investor;
use App\Models\Investor_type;

class DashboardController extends Controller
{
    public function index($value='')
    {
        $types=Investor_type::get();
        $investors=Investor::allInvestors()->with("type");
        
        return view("startup.dashboard",[
            'investors' => $investors,
            'types' => $types
        ]);
    }
}
