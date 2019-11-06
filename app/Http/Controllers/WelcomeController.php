<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class WelcomeController extends Controller
{
    // public function create($id){
    //     $
    // }
    public function welcome(){
        // return view("frontend.welcome");

        $event = Event::all();
        return view('frontend.welcome')->with('events',$event);
    }
}
