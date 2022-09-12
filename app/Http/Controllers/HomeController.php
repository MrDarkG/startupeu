<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investor_type;
use App\Models\Country;
use App\Models\Range;
use App\Models\Phone_index;
use App\Models\Field;
use App\Models\Issue;


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
        $phone_index = Phone_index::get();
        $issues=Issue::orderBy('title')->get();
        $fields=Field::orderBy('title')->get();
        return view('choose_side.index',[
            "types" => $types,
            "issues" => $issues,
            "fields" => $fields,
            "country" => $country,
            "range" => $range,
            "phone_index" => $phone_index
        ]);
    }
}
