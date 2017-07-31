@extends('layouts.app')

@section('title', '| Create Current Statuses')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1> Add Current Status</h1>
    <br>

    {{ Form::open(array('url' => 'statuses')) }}

    <div class="form-group">
        {{ Form::label('status', 'Current Status') }}
        {{ Form::text('status', '', array('class' => 'form-control')) }}
    </div>
    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection