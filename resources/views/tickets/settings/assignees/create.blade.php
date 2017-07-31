@extends('layouts.app')

@section('title', '| Create Assignees')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1> Add Assignees</h1>
    <br>

    {{ Form::open(array('url' => 'assignees')) }}

    <div class="form-group">
        {{ Form::label('assignee', 'Assignees') }}
        {{ Form::text('assignee', '', array('class' => 'form-control')) }}
    </div>
    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection