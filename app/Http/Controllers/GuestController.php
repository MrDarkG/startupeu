<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Issue;
use App\Models\Field;
use App\Models\Mentor;
use App\Models\Faq_country;
use App\Models\Startup;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issues=Issue::orderBy('title')->get();
        $fields=Field::orderBy('title')->get();
        $mentors=Mentor::paginatedMentors(10);
        $contries=Faq_country::orderBy('title')->get();

        return view("browse_mentors",[
            'issues' => $issues,
            'fields' => $fields,
            'contries' => $contries,
            'mentors' => $mentors
        ]);
    }
    public function startupPage()
    {
        $issues=Issue::orderBy('title')->get();
        $fields=Field::orderBy('title')->get();
        $mentors=Mentor::paginatedMentors(10);
        $startups=Startup::get();

        return view("browse_startups",[
            'issues' => $issues,
            'fields' => $fields,
            'mentors' => $mentors,
            'startups' => $startups
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
