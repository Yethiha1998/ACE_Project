@extends('layouts.master')


@section('title')
   Edit-Registered| Festivilla
@endsection



@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Update Tickets</h3>
                </div>
                <div class="card-body">
                   <div class="row">
                        <div class="col-md-6">
                        <form action="/ticket-update/{{ $ticket->ticketid }}" method="POST" enctype="multipart/form-data">
                            {{csrf_field() }}
                            {{ method_field('PUT') }} 

                            <div class="form-group">
                                <label>Event ID</label>
                                <input type="text" name="eventid" value="<?php echo $ticket->ticketid; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="ticket_type" class="col-form-label">Ticket Type</label>
                                <select name="ticket_type" class="form-control">
                                    <option value="<?php echo $ticket->ticket_type;?>" selected disabled>{{$ticket->ticket_type}}</option>
                                    <option value="Regular">Regular</option>
                                    <option value="VIP">VIP</option>
                                    <option value="VVIP">VVIP</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="price" class="col-form-label">Price:</label>
                                <input type="price" name="price" class="form-control" id="price" value="<?php echo $ticket->price;?>">
                            </div>
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="/ticket" class="btn btn-danger">Cancel</a>
                         </form>
                        </div>
                   </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('scripts')

@endsection
