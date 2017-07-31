@extends('layouts.app')

@section('title', '| Create Departments')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1> Add Department</h1>
    <br>

    {{ Form::open(array('url' => 'departments')) }}

    <div class="form-group">
        {{ Form::label('department', 'Department') }}
        {{ Form::text('department', '', array('class' => 'form-control')) }}
    </div>
    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection