@extends('layouts.master')


@section('title')
    Tickets | Festivilla
@endsection



@section('content')


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create tickets</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="/create_ticket" method="POST">
            <div class="modal-body">
                {{ csrf_field()}}
                
                <div class="form-group">
                    <label for="eventid" class="col-form-label">Choose event:</label>
                        <select name="eventid" class="form-control">
                            @foreach($eventquery as $row)
                            <option value="<?php echo $row->eventid; ?>">{{ $row->event_name }}</option>
                            {{ $row->eventid }}
                            @endforeach
                        </select>
                </div>                


                <div class="form-group">
                    <label for="ticket_type" class="col-form-label">Choose ticket type</label>
                        <select name="ticket_type" class="form-control">
                            <option value="Regular">Regular</option>
                            <option value="VIP">VIP</option>
                            <option value="VVIP">VVIP</option>
                        </select>
                </div>

                <div class="form-group">
                    <label for="price" class="col-form-label">Price:</label>
                    <input type="text" name="price" class="form-control" id="price">
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
                <h4 class="card-title">Ticket
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
                        <thead class=" text-primary">
                            <th>ID</th>
                            <th>Event ID</th>
                            <th>Ticket Type</th>
                            <th>Price</th>
                            <th class="text-right">EDIT</th>
                            <th class="text-right">DELETE</th>
                            </thead>
                    <tbody>
                    
                    @foreach ($ticket as $row)    
                        <tr>
                            <td>{{ $row->ticketid}}</td>    
                            <td>{{ $row->eventid}}</td>
                            <td>{{ $row->ticket_type }}</td>
                            <td>{{ $row->price }}</td>
                            <td class="text-right">
                               <a href="/ticket-edit/{{ $row->ticketid }}" class="btn btn-success">EDIT</a>
                            </td>
                            <td class="text-right">
                                <form action="/ticket-delete/{{ $row->ticketid }}" method="post">
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

