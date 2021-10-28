<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mentor;
use App\Models\Investor;
class SearchController extends Controller
{
    public function mentors($value='')
    {
        return Mentor::allMentors();
    }

    public function investors($value='')
    {
        return Investor::allInvestors();
    }
}
