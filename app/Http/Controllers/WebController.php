<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Category;


class WebController extends Controller
{
    public function welcome()
    {
        return view('web.welcome'); // Points to web/welcome.blade.php
    }

    public function DestinationWedding()
    {
        return view('web.DestinationWedding'); // Points to web/welcome.blade.php
    }

    public function TraditionalWedding()
    {
        return view('web.TraditionalWedding'); // Points to web/welcome.blade.php
    }

    public function contact()
    {
        return view('web.contact'); // Points to web/welcome.blade.php
    }


    public function menu()
    {
        return view('web.menu'); // Points to web/welcome.blade.php
    }

    public function confirm()
    {
        return view('web.confirm'); // Points to web/welcome.blade.php
    }

    public function submitcontact()
    {
        return view('web.submitcontact'); // Points to web/welcome.blade.php
    }
    public function events()
    {
        
         $events = Event::all(); // Fetch events from the database
 
        return view('web.events', compact('events')); // Pass the events to the view

    }



}
