@extends('layouts.app')

@section('title', '| Help Topics')

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h1>Available Help Topics</h1>

    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle ticketbtn" type="button" data-toggle="dropdown">Ticket Information Settings
      <span class="caret"></span></button>
      <ul class="dropdown-menu">
        <li><a href="{{ route('topics.index') }}">Help Topic</a></li>
        <li><a href="{{ route('departments.index') }}">Department</a></li>
        <li><a href="{{ route('plans.index') }}">SLA Plan</a></li>
        <li><a href="{{ route('priorities.index') }}">Priority Level</a></li>
        <li><a href="{{ route('sources.index') }}">Ticket Source</a></li>
        <li><a href="{{ route('products.index') }}">Products</a></li>
        <li><a href="{{ route('brands.index') }}">Brands</a></li>
        <li><a href="{{ route('descriptions.index') }}">Descriptions</a></li>
      </ul>
    </div>

    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Help Topic</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($help_topics as $help_topic)
                <tr>
                    <td>{{ $help_topic->topic }}</td>
                    <td>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['topics.destroy', $help_topic->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $help_topics->links() }}
    </div>

    <a href="{{ URL::to('topics/create') }}" class="btn btn-success">Add Help Topic</a>

</div>

@endsection

