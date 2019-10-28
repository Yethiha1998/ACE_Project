<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index()
    {
        $event = Event::all();
        return view('admin.events')->with('event',$event);
    }

    public function store(Request $request)
    {

        $request_all = $request->all();
        
        $this->validate($request,[
            'event_name'=>'required',
            'time'=>'required',
            'date'=>'required',
            'image'=>'required',
            'user_id'=>'required',
            ]);

            $event_name = $request->input('event_name');
            $time = $request->input('time');
            $date = $request->input('date');
            
            $image = $request->file('image');
            $img_orginalname = $image->getClientOriginalName();
            $img_extension = $image->getClientOriginalExtension();
            $img_temp_name = uniqid() . "." . $img_extension;
            $file_name = public_path("images",$image->getClientOriginalName()) . "/" . $img_temp_name;
            move_uploaded_file($_FILES["image"]["tmp_name"],$file_name  );

            $user_id = $request->input('user_id');

        
        $event = new Event;
        $event->event_name = $event_name;
        $event->time = $time;
        $event->date = $date;
        $event->image= $img_temp_name;
        $event->user_id = $user_id;

        $event->save();
        return redirect('event')->with('status','Event has successfully created.');
    }

    public function eventedit(Request $request, $id){
        $event = Event::findOrFail($id);   
        return view('admin.event-update')->with('events',$event);
    
    }


    public function eventupdate(Request $request, $id){
       
        
            $event = Event::findOrFail($id);
            $event->update($request->all());
            
            $this->validate($request,[
                'event_name'=>'required',
                'time'=>'required',
                'date'=>'required',
                //'image'=>'required',
            ]);
                        
            if ($request->hasFile('image'))
            {
                $image = $request->file('image');
                $img_orginalname = $image->getClientOriginalName();
                $img_extension = $image->getClientOriginalExtension();
                $img_temp_name = uniqid() . "." . $img_extension;
                $file_name = public_path("images",$image->getClientOriginalName()) . "/" . $img_temp_name;
                move_uploaded_file($_FILES["image"]["tmp_name"],$file_name  ); 
                $event->image= $img_temp_name;                     
            }
        
            $event->save();
            return redirect('event')->with('status','Event has successfully Updated.');

            //return redirect()->action('Admin\EventController@index');
    }

    public function eventdelete($id){
        
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect('event')->with('status','Your Data is Deleted');
    }

    
}
