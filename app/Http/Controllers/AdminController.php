<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    function events()
    {
        $events = Events::get();
        return view("admin.events",[
            'events' => $events
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
    function editEvent(Request $request)
    {
        $event = $request->post()['event'];
        unset($event['is_active']);
        $event['image'] = $this->setAndGetImageName($request->input('event.image'),"events");

        Events::where('id', $request->input('id'))->update($event);
        return [
            'status' => 'success'
        ];
    }
    function deleteEvent($event_id)
    {
        Events::where('id', $event_id)->delete();
        return [
            'status' => 'success'
        ];
    }
}
