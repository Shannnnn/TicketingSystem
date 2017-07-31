@extends('layouts.app')

@section('title', '| Create Descriptions')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1> Add Description</h1>
    <br>

    {{ Form::open(array('url' => 'descriptions')) }}

    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::text('description', '', array('class' => 'form-control')) }}
    </div>
    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection