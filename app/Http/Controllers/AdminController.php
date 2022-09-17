<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;

class AdminController extends Controller
{
    function events()
    {
        $events = Events::get();
        return view("admin.events",[
            'events' => $events
        ]);
    }
}
