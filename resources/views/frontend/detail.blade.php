@include('layouts.frontend.header')

<div>
    <table style="width:100%" border="1px">
        <tr>
            <th>Event-Name</th>
            <th>Event-Date</th>     
        <tr>
        <tr>
            <td>{{ $event->event_name }}</td>
            <td>{{ $event->date }}</td> 
				    
        <tr>
    </table>
</div>
