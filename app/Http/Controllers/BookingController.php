<?php

namespace App\Http\Controllers;
use DB;
use Auth;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    // public function booking(){
    //     return view (".frontend/booking");
    // }
    public function index()
    {
        $loginUser = Auth::user();

        if ($loginUser->role == 2) {
            $booking = DB::select('SELECT b.*,u.username AS username,e.event_name AS event_name,t.ticket_type AS ticket_type
                                FROM 
                                booking AS b 
                                JOIN users AS u
                                ON b.user_id = u.id
                                JOIN event AS e
                                ON b.eventid = e.eventid
                                JOIN ticket AS t
                                ON b.ticketid= t.ticketid');
        }
        else{
            $loginUserId = $loginUser->id;
            
            $booking = DB::select('SELECT b.*,u.username AS username,e.event_name AS event_name,t.ticket_type AS ticket_type
                                FROM 
                                booking AS b 
                                JOIN users AS u
                                ON b.id = u.id
                                JOIN event AS e
                                ON b.eventid = e.eventid
                                JOIN ticket AS t
                                ON b.ticketid = t.ticketid
                                WHERE b.user_id = '. $loginUserId);
        }
        
        return view('frontend.index')
            ->with('booking', $booking);
    }


    public function booking()
    {
        $events = DB::select('select * from event');
        $tickets = DB::select('select * from ticket');
        return view('frontend.booking')
            ->with('tickets', $tickets)
                ->with('events', $events);
    }

    public function store(Request $request)
    {
        

    $loginUser = Auth::user();

        // Checking already login or not
        //if(count(array($loginUser))>0){
        if(!empty($loginUser)) {

            $events = DB::select('select * from event');
            $tickets = DB::select('select * from ticket');

            $eventid = $request->input('eventid');
            $ticketid = $request->input('ticketid');
            $user_id = $loginUser->id;
            // $registeredFlag = DB::select('select * from booking where user_id = ? AND eventid = ? AND ticketid = ?', [$user_id,$eventid,$ticketid]);

                // Getting Course detail information to insert course fee as history
                $ticket = DB::select('select * from ticket where ticketid = ' . $ticketid);
                   
                $fee = $ticket[0]->price;
                $created_at = date("Y-m-d H:i:s");
                DB::insert('insert into booking (user_id,eventid,ticketid,fees,created_at) values(?,?,?,?,?)',[$user_id,$eventid,$ticketid, $fee, $created_at]);

                $successmessage = "Success, Booking successfully !";
                $request->session()->flash('success', $successmessage);

                // return redirect()->route('/booking')
                // ->with('tickets', $tickets)
                // ->with('events', $events);
                return redirect('/booking');

        }
        else{
            $successmessage = "Error, your session time out and please login again ! ";
            $request->session()->flash('success', $successmessage);
    
            return route('/booking')
            ->with('tickets', $tickets)
            ->with('events', $events);
        }
    }

}
