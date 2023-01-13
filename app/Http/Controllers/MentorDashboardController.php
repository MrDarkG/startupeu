<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Field;
use App\Models\Issue;
use App\Models\Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MentorDashboardController extends Controller
{
    public function index()
    {
        $mentor = Mentor::where('user_id', Auth::user()->id)
        ->with([
            'user',
            'country',
            'fields',
            'issues'
        ])->first();
        $country=Country::orderBy('title')->get();
        $issues=Issue::orderBy('title')->get();
        $fields=Field::orderBy('title')->get();
        return view('mentor.dashboard',[
            'mentor' => $mentor,
            'data' => [
                'countries' => $country,
                'issues' => $issues,
                'fields' => $fields
            ],
        ]);
    }
}
