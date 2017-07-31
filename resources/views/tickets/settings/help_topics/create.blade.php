@extends('layouts.app')

@section('title', '| Create Help Topics')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1> Add Help Topic</h1>
    <br>

    {{ Form::open(array('url' => 'topics')) }}

    <div class="form-group">
        {{ Form::label('topic', 'Help Topic') }}
        {{ Form::text('topic', '', array('class' => 'form-control')) }}
    </div>
    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection