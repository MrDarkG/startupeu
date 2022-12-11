<?php

namespace App\Http\Controllers\Investors;

use App\Http\Controllers\Controller;
use App\Services\MainServices;
use App\Services\InvestorServices;
use Illuminate\Http\Request;
use App\Models\Investor;
class ProfileController extends Controller
{
    public function index()
    {
        InvestorServices::getMyProfileInfo();
    }
    public function update(Request $request)
    {
        $this->validate($request,[
            'name.full' => 'required',
            'name.company' => 'required',
            'email' => 'required',
            'website' => 'required',
            'about' => 'required',
            'about.investments' => 'required',
            'investment_range.id' => 'required|numeric',
            'which.market.id' => 'required|numeric',
            'which.stage.id' => 'required|numeric',
            'investor_type.id' => 'required|numeric',
            'industries' => 'required'
        ]);
        if (MainServices::checkIfProfileCompleted($request->input('user_id'), Investor::class)) {
            return InvestorServices::updateMyProfileInfo($request);
        }else{
            return InvestorServices::createProfile($request);
        }
    }
}
