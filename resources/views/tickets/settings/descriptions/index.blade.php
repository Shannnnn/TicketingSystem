@extends('layouts.app')

@section('title', '| Description')

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h1>Available Description</h1>

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
                    <th>Description</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($descriptions as $description)
                <tr>
                    <td>{{ $description->description }}</td>
                    <td>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['descriptions.destroy', $description->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $descriptions->links() }}
    </div>

    <a href="{{ URL::to('descriptions/create') }}" class="btn btn-success">Add Description</a>

</div>

@endsection

