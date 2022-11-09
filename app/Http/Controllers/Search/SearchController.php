<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Models\Startup;
use Illuminate\Http\Request;
use App\Models\Mentor;
use App\Models\Investor;
class SearchController extends Controller
{
    public function mentors($value='')
    {
        return Mentor::allMentors();
    }

    public function startups($value='')
    {
        return Startup::allStartups();
    }

    public function investors($value='')
    {
        return Investor::filterInvestors();
    }
}
