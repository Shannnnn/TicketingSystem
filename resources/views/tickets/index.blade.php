@extends('layouts.default')

@section('content')
<div class="ui container">
    <div class="ui four item menu">
      <a class="item active" href="{{ url('/tickets') }}">All Tickets</a>
      <a class="item" href="{{ url('/open-tickets') }}">Active Tickets</a>
      <a class="item" href="{{ url('/closed-tickets') }}">Closed Tickets</a>
      <a class="item" href="{{ url('/my-tickets') }}">My Tickets</a>
    </div>

    <button class="ui blue button create-ticket">Create Ticket</button>

    <div class="ui huge header">Ticket Management</div>
    <table id="ticket-table" class="ui celled table" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Ticket Topic</th>
                <th>Company</th>
                <th>Ticket Subject</th>
                <th>Ticket Status</th>
                <th>Date created</th>
                <th>Priority</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>
@endsection
@section('javascript')
<script src="{{ asset('js/api-calls.js') }}"></script>
<script>
    $(document).ready(function() {
        let getDescription = function (data, type, dataToSet) {
           return data.product + " - " + data.description;
        }

        let getClient = function (data, type, dataToSet) {
           return data.company_name + " - " + data.branch;
        }

        let ticketTable = $('#ticket-table').DataTable({
            "ajax": "api/tickets",
            "columns": [
                { "data": "id" },
                { "data": "help_topic" },
                { "data": getClient },
                { "data": getDescription },
                { "data": "ticket_status" },
                { "data": "created_at" },
                { "data": "priority" },
                {
                    "targets": -1,
                    "data": null,
                    "defaultContent": "<button class='ui blue button show-action'>Show</button>"
                }
            ],
            "order": [[ 6, "asc" ]]
        });

        $(".create-ticket").click(function() {
            window.location.href = "{{url('create-tickets')}}";
        });

        $("#ticket-table").on('click', '.show-action', function () {
            let data = ticketTable.row($(this).parents('tr')).data();
                window.location.href = "tickets/"+ data.id +"";
        });
    });
</script>
@endsection