<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Game Boost</title>
    <meta charset="utf-8">
    <meta name="robots" content="noindex">
    <!-- http://usewing.ml -->
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar sticky-top navbar-light bg-light mb-3">
            @guest
                <a class="navbar-brand" href="{{route('login')}}">Login</a>
            @endguest
                <a class="navbar-brand mx-auto d-block" href="{{route('accueil')}}"><img src="{{url('./images/GAMEBOOST.png')}}" width="120px" class="img-fluid"></a>
            @guest
                <a class="navbar-brand" href="{{route('register')}}">Register</a>
            @endguest
            @auth
                <a class="navbar-brand" href="{{route('profil')}}">Profil</a>
            @endauth

        </nav>
    </header>

    @section('body')
    @show
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/5804eadeb7.js" crossorigin="anonymous"></script>
    <script src="assets/popper.js"></script>
</body>

</html>
