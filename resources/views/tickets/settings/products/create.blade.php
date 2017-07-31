@extends('layouts.app')

@section('title', '| Create Products')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1> Add Products</h1>
    <br>

    {{ Form::open(array('url' => 'products')) }}

    <div class="form-group">
        {{ Form::label('product', 'Product') }}
        {{ Form::text('product', '', array('class' => 'form-control')) }}
    </div>
    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection