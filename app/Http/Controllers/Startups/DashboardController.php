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
        $investors=Investor::allInvestors();
        
        return view("startup.dashboard",[
            'investors' => $investors,
            'types' => $types
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
            "investor" => $investor
        ]);
    }
}
