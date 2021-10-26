<?php

namespace App\Http\Controllers\Mentors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MentorServices;

use App\Models\Country;


class ProfileController extends Controller
{
    


    public function index()
    {
        $data=MentorServices::getMyProfileInfo();
        $country=Country::orderBy('title')->get();
        return view("registration.mentor",[
            "data"=>$data,
            "country"=>$country
        ]);
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
