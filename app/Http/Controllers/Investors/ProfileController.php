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
            'image' => 'required',
        ]);
        if (InvestorServices::checkIfInvestorHaveProfileCompleted()) {
            return InvestorServices::updateMyProfileInfo($request);
        }
        else{
            return InvestorServices::createProfile($request);
        }
    }
}
