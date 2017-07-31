@extends('layouts.app')

@section('title', '| Create Priority Levels')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1> Add Priority Level</h1>
    <br>

    {{ Form::open(array('url' => 'priorities')) }}

    <div class="form-group">
        {{ Form::label('priority', 'Priorities') }}
        {{ Form::text('priority', '', array('class' => 'form-control')) }}
    </div>
    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection