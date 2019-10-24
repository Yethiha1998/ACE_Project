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

      <form action="/create_event" method="POST">
            <div class="modal-body">
                {{ csrf_field()}}
                <div class="form-group">
                    <label for="ticket_type" class="col-form-label">Choose ticket type</label>
                        <select name="ticket_type" class="form-control">
                            <option value="Early Bird">Early Bird</option>
                            <option value="VIP">VIP</option>
                            <option value="VVIP">Customer</option>
                        </select>
                </div>

                <div class="form-group">
                    <label for="price" class="col-form-label">Price:</label>
                    <input type="text" name="price" class="form-control" id="price">
                </div>

                <?php
                    if($row->event_id=='1'){
                        echo "-Admin";
                    }
                    elseif($row->event_id=='2'){
                        echo "-Organizer";
                    }
                    else{
                        echo "-Customer";
                    }
                ?>
                
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
                        <thead class=" text-primary">
                            <th>ID</th>
                            <th>Event Name</th>
                            <th>Time</th>
                            <th>Date</th>
                            <th class="text-right">EDIT</th>
                            <th class="text-right">DELETE</th>
                            </thead>
                    <tbody>
                   
                        <tr>
                            <td>BBB</td>
                            <td>Niger</td>
                            <td>Oud-Turnhout</td>
                            <td class="text-right">$36,738</td>
                            <td class="text-right">
                                <a href="#" class="btn btn-success">EDIT</a>
                            </td>
                            <td class="text-right">
                                <form action="#" method="post">
                                    <input type="hidden" name="id">
                                        
                                    <button type="submit" class="btn btn-danger">DELETE</button>
                                </form>
                            </td>
                        </tr>
                    
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

