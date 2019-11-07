<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Illuminate\Http\Request;

class BookinglistController extends Controller
{
    public function index()
    {
        $loginUser = Auth::user();

        if ($loginUser->role == 2 || $loginUser->role == 1) {
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

    

}
