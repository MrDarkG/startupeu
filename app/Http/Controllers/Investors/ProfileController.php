<?php

namespace App\Http\Controllers\Investors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($value='')
    {
        InvestorServices::getMyProfileInfo();
    }
    public function update($value='')
    {
        if (InvestorServices::checkIfInvestorHaveProfileCompleted()) {
            return InvestorServices::updateMyProfileInfo($request);
        }
        else{
            return InvestorServices::createProfile($request);
        }
    }
}
