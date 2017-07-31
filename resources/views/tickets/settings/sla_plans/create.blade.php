@extends('layouts.app')

@section('title', '| Create SLA Plans')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1> Add SLA Plan</h1>
    <br>

    {{ Form::open(array('url' => 'plans')) }}

    <div class="form-group">
        {{ Form::label('sla_plan', 'SLA Plan') }}
        {{ Form::text('sla_plan', '', array('class' => 'form-control')) }}
    </div>
    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection