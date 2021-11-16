<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investor_type;
use App\Models\Country;
use App\Models\Range;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $types=Investor_type::get();
        $country=Country::get();
        $range=Range::get();
        return view('choose_side.index',[
            "types" => $types,
            "country" => $country,
            "range" => $range,
        ]);
    }
}
