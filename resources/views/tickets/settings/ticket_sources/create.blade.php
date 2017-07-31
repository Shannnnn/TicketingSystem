@extends('layouts.app')

@section('title', '| Create Ticket Sources')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1> Add Ticket Source</h1>
    <br>

    {{ Form::open(array('url' => 'sources')) }}

    <div class="form-group">
        {{ Form::label('source', 'Ticket Source') }}
        {{ Form::text('source', '', array('class' => 'form-control')) }}
    </div>
    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection