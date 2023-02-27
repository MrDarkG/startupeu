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
use Illuminate\Support\Facades\Auth;
use App\Services\DataService;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function home()
    {
        $news = News::latest()->take(4)->get();
        $startups = Startup::latest()->take(9)->get();
        $startup_ecosystem = Startup_ecosystem::get();
        $events = Events::latest()->take(4)->get();
        return view('welcome', [
            'news' => $news,
            'startups' => $startups,
            'ecosystem' => $startup_ecosystem,
            'events' => $events
        ]);
    }

    public function getWelcomeMenu()
    {
        return WelcomeMenu::where('is_visible', 1)->get();
    }

    public function index()
    {
        $issues = DataService::getIssuesByChoosenSide('mentor');
        $fields =  DataService::getFieldsByChoosenSide('mentor');
        $mentors = Mentor::paginatedMentors(10);
        $countries = DataService::getCountriesByChoosenSide('mentor');

        return view("browse.mentors", [
            'issues' => $issues,
            'fields' => $fields,
            'countries' => $countries,
            'mentors' => $mentors
        ]);
    }

    public function investorsPage()
    {
        $markets =  DataService::getMarketsByChoosenSide('investor');
        $ranges = DataService::getRangeByChoosenSide('investor');
        $fields = Field::orderBy('title')->get();
        $investors = Investor::paginatedInvestors(10);
        $startups = Startup::get();
        $countries = DataService::getCountriesByChoosenSide('investor');

        return view("browse.investors", [
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
        $mentors = Mentor::paginatedMentors(10);
        $startups = Startup::with('startup_industries')->get();
        $stages = Stage::orderBy('title')->get();
        $countries = DataService::getCountriesByChoosenSide('startup');

        return view("browse.startups", [
            'mentors' => $mentors,
            'startups' => $startups,
            'stages' => $stages,
            'countries' => $countries
        ]);
    }

    function eventSinglePage($event_id)
    {
        $event = Events::where('id', $event_id)->firstOrFail();
        $event['date'] = date("F jS, Y", strtotime($event['date']));
        return view('events.single-page', [
            'event' => $event,
        ]);
    }

    function allEvent()
    {
        $events = Events::get();
        return view('events.index', [
            'events' => $events
        ]);
    }

    function singleStartupEcosystem($startup_ecosystem_id)
    {
        $startup_ecosystem = Startup_ecosystem::where('id', $startup_ecosystem_id)->first();
        if (json_decode($startup_ecosystem->pdf)) {
            $startup_ecosystem->pdf = json_decode($startup_ecosystem->pdf)[0]->download_link;
        }
        $categories = Faq_category::with(['questions' => function ($query) use ($startup_ecosystem) {
            return $query->with(['answers' => function ($answers_query) use ($startup_ecosystem) {
                return $answers_query->where('startup_ecosystem_id', $startup_ecosystem->id);
            }]);
        }])->get();

        return view('startup-ecosystem.single-page', [
            'startup_ecosystem' => $startup_ecosystem,
            'categories' => $categories
        ]);
    }

    function allStartupEcosystem()
    {
        $startup_ecosystems = Startup_ecosystem::get();
        return view('startup-ecosystem.index', [
            'startup_ecosystems' => $startup_ecosystems
        ]);
    }

    public function show($slug, $id)
    {
        $news = News::where('id', $id)->firstOrFail();
        $otherNews = News::orderBy('created_at','desc')->where('id', "<>", $id)->take(4)->get();
        $buttons = (Custom_event::where('news_id', $news->id)->first()) ? MainEventButtons::get() : [];

        return view('News.details', [
            'news' => $news,
            'otherNews' => $otherNews,
            'buttons' => $buttons
        ]);
    }
    public function showEvent($slug, $id)
    {
        $event = Events::where('id', $id)->firstOrFail();
        $otherEvents = Events::orderBy('id','asc')->where('id', "<>", $id)->take(4)->get();
        $buttons = (Custom_event::where('news_id', $event->id)->first()) ? MainEventButtons::get() : [];

        return view('events.main-event', [
            'event' => $event,
            'otherEvents' => $otherEvents,
            'buttons' => $buttons
        ]);
    }
    public function allNews()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        return view('News.index', [
            'news' => $news,
        ]);
    }

    public function singleStartupPage($startup_id)
    {
        $startup = Startup::where('id', $startup_id)
            ->with(['looking_for', 'business_model', 'country', 'startup_industries'])
            ->firstOrFail();
        return view('startup.single-page', [
            'startup' => $startup,
        ]);
    }

    public function singleInvestorPage($investor_id)
    {
        $investor = Investor::where('id', $investor_id)
            ->with(['type', 'countries', 'ranges', 'industries'])
            ->firstOrFail();
        return view('investor.single-page', [
            'investor' => $investor,
        ]);
    }

    public function mentorSinglePage($mentor_id)
    {
        $mentor = Mentor::where('id', $mentor_id)
            ->with(['country', 'fields', 'issues', 'user'])
            ->firstOrFail();
        return view('mentor.single-page', [
            'mentor' => $mentor,
        ]);
    }

    public function startupUpdate(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string',
            'website' => 'required|string',
            'startup.name' => 'required|string',
            'startup.date' => 'required|date',
            'startup.number_of_founders' => 'required|numeric',
            'startup.email' => 'required|email',
            'ceo.number' => 'required|numeric',
            'ceo.email' => 'required|email',
            'about.company_does' => 'required|string',
            'about.describe_your_product' => 'required|string',
            'about.your_innovation' => 'required|string',
            'stage.id' => 'required|numeric',
            'country.id' => 'required|numeric',
            'business_model.id' => 'required|numeric',
            'looking_for' => 'required|array',
            'investment_range.id' => 'required|numeric',
        ]);

        Startup::where('user_id', Auth::user()->id)->update([
            'name' => $request->input('startup.name'),
            'founded' => $request->input('startup.date'),
            'number_of_founders' => $request->input('startup.number_of_founders'),
            'full_name' => $request->input('full_name'),
            'number' => $request->input('ceo.number'),
            'ceo_email' => $request->input('ceo.email'),
            'startup_email' => $request->input('startup.email'),
            'website' => $request->input('website'),
            'what_your_company_does' => $request->input('about.company_does'),
            'description' => $request->input('about.describe_your_product'),
            'inovation' => $request->input('about.your_innovation'),
            'stage_id' => $request->input('stage.id'),
            'bussiness_model' => $request->input('business_model.id'),
            'target_audience' => $request->input('target_audience.id'),
            'range_id' => $request->input('investment_range.id'),
            'country_id' => $request->input('country.id'),
        ]);
        return 1;
    }
}
