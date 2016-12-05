<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap linki -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- jquery cdn -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <!-- custom css file -->
    <link rel="stylesheet" href="/css/theme.css" type="text/css">


    <title>Blog - @yield('title')</title>
</head>
<body>
<div class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav_zg">
                <span class=" glyphicon glyphicon-menu-hamburger"></span>
            </button>

            <a href="/" class="navbar-brand">kekec-apps.com</a>
        </div>

        <div class="collapse navbar-collapse" id="nav_zg" >
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/">Domov</a></li>
                <li><a href="{{ route('about') }}">O meni</a></li>
                <li><a href="{{ route('contact') }}">Kontakt - Lokacija </a></li>
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->nickname }}
                            ({{ Auth::user()->roles()->first()->name }})

                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            @if(Auth::user()->roles()->first()->name === 'Admin')
                                <li><a href="{{ route('admin-dashboard') }}">Dashboard</a></li>
                            @endif

                                <li><a href="{{ route('user.logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="page-header text-center">
            <h1> @yield('page-heading')</h1>
             <p>
                 @yield('description')
             </p>
        </div>
    </div>
    <div class="row">
        @yield('content')
    </div>
</div>

</body>
</html>