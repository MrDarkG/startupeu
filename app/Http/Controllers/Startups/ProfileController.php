<?php

namespace App\Http\Controllers\Startups;

use App\Http\Controllers\Controller;
use App\Models\Startup;
use App\Services\MainServices;
use Illuminate\Http\Request;
use App\Services\StartupServices;
class ProfileController extends Controller
{
    public function index($value='')
    {
        StartupServices::getMyProfileInfo();
    }
    public function update(Request $request)
    {
        $request->validate([
            'user_id' => 'numeric',
            'startup.name' => 'required',
            'founded.year' => 'required|date',
            'founded.number' => 'required|numeric',
            'full_name' => 'required',
            'phone.index.id' => 'required|numeric',
            'startup.email' => 'required|email',
            'startup.number' => 'required|numeric',
            'website' => 'required',
            'about.company' => 'required',
            'about.product' => 'required',
            'about.innovation' => 'required',
            'current_stage' => 'required',
            'bussiness_model' => 'required',
            'target_audience' => 'required',
            'industries' => 'required',
            'country' => 'required',
            'what_are_you_looking' => 'required',
        ]);
        if (MainServices::checkIfProfileCompleted($request->input('user_id'), Startup::class)){
            return StartupServices::updateMyProfileInfo($request);
        }else{
            return StartupServices::createProfile($request);
        }
    }
}
