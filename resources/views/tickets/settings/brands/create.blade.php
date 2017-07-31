@extends('layouts.app')

@section('title', '| Create Brands')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1> Add Brands</h1>
    <br>

    {{ Form::open(array('url' => 'brands')) }}

    <div class="form-group">
        {{ Form::label('brand', 'Brand') }}
        {{ Form::text('brand', '', array('class' => 'form-control')) }}
    </div>
    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection