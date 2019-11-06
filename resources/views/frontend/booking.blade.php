@extends('layouts.master')


@section('title')
    Dashboard | Festivilla
@endsection



@section('content')


<div class="col-sm-4">
        
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row"><!-- div class=row one start -->
            @if (session('success'))
                <div class="flash-message col-md-12">
                <div class="alert alert-success ">
                    {{session('success')}}
                </div>
                </div>
            @endif
        </div>
    </div>
</div>
<br><br>
<div class="content mt-3">
    <div class="animated fadeIn">
    </div>
</div>

@if (count($errors) > 0)
<div class="content mt-3"><!-- div class=row content start -->
    <div class="animated fadeIn"><!-- div class=FadeIn start -->
        <div class="card"><!-- card start -->
    
            <div class="card-body">  <!-- card-body start -->

                
                    <div class="row"><!-- div class=row One start -->
                        @foreach ($errors->all() as $error)
                            <div class="col-md-12"><!-- div class=col 12 One start -->
                                <p class="text-danger">* {{ $error }}</p> 
                            </div><!-- div class=col 12 One end -->
                        @endforeach
                    </div><!-- div class=row One end -->
                

            </div> <!-- card-body end -->

        </div><!-- card end -->
    </div><!-- div class=FadeIn start -->
</div><!-- div class=row content end -->
@endif

<div class="content mt-3"><!-- div class=row content start -->
    <div class="animated fadeIn"><!-- div class=FadeIn start -->
        <div class="card"><!-- card start -->

            <div class="card-header"><!-- card-header start -->
                <strong class="card-title">Booking Ticket</strong>
            </div><!-- card-header end -->
    
            <div class="card-body">  <!-- card-body start -->

				<form action="/booking/store" method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                <div class="row"><!-- div class=row One start -->

                   
                <table style ="width : 100%; text-align:center">
                <div class="col-md-4">
                    <tr>
                        <th>Event</th>
                        <th>Ticket</th>
                    </tr>
                    <tr>
                        <td>
                        <select class="form-control" name="eventid" id="eventid">
							<!-- <option value="" selected disabled>Select Course Name</option> -->

                                @foreach($events as $event)
                                    <option value="{{$event->eventid}}">{{$event->event_name}} ==== {{$event->time}}</option>
                                @endforeach
                        </select>
                        </td>
                        <td>
                            <select class="form-control" name="ticketid" id="ticketid">
							<!-- <option value="" selected disabled>Select Course Name</option> -->

                                @foreach($tickets as $ticket)
                                    <option value="{{$ticket->ticketid}}">{{$ticket->ticket_type}} ==== {{$ticket->price}} - KS</option>
                                @endforeach
                            </select>
                        </td>
                        </tr>

                        
                        <br>
                        </div>  
                        </table>

                </div><!-- div class=row One end -->

                <div class="row"><!-- div class=row One start -->

                    <div class="col-md-8">
                    </div>

                    <div class="col-md-2">
                        <input onclick="return myFunction();" class=" btn btn-primary" type='submit' value="Book Now" />
                    </div>

                    <div class="col-md-2">
                        <a href="/booking" class=" btn btn-secondary">Cancel</a>
                    </div>

                </div><!-- div class=row One end -->

                </form>
            </div> <!-- card-body end -->

        </div><!-- card end -->
    </div><!-- div class=FadeIn start -->
</div><!-- div class=row content end -->



<script>
  function myFunction() {
      if(!confirm("Are You Sure to do this ?"))
      event.preventDefault();
  }
 </script>
@endsection


@section('scripts')

@endsection

