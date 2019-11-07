@extends('layouts.master')


@section('title')
    Dashboard | Festivilla
@endsection



@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Events Information</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>Event_Name</th>
                            <th>Time</th>
                            <th>Date</th>
                            <th class="text-right">Image</th>
                            </thead>
                    <tbody>
                    @foreach ($event as $row)
                        <tr>
                            <td>{{ $row->event_name }}</td>
                            <td>{{ $row->time }}</td>
                            <td>{{ $row->date }}</td>
                            <td class="text-right"> 
                                <img class="img-responsive" src="/images/{{$row->image}}" width="200px" height="180px">
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
