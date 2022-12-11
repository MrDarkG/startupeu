<?php

namespace App\Http\Controllers;

use App\Models\Custom_event;
use App\Models\Events;
use App\Models\Faq_category;
use App\Models\Investor;
use App\Models\Investor_industries;
use App\Models\MainEventButtons;
use App\Models\Market;
use App\Models\Range;
use App\Models\Stage;
use App\Models\Startup_ecosystem;
use App\Models\WelcomeMenu;
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
        $startup_ecosystem = Startup_ecosystem::get();
        $events = Events::orderBy('created_at','Desc')->take(4)->get();
        return view('welcome',[
            'news' => $news,
            'startups' => $startups,
            'ecosystem' => $startup_ecosystem,
            'events' => $events
        ]);
    }
    public function getWelcomeMenu(){
        return WelcomeMenu::where('is_visible',1)->get();
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
        $markets=Market::get();
        $ranges=Range::get();
        $fields=Field::orderBy('title')->get();
        $investors=Investor::paginatedInvestors(10);
        $startups=Startup::get();
        $countries=Faq_country::orderBy('title')->get();

        return view("browse.investors",[
            'fields' => $fields,
            'investors' => $investors,
            'countries' => $countries,
            'markets' => $markets,
            'ranges' => $ranges,
            'startups' => $startups
        ]);
    }
    public function startupPage()
    {
        $mentors=Mentor::paginatedMentors(10);
        $startups=Startup::with('startup_industries')->get();
        $stages=Stage::orderBy('title')->get();
        $countries=Faq_country::orderBy('title')->get();

        return view("browse.startups",[
            'mentors' => $mentors,
            'startups' => $startups,
            'stages' => $stages,
            'countries' => $countries
        ]);
    }
    function eventSinglePage($event_id){
        $event = Events::where('id' ,$event_id)->firstOrFail();
        $event['date'] = date("F jS, Y", strtotime($event['date']));
        return view('events.single-page',[
            'event' => $event,
        ]);
    }
    function allEvent(){
        $events = Events::get();
        return view('events.index',[
            'events' => $events
        ]);
    }
    function singleStartupEcosystem($startup_ecosystem_id){
        $startup_ecosystem = Startup_ecosystem::where('id',$startup_ecosystem_id)->first();
        if (json_decode($startup_ecosystem->pdf)){
            $startup_ecosystem->pdf = json_decode($startup_ecosystem->pdf)[0]->download_link;
        }
        $categories = Faq_category::with(['questions'=>function($query) use($startup_ecosystem){
            return $query->with(['answers'=>function($answers_query) use ($startup_ecosystem){
                return $answers_query->where('startup_ecosystem_id', $startup_ecosystem->id);
            }]);
        }])->get();

        return view('startup-ecosystem.single-page',[
            'startup_ecosystem' => $startup_ecosystem,
            'categories' => $categories
        ]);
    }
    function allStartupEcosystem(){
        $startup_ecosystems = Startup_ecosystem::get();
        return view('startup-ecosystem.index',[
            'startup_ecosystems' => $startup_ecosystems
        ]);
    }
    public function show($slug, $id)
    {
        $news = News::where('id',$id)->firstOrFail();
        $otherNews = News::orderBy('created_at')->where('id',"<>",$id)->take(4)->get();
        $buttons = (Custom_event::where('news_id',$news->id)->first())?MainEventButtons::get():[];

        return view('News.details',[
            'news' => $news,
            'otherNews' => $otherNews,
            'buttons' => $buttons
        ]);
    }
    public function allNews()
    {
        $news = News::get();
        return view('News.index',[
            'news' => $news,
        ]);
    }
    public function singleStartupPage($startup_id){
        $startup = Startup::where('id',$startup_id)
            ->with(['looking_for','business_model','country','startup_industries'])
            ->firstOrFail();
        return view('startup.single-page',[
            'startup' => $startup,
        ]);
    }
    public function singleInvestorPage($investor_id){
        $investor = Investor::where('id',$investor_id)
            ->with(['type','countries','ranges','industries'])
            ->firstOrFail();
        return view('investor.single-page',[
            'investor' => $investor,
        ]);
    }
    public function mentorSinglePage($mentor_id){
        $mentor = Mentor::where('id',$mentor_id)
            ->with(['country','fields','issues','user'])
            ->firstOrFail();
        return view('mentor.single-page',[
            'mentor' => $mentor,
        ]);
    }
}
