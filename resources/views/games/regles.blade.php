<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Marathon du Web 2020- IUT de Lens</title>
    <meta charset="utf-8">
    <meta name="robots" content="noindex">
    <!-- http://usewing.ml -->
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
</head>

<body>
    @if(!empty($jeu))
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12 mx-auto my-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{$jeu->nom}}</h5>
                        <hr>
                        <p>
                            @if(!empty($jeu->regles))
                                {{$jeu->regles}}
                            @endif
                        </p>
                        <hr>
                        <a href="{{route('jeu.show' , ['jeu' => $jeu->id])}}">Retour au détails du jeu</a>
                        <br>
                        <a href="{{route('jeu.index')}}">Vers la liste des jeux</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</body>

</html>
