<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MentorDashboardController extends Controller
{
    public function index()
    {
        return view('mentor.dashboard');
    }
}
