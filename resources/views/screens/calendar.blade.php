@extends('layouts.default')

@section('content')

    <div id='calendar' style="margin: 50px;"></div>

@endsection

@section('javascript')

<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            events : [
                @foreach($tickets as $ticket)
                {
                    title : '{{ $ticket->product }} - {{ $ticket->description }}',
                    start : '{{ $ticket->scheduled_date }}'
                },
                @endforeach
            ]
        })
    });
</script>

@endsection
