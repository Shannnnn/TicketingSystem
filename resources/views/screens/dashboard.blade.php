@extends('layouts.default')

@section('content')
    @if($tickets_count)

      <div class="container" style="margin: 60px;">
        <div class="ui three stackable cards">
          <div class="card" style="background-color: #f5f5f5;border-color: #ddd;">
             <div style="margin: 10px;">
                <h2><i class="ticket icon"></i>Tickets</h2>
             </div>
             <div style="margin-left: 300px;">
                <h1>{{ $tickets_count }}</h1>
             </div>
          </div>
          <div class="card" style="background-color: #f2dede;border-color: #ebccd1;color: #a94442;">
             <div style="margin: 10px;">
                <h2><i class="configure icon"></i>Open</h2>
             </div>
             <div style="margin-left: 300px;margin-bottom: 10px;">
                 <h1>{{ $open_tickets_count }}</h1>
             </div>
          </div>
          <div class="card" style="background-color: #dff0d8;border-color: #d6e9c6;color: #3c763d;">
             <div style="margin: 10px;">
                <h2><i class="thumbs outline up icon"></i>Closed</h2>
             </div>
             <div style="margin-left: 300px;">
                <h1>{{ $closed_tickets_count }}</h1>
             </div>
          </div>
        </div>
      </div>

      <div class="container" style="margin: 20px;">
        <div class="ui stackable three column grid">
          <div class="ten wide column">
            <div class="ui black segment"></div>
          </div>
          <div class="column">
            <div class="ui top attached tabular menu">
              <a class="item active" data-tab="first">Topics</a>
              <a class="item" data-tab="second">Agents</a>
              <a class="item" data-tab="third">Clients</a>
            </div>
            <div class="ui bottom attached tab segment active" style="font-size: 0.6rem;" data-tab="first">
                <div class="ui massive vertical menu">
                  <a href="#" class="item disabled">
                    <span>Topic <div class="ui label">Total</div></span>
                       <div class="ui teal label">
                          Open / Closed
                       </div>
                  </a>

                  @foreach($topics as $topic)
                  <a class="active teal item">
                    <span>{{ $topic->topic }} <div class="ui label">{{ $tickets->where('help_topic',$topic->topic)->count() }}</div></span>
                       <div class="ui teal label">
                                {{ $tickets->where('help_topic',$topic->topic)->where('ticket_status', 'Open')->count() }} /
                                {{ $tickets->where('help_topic',$topic->topic)->where('ticket_status', 'Closed')->count() }}
                       </div>
                  </a>
                  @endforeach
                </div>
            </div>
            <div class="ui bottom attached tab segment" style="font-size: 0.6rem;" data-tab="second">
                <div class="ui massive vertical menu">
                  <a href="#" class="item disabled">
                    <span>Agent <div class="ui label">Total</div></span>
                       <div class="ui teal label">
                          Open / Closed
                       </div>
                  </a>

                  @foreach($agents as $agent)
                  <a class="active teal item">
                    <span>{{ $agent->name }} <div class="ui label">{{ $tickets->where('assigned_to',$agent->name)->count() }}</div></span>
                       <div class="ui teal label">
                                {{ $tickets->where('assigned_to',$agent->name)->where('ticket_status', 'Open')->count() }} /
                                {{ $tickets->where('assigned_to',$agent->name)->where('ticket_status', 'Closed')->count() }}
                       </div>
                  </a>
                  @endforeach
                </div>
            </div>
            <div class="ui bottom attached tab segment" style="font-size: 0.6rem;" data-tab="third">
                <div class="ui massive vertical menu">
                  <a href="#" class="item disabled">
                    <span>Client <div class="ui label">Total</div></span>
                       <div class="ui teal label">
                          Open / Closed
                       </div>
                  </a>

                  @foreach($clients as $client)
                  <a class="active teal item">
                    <span>{{ $client->company_name }} - {{ $client->branch }} <div class="ui label">{{ $tickets->where('client_id',$client->id)->count() }}</div></span>
                       <div class="ui teal label">
                                {{ $tickets->where('client_id',$client->id)->where('ticket_status', 'Open')->count() }} /
                                {{ $tickets->where('client_id',$client->id)->where('ticket_status', 'Closed')->count() }}
                       </div>
                  </a>
                  @endforeach
                </div>
            </div>
          </div>
        </div>
      </div>

    <!--  <div class="container" style="margin: 20px;">
        <div class="ui stackable three column grid">
          <div class="column">
            <div class="ui black segment">Topic</div>
          </div>
          <div class="column">
            <div class="ui black segment">Agent</div>
          </div>
          <div class="column"></div>
        </div>
      </div> -->
    @else
        <div class="well text-center">
            No records
        </div>
    @endif
@endsection

@section('javascript')
<script>
    $(document).ready(function() {
        $('.menu .item').tab();
    });
</script>
@endsection
