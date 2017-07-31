@extends('layouts.default')

@section('content')

<div class="ui container">
   <div class="ui black segment">
        <div class="ui search">
          <div class="ui icon input">
            <input class="prompt" type="text" placeholder="Search...">
            <i class="search icon"></i>
          </div>
          <div class="results"></div>
        </div>
   </div>
</div>
@endsection

@section('javascript')
<script>
    $(document).ready(function() {
        $('.ui.search').search({
        });
    });
</script>
@endsection

