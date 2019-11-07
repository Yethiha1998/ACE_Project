@include('layouts.frontend.header')
@include('layouts.frontend.slider')
<br>
<br>
<div class="container">
	<div class="row">

		@foreach ($events as $event)

		<div class="col-sm-4">
			<div class="thumbnail">
				<img src="/images/{{$event->image}}" style="height:250px; width:100%">
				<div class="caption">
					<table style="width:100%">
						<tr >
							<th>Event Name</th>
							<th>Event Time</th>
							<th>Event Date</th>
						</tr>
						<tr>
							<td>{{ $event->event_name }}</td>
							<td>{{ $event->time }}</td>
							<td>{{ $event->date }}</td>
						</tr>
					</table>				
					<p style="text-align:center"><a href="/login" class="btn btn-success" style="width:100%">Book Now</a></p>
				</div>
			</div>
		</div>
		
		@endforeach

		
	</div>
</div>


</body>
<script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</html>
@include('layouts.frontend.footer')