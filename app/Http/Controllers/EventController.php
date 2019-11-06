<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
class EventController extends Controller
{
    public function index()
    {
        $event = Event::all();
        return view('frontend.detail')->with('detail',$event);
    }
    public function eventedit(Request $request, $id){
        $event = Event::findOrFail($id);
        return view('frontend.detail')->with('event',$event);
    
    }
}
