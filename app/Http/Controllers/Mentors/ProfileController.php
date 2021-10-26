<?php

namespace App\Http\Controllers\Mentors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\MentorServices;


class ProfileController extends Controller
{
    
    public function index()
    {
        return MentorServices::getMyProfileInfo();
    } 

    public function update(Request $request)
    {
        if (MentorServices::checkIfMentorHaveProfileCompleted()) {
            return MentorServices::updateMyProfileInfo($request);
        }
        else{
            return MentorServices::createProfile($request);
        }
    }

    
}
