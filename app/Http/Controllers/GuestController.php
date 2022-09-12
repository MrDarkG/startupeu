<?php

namespace App\Http\Controllers;

use App\Models\Investor;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Issue;
use App\Models\Field;
use App\Models\Mentor;
use App\Models\Faq_country;
use App\Models\Startup;
use App\Models\News;
class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function home()
    {
        $news = News::orderBy('created_at')->take(4)->get();
        $startups = Startup::get();
        return view('welcome',[
            'news' => $news,
            'startups' => $startups,
        ]);
    }
    public function index()
    {
        $issues=Issue::orderBy('title')->get();
        $fields=Field::orderBy('title')->get();
        $mentors=Mentor::paginatedMentors(10);
        $countries=Faq_country::orderBy('title')->get();

        return view("browse.mentors",[
            'issues' => $issues,
            'fields' => $fields,
            'countries' => $countries,
            'mentors' => $mentors
        ]);
    }
    public function investorsPage()
    {
        $issues=Issue::orderBy('title')->get();
        $fields=Field::orderBy('title')->get();
        $investors=Investor::paginatedInvestors(10);
        $startups=Startup::get();
        $countries=Faq_country::orderBy('title')->get();

        return view("browse.investors",[
            'issues' => $issues,
            'fields' => $fields,
            'investors' => $investors,
            'countries' => $countries,
            'startups' => $startups
        ]);
    }
    public function startupPage()
    {
        $mentors=Mentor::paginatedMentors(10);
        $startups=Startup::get();
        $issues=Issue::orderBy('title')->get();
        $fields=Field::orderBy('title')->get();
        $countries=Faq_country::orderBy('title')->get();

        return view("browse.startups",[
            'issues' => $issues,
            'fields' => $fields,
            'mentors' => $mentors,
            'startups' => $startups,
            'countries' => $countries
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
     * @return \Illuminate\Contracts\View\View
     */
    public function show($slug, $id)
    {
        $news = News::where('id',$id)->firstOrFail();
        $otherNews = News::orderBy('created_at')->where('id',"<>",$id)->take(4)->get();
        return view('News.details',[
            'news' => $news,
            'otherNews' => $otherNews,
        ]);
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
