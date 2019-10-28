<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $ticket = Ticket::all(); 
        $userid= Auth::user()->id;
        $eventquery= DB::select('select * from event where user_id='.$userid);
        

        return view('admin.tickets')
        ->with('ticket',$ticket)
        ->with('eventquery',$eventquery);      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userid=  Auth::user()->id;
        $eventquery= DB::select('select * from event where user_id='.$userid);
        $request_all = $request->all();
        $this->validate($request,[
            'ticket_type'=>'required',
            'price'=>'required',
            'eventid'=>'required',
            ]);

            $ticket_type = $request->input('ticket_type');
            $price = $request->input('price');
            $eventid = $request->input('eventid');
            

        
        $ticket = new Ticket;
        $ticket->ticket_type = $ticket_type;
        $ticket->price = $price;
        $ticket->eventid = $eventid;

        $ticket->save();
        
        return redirect('ticket')
        ->with('status','Ticket has successfully created.')
        ->with('eventquery',$eventquery);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ticketedit($id)
    {
        $ticket = Ticket::findOrFail($id);   
        return view('admin.ticket-update')->with('ticket',$ticket);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ticketupdate(Request $request, $id)
    {
            $ticket = Ticket::findOrFail($id);
            $ticket->update($request->all());
            
            $this->validate($request,[
                'ticket_type'=>'required',
                'price'=>'required',
                'eventid'=>'required',
            ]);
                          
            $ticket->save();
            return redirect('ticket')->with('status','Ticket has successfully Updated.');

        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ticketdelete($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return redirect('ticket')->with('status','Your Data is Deleted');
    }
}
