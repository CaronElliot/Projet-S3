<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

</head>
<body class="antialiased">
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif
</div>

<a href="{{route('test')}}">Carte des jeux</a>

@auth
<a href="{{route('accueil')}}">Choix de 5 jeux aléatoires</a>


@if(!empty($data))
    <div class="container">
        <div class="row d-flex justify-content-around">
            @foreach($data as $jeu)
                <div class="col-lg-4 col-md-6 col-sm-12 my-3 shadow">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            {{$jeu->nom}}
                        </li>
                        <li class="list-group-item">
                            {{$jeu->editeur->nom}}
                        </li>
                        <li class="list-group-item">
                            {{$jeu->description}}
                        </li>
                        <li class="list-group-item">
                            {{$jeu->theme->nom}}
                        </li>
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
@else
    <h1>marche pas</h1>
@endif
@endauth
</body>
</html>
