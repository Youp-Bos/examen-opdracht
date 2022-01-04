<!DOCTYPE html>
<html lang="en">
<head>
    <title>Excellent Taste</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand">Navigatie menu</a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href='{!! url('/reservering'); !!}'>Reseveringen</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Bestellingen
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href='{!! url('/bestelling'); !!}'>Bestelling overzicht</a>
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link " href="{{ url('/menu') }}">Menukaart overzicht</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link " href="{{ url('/logout') }}">Log uit</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    @yield('main')
</div>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>
