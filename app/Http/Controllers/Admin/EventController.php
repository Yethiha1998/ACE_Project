<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index()
    {
        return view('admin.events');
    }

    public function store(Request $request)
    {
        $event = new Event;
        $event->event_name = $request->input('event_name');
        $event->time = $request->input('time');
        $event->date = $request->input('date');


        $this->validate($request, [

            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
    
        if($request->hasfile('image'))
        {

            foreach($request->file('image') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);  
                $data = $name;  
            }
        }

        $event->image=json_encode($data);

        $event->user_id = $request->input('user_id');

        $event->save();
        return redirect('events')->with('status','Event has successfully created.');
    }
}
