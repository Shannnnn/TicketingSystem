@extends('layouts.app')

@section('title', '| Current Statuses')

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h1>Available Current Statuses</h1>

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
                    <th>Current Status</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($statuses as $status)
                <tr>
                    <td>{{ $status->status }}</td>
                    <td>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['statuses.destroy', $status->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $statuses->links() }}
    </div>

    <a href="{{ URL::to('statuses/create') }}" class="btn btn-success">Add Department</a>

</div>

@endsection

