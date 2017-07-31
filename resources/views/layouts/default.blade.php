<!DOCTYPE html>
    <html lang="{{ config('app.locale') }}">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <!-- CSRF Token -->
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <title>{{ config('app.name', 'Laravel') }}</title>

            <!-- Styles -->
            <link href="{{ asset('css/semantic.min.css') }}" rel="stylesheet">
            <link href="{{ asset('css/print.css') }}" rel="stylesheet">
            <link href="{{ asset('css/datatables.semantic.min.css') }}" rel="stylesheet">
            <link href="{{ asset('css/style.css') }}" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

            <!-- Scripts -->
            <script>
                window.Laravel = {!! json_encode([
                    'csrfToken' => csrf_token(),
                ]) !!};
            </script>
        </head>
        <body>
            <div id="app">
                <div class="ui menu layout">
                    <div class="header item">{{ config('app.name') }}</div>
                    @if (Auth::guest())
                        <a href="{{ url('/knowledgebase') }}" class="item">Knowledgebase</a>
                    @else
                        <a href="{{ url('/dashboard') }}" class="item">Home</a>
                        <a href="{{ url('/clients') }}" class="item">Client</a>
                        <a href="{{ url('/tickets') }}" class="item">Ticket</a>
                        <!-- <a href="{{ url('/calendar') }}" class="item">Schedules</a> -->
                        <a href="{{ url('/knowledgebase') }}" class="item">Knowledgebase</a>
                    @endif

                    <div class="right menu">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <a href="{{ route('login') }}" class="item">Login</a>
                        @else
                            <div class="ui dropdown item">
                                {{ Auth::user()->name }} <i class="dropdown icon"></i>
                                <div class="menu">
                                    @role('Admin') {{-- Laravel-permission blade helper --}}
                                        <a href="{{ route('users.index') }}" class="item"><i class="fa fa-btn fa-unlock"></i>Admin</a>
                                    @endrole
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();"
                                        class="item">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>


                @if(Session::has('flash_message'))
                    <div class="container">
                        <div class="alert alert-success"><em> {!! session('flash_message') !!}</em>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        @include ('errors.list') {{-- Including error file --}}
                    </div>
                </div>

                @yield('content')

            </div>

            <!-- Scripts -->
            <script src="{{ asset('js/jquery.min.js') }}"></script>
            <script src="{{ asset('js/datatables.min.js') }}"></script>
            <script src="{{ asset('js/semantic.min.js') }}"></script>
            <script src="{{ asset('js/datatables.semantic.min.js') }}"></script>
            <script src="{{ asset('js/common.js') }}"></script>

            <!-- Include Required Prerequisites -->
            <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

            <!-- Include Date Range Picker -->
            <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>

            <script type="text/javascript">
                $(document).ready(function(){
                    $('.ui.dropdown').dropdown();
                });
            </script>

            <!-- <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script> -->

            @yield('javascript')
        </body>
    </html>