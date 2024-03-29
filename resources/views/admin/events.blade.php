@extends('layouts.master')


@section('title')
    Events | Festivilla
@endsection



@section('content')


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="/create_event" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                {{ csrf_field()}}
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <div class="form-group">
                    <label for="event_name" class="col-form-label">Event Name:</label>
                    <input type="text" name="event_name"class="form-control" id="event_name">
                </div>

                <div class="form-group">
                    <label for="time" class="col-form-label">Select a time:</label>
                    <input type="time" name="time" class="form-control" id="time">
                </div>

                <div class="form-group">
                    <label for="date" class="col-form-label">Pick a date:</label>
                    <input type="date" name="date" class="form-control" id="date">
                </div>

                <div class="form-group">
                    <button class="btn btn-primary"><label class="col-form-label">Choose image:</label></button>
                    <input type="file" name="image" class="form-control">
                </div>


                
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
      </form>

    </div>
  </div>
</div>



<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Event
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Create</button>
                </h4>
                
            @if (session('status'))
            <br>
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-primary">
                            <th>ID</th>
                            <th>Event Name</th>
                            <th>Time</th>
                            <th>Date</th>
                            <th>Image</th>
                            <th>EDIT</th>
                            <th class="text-right">DELETE</th>
                            </thead>
                    <tbody>
                    @foreach ($event as $row)
                        <tr>
                            <td>{{ $row->eventid }}</td>
                            <td>{{ $row->event_name }}</td>
                            <td>{{ $row->time }}</td>
                            <td>{{ $row->date }}</td>
                            <td> 
                                <img class="img-responsive" src="/images/{{$row->image}}" width="200px" height="180px">
                            </td>
                            <td>
                               <a href="/event-edit/{{ $row->eventid }}" class="btn btn-success">EDIT</a>
                            </td>
                            <td class="text-right">
                                <form action="/event-delete/{{ $row->eventid }}" method="post">
                                    <input type="hidden" name="id">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-danger">DELETE</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection


@section('scripts')

@endsection
