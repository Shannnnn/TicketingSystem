@extends('layouts.default')

@section('content')
<div class="ui container">
    <div class="ui black segment">
        <div class="ui three column grid">
          <div class="two column row">
            <div class="column">
                <div class="ui huge header">{{ $ticket->product }} - {{ $ticket->description }} - {{ $client->branch }}</div>
                #{{ $ticket->help_topic }} - {{ $ticket->id }}
            </div>
            <div class="right floated left aligned two wide column">
                <div class="ui small basic icon buttons">
                    <button class="ui button"><i class="edit icon"></i></button>
                    <button class="ui button" onClick="window.print()"><i class="print icon"></i></button>
                </div>
            </div>
          </div>

            <div class="twelve wide column">
                @if ($ticket->ticket_status === 'Open')
                     <button class="positive ui small button">{{ $ticket->ticket_status }}</button>
                @else
                     <button class="negative ui small button">{{ $ticket->ticket_status }}</button>
                @endif

                @foreach($tags as $tag)
                <a class="ui teal tag label">{{ $tag->tag }}</a>
                @endforeach
            </div>

            <div class="right floated left aligned four wide column date">
                <label id="date_created">Date created: {{ $ticket->created_at }}</label>
                <br><label id="date_updated">Date updated: {{ $ticket->updated_at }}</label>
            </div>
        </div>
    </div>


    <div class="ui black horizontal segments">
      <div class="ui segment">
        <h3 class="ui dividing header">User Information</h3>
        <div class="ui form">
            <div class="field">
                <h5 class="large text">Company: </h5> {{ $client->company_name }}
            </div>
            <div class="field">
                <h5>Branch: </h5> {{ $client->branch }}
            </div>
            <div class="field">
                <h5>Address: </h5> {{ $client->address }}
            </div>
        </div>
      </div>

      <div class="ui segment">
        <h3 class="ui dividing header">Contacts</h3>
        <table class="ui very basic collapsing celled table">
          <thead>
            <tr><th>Contact</th>
            <th>Contact Info</th>
          </tr></thead>
          @foreach($contacts as $contact)
          <tbody>
            <tr>
              <td>
                <h4 class="ui image header">
                  <div class="content">
                    {{ $contact->contact_name }}
                    <div class="sub header">{{ $contact->label }}</div>
                </div>
              </h4></td>
              <td>
                {{ $contact->contact_number }}
                <div class="sub header">{{ $contact->email }}</div>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>

        <!-- <button class="ui yellow small button" id="add_contact">Add Contact</button> -->
      </div>

      <div class="ui segment assigning">
        <h3 class="ui dividing header">Assign Ticket</h3>
        @if ($ticket->ticket_status === 'Open')
        <select class="ui search dropdown assign" id="assign" name="assign">
            <option value="" disabled="true" selected="true">Select Assignee</option>
            @foreach($assignees as $assignee)
                <option value="{{$assignee->name}}">{{$assignee->name}}</option>
            @endforeach
        </select>

        <button class="ui teal button" disabled="true" id="assign_ticket">Assign</button><br><br>
        @endif

        <div class="field">
            <h5>Assigned to:</h5>
            {{ $ticket-> assigned_to}}
        </div>

      <!--  @if ($ticket->ticket_status === 'Open')
        <h3 class="ui dividing header close">Close Ticket</h3>
            <button class="negative ui small button" id="change_status">Close Ticket</button>
        @endif -->
      </div>
    </div>

    <div class="ui olive segment">
      <h3 class="ui dividing header">Ticket Information</h3>
      <div class="ui form">
          <div class="field">
            <label class="large text">Ticket Source: </label> {{ $ticket->ticket_source }}
          </div>
          <div class="field">
            <label class="large text">Department: </label> {{ $ticket->department }}
          </div>
          <div class="field">
            <label class="large text">SLA Plan: </label> {{ $ticket->sla_plan }}
          </div>
          <div class="field">
            <label class="large text">Scheduled Date: </label> {{ $ticket->scheduled_date }}
          </div>

      <h3 class="ui dividing header">Ticket Details</h3>
          <div class="field">
            <label class="large text">Products(with problem/s): </label> {{ $ticket->product }}
          </div>
          <div class="field">
            <label class="large text">Brand: </label> {{ $ticket->brand }}
          </div>
          <div class="field">
            <label class="large text">Problem Description: </label> {{ $ticket->description }}
          </div>
          <div class="field">
            <label class="large text">Product Summary: </label> {{ $ticket->product_summary }}
          </div>
          <div class="field">
            <label class="large text">Turn Over Date: </label> {{ $ticket->turn_over_date }}
          </div>
          <div class="field">
            <label class="large text">Warranty: </label> {{ $ticket->warranty }}
          </div>
          <div class="field">
            <label class="large text">Priority: </label> {{ $ticket->priority }}
          </div>

      </div>
    </div>

    <div class="ui comments">
      <h3 class="ui dividing header">Ticket Thread</h3>

          <div class="comment">
            <div class="content">
              <a class="author">{{ $user -> name }}</a>
              <div class="metadata">
                <div class="date"> {{ $ticket -> created_at }}</div>
              </div>
              <div class="text">
                {{ $ticket -> remarks }}
              </div><hr>

              @foreach($comments as $comment)
              <a class="author">{{ $comment->user->name }}</a>
              <div class="metadata">
                <div class="date"> {{ $comment -> created_at }}</div>
              </div>
              <div class="text">
                {{ $comment->comment }}
              </div><hr>
              @endforeach

              <form action="{{ url('comment') }}" method="POST" class="ui reply form">

                <input type="hidden" name="ticket_id" id="ticket_id" class="ticket_id" value="{{ $ticket->id }}">

                <div class="field">
                  <textarea id="comment" name="comment"></textarea>
                </div>
                <button type="submit" class="ui primary submit labeled icon button reply">
                  <i class="icon edit"></i> Add Reply
                </button>
              </form>
            </div>
          </div>
    </div><br>
</div>


    @component('components/prompt')
    @slot('title')
        Title
    @endslot
    @slot('actions')
        <div class="ui green ok button prompt-yes">
            <i class="checkmark icon"></i>
            Yes
        </div>
        <div class="ui red cancel button prompt-no">
            <i class="remove icon"></i>
            No
        </div>
    @endslot

    Message
    @endcomponent

@endsection

@section('javascript')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="{{ asset('js/api-calls.js') }}"></script>
<script type="text/javascript">
                $(document).ready(function(){
                    $("#change_status").click(function(){
                          var id = $('#ticket_id').val();

                          $.get('api/' + id, function(data) {
                              showPrompt("Close Ticket",
                              "Close ticket?",
                              function() {
                                    closeTicket(data.id, function() {
                                        window.location.reload();
                                    });
                              });
                          });
                    });

                    $('#assign').change(function(){
                        if($(this).val() === "")
                            $('#assign_ticket').attr('disabled', true);
                        else
                            $('#assign_ticket').attr('disabled', false);
                    });

                    $("#assign_ticket").click(function(){
                          var id = $('#ticket_id').val();
                          var agent = $('#assign').val();

                          $.get('api/' + id + '/' + agent, function(data) {
                             console.log(data.assigned_to);
                             window.location.reload();
                          });
                    });

                    $('input[name="scheduled_date"]').daterangepicker({
                        singleDatePicker: true,
                        showDropdowns: true
                    });

                });
</script>