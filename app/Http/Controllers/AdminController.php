<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Custom_event;
use App\Models\Field;
use App\Models\Investor_type;
use App\Models\Issue;
use App\Models\Phone_index;
use App\Models\Range;
use App\Models\User;
use App\Models\WelcomeMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Events;
use App\Models\News;

class AdminController extends Controller
{
    function events()
    {
        $events = Events::get();
        return view("admin.events",[
            'events' => $events
        ]);
    }
    function addUser()
    {
        $types=Investor_type::get();
        $country=Country::get();
        $range=Range::get();
        $phone_index = Phone_index::get();
        $issues=Issue::orderBy('title')->get();
        $fields=Field::orderBy('title')->get();

        return view('admin.users',[
            "types" => $types,
            "issues" => $issues,
            "fields" => $fields,
            "country" => $country,
            "range" => $range,
            "phone_index" => $phone_index
        ]);
    }
    function setAndGetImageName($file, $disk_name, $image_type=".jpg")
    {
        $filaname=time().uniqid().$image_type;
        $data = substr($file, strpos($file, ',') + 1);
        $data = base64_decode($data);
        Storage::disk($disk_name)->put($filaname,$data);

        return $filaname;
    }
    function addEvent(Request $request)
    {
        $this->validate($request,[
            "title" => "required|string",
            "description" => "required|string",
            "date" => "required",
            "image" => "required",
            "card_color" => "required|string",
        ]);
        $event = $request->post();
        $event['image'] = $this->setAndGetImageName($request->input('image'),"events");
        return Events::create($event);
    }
    function editEvent(Request $request)
    {
        $event = $request->post()['event'];
        unset(
            $event['is_active'],
            $event['created_at'],
            $event['updated_at']
        );
        if (str_contains($request->input('event.image'), 'data:image')) {
            Storage::disk('events')->delete($event['image']);
            $event['image'] = $this->setAndGetImageName($request->input('event.image'),"events");
        }
        Events::where('id', $request->input('id'))->update($event);
        return [
            'status' => 'success'
        ];
    }
    function deleteEvent($event_id)
    {
        $event = Events::where('id', $event_id);
        Storage::disk('events')->delete($event->first()->image);
        $event->delete();
        return [
            'status' => 'success'
        ];
    }
    function singlePage(){
        $singlePage = Custom_event::first();
        $events = Events::get();

        return view("admin.single-page",[
            'singlePage' => $singlePage,
            'events' => $events
        ]);
    }
    function singlePageCreate(Request $request){
        $custom = new Custom_event;
        $this->singlePageDelete();
        $url = '/events/main/';
        WelcomeMenu::where('id',4)->update([
            'url' => $url.urlencode($request->title).'.'.$request->id
        ]);
        $custom->create([
            'news_id' => $request->id
        ]);

        return $url.urlencode($request->title).'.'.$request->id;
    }
    function singlePageDelete(){
        $items = Custom_event::get();
        foreach($items as $item) {
            $item->delete();
        }
        return 1;
    }
    function getUserTypeData($type, $user_id){
        return User::where('id', $user_id)->with($type)->first();
    }
}
