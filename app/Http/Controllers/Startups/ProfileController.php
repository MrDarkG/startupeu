<?php

namespace App\Http\Controllers\Startups;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\StartupServices;
class ProfileController extends Controller
{
    public function index($value='')
    {
        StartupServices::getMyProfileInfo();
    }
    public function update($value='')
    {
        if (StartupServices::checkIfStartupHaveProfileCompleted()) {
            return StartupServices::updateMyProfileInfo($request);
        }
        else{
            return StartupServices::createProfile($request);
        }
    }
}
