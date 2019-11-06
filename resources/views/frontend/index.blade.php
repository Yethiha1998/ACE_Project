@extends('layouts.master')


@section('title')
    Dashboard | Festivilla
@endsection



@section('content')

<div class="breadcrumbs">
          

<div class="content mt-3">
            <div class="animated fadeIn">

				<div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Booking List</strong>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">

                  <?php 
                    $loginUser = Auth::user();
                    if($loginUser->role == 2){
                    ?>

                      <tr>
                          <th>User Name</th>
					  	<th>Event Name</th>
                        <th>Ticket Type</th>
                        <th>Ticket Fees</th>
						<th>Registered at</th>
						<th>Updated at</th>
						<!-- <th>Action</th> -->
                      </tr>
                    <tbody>
					
					@foreach ($booking as $booking)
                      <tr>
                          <td>{{ $booking->username }}</td>
                        <td>{{$booking->event_name}}</td>
						<td>{{ $booking->ticket_type }}</td>
						<td>{{ $booking->fees }}</td>
						<td>{{ $booking->created_at }}</td>
						<td>{{ $booking->updated_at }}</td>
						<!-- <td><a class="btn btn-danger" onclick="return myFunction1();" href='#'>Delete</a></td> -->
					  </tr>
					  @endforeach

                    </tbody>
                    <?php }
                    else {
                        ?>

                    <thead>
                      <tr>
					  	<th>User Name</th>
                        <th>Event Name</th>
                        <th>Ticket Type</th>
						<th>Ticket Fees</th>
						<th>Registered at</th>
                      </tr>
                    </thead>
                    <tbody>
					
					@foreach ($booking as $booking)
                      <tr>
                          <td>{{ $booking->username }}</td>
						<td>{{ $booking->event_name }}</td>
                        <td>{{ $booking->ticket_type }}</td>
                        <td>{{$booking->fees}}</td>
						<td>{{ $booking->created_at }}</td>
					  </tr>
					  @endforeach

                    </tbody>

                    <?php
                    }
                    ?>

                  </table>
                        </div>
                    </div>
				</div>
				
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->



<script>
function myFunction() {
    if(!confirm("Are You Sure to update this ?"))
    event.preventDefault();
}

function myFunction1() {
    if(!confirm("Are You Sure to delete this ?"))
    event.preventDefault();
}
</script>

@endsection


@section('scripts')

@endsection
