<?php

namespace App\Http\Controllers\Investors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\InvestorServices;

class ProfileController extends Controller
{
    public function index($value='')
    {
        InvestorServices::getMyProfileInfo();
    }
    public function update(Request $request)
    {
        $this->validate($request,[
            'name.full' => 'required',
            'name.company' => 'required',
            'image' => 'required',
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
        if (InvestorServices::checkIfInvestorHaveProfileCompleted()) {
            return InvestorServices::updateMyProfileInfo($request);
        }else{
            return InvestorServices::createProfile($request);
        }
    }
}
