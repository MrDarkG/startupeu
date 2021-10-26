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
            return [
                "status"=>"1",
                "description"=>"Information updated Successfully"
            ];
        }
        else{
            MentorServices::createProfile();
            return [
                "status"=>"1",
                "description"=>"Information stored Successfully"
            ];
        }
    }

    
}
