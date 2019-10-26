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
                    <h3>Update Events</h3>
                </div>
                <div class="card-body">
                   <div class="row">
                        <div class="col-md-6">
                        <form action="/event-update/{{ $events->eventid }}" method="POST" enctype="multipart/form-data">
                            {{csrf_field() }}
                            {{ method_field('PUT') }} 

                            <div class="form-group">
                                <label>Event Name</label>
                                <input type="text" name="event_name" value="<?php echo $events->event_name; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="time" class="col-form-label">Select a time:</label>
                                <input type="time" name="time" class="form-control" id="time" value="<?php echo $events->time; ?>">
                            </div>

                            <div class="form-group">
                                <label for="date" class="col-form-label">Pick a date:</label>
                                <input type="date" name="date" class="form-control" id="date"value="<?php echo $events->date; ?>">
                            </div>

                            <div class="form-group">
                                <button><label class="col-form-label">Choose image:</label></button>
                                <input type="file" name="image" class="form-control" >
                            </div>
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="/events" class="btn btn-danger">Cancel</a>
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
