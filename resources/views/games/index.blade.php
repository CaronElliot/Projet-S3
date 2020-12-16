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
    <a href="{{ route('jeu.index', ['tri' => 'oui']) }}" class="btn btn-outline-secondary">Trier</a>
    <form action="{{route('jeu.index')}}" method="get" class="mt-6 border-t border-gray-400 pt-4">
        <select name="editeur"
                class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 shadow-inner px-4 py-2 pr-8 rounded">
            <option value="">Choisir un éditeur</option>
            @foreach($editeurs as $editeur)
                <option value="{{$editeur->id}}">{{$editeur->nom}}</option>
            @endforeach
        </select>
        <button
            class="appearance-none bg-gray-200 text-gray-900 px-2 py-1 shadow-sm border border-gray-400 rounded-md mr-3"
            type="submit">Valider
        </button>
    </form>
    <form action="{{route('jeu.index')}}" method="get" class="mt-6 border-t border-gray-400 pt-4">
        <select name="theme"
                class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 shadow-inner px-4 py-2 pr-8 rounded">
            <option value="">Choisir un thème</option>
            @foreach($themes as $theme)
                <option value="{{$theme->id}}">{{$theme->nom}}</option>
            @endforeach
        </select>
        <button
            class="appearance-none bg-gray-200 text-gray-900 px-2 py-1 shadow-sm border border-gray-400 rounded-md mr-3"
            type="submit">Valider
        </button>
    </form>
    <form action="{{route('jeu.index')}}" method="get" class="mt-6 border-t border-gray-400 pt-4">
        <select name="mecanique"
                class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 shadow-inner px-4 py-2 pr-8 rounded">
            <option value="">Choisir une mécanique</option>
            @foreach($mecaniques as $mecanique)
                <option value="{{$mecanique->id}}">{{$mecanique->nom}}</option>
            @endforeach
        </select>
        <button
            class="appearance-none bg-gray-200 text-gray-900 px-2 py-1 shadow-sm border border-gray-400 rounded-md mr-3"
            type="submit">Valider
        </button>
    </form>
    <div class="container">
        @if(!empty($data))
            <div class="row">
                @foreach($data as $s)
                    <div class="col-lg-3 col-md-4 col-sm-12 mx-auto my-3">
                        <div class="card shadow-sm">
                            @if(!empty($s->url_media))
                            <img src={{$s->url_media}} alt="" class="card-img-top">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title text-center">{{$s->nom}}</h5>
                                <ul class="list-group list-group-flush text-center">
                                    <li class="list-group-item">{{$s->theme->nom}}</li>
                                    @if(!empty($s->duree))
                                        <li class="list-group-item">{{$s->duree}} minutes</li>
                                    @endif
                                    @if(!empty($s->nombre_joueurs))
                                        <li class="list-group-item">{{$s->nombre_joueurs}} joueurs</li>
                                    @endif
                                    <li class="list-group-item"><a href="{{ route('jeu.show', ['jeu' => $s->id]) }}" class="btn btn-outline-primary">Voir le jeu</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
