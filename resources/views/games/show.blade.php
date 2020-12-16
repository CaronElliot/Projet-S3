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
<div class="container-full">
    @if(!empty($data))
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12 mx-auto my-3">
                <div class="card shadow-sm">
                    @if(!empty($data->url_media))
                        <img src={{$data->url_media}} alt="" class="card-img-top">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title text-center">{{$data->nom}}</h5>
                        <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item">{{$data->theme->nom}}</li>
                            @if(!empty($data->duree))
                                <li class="list-group-item">{{$data->duree}} minutes</li>
                            @endif
                            @if(!empty($data->nombre_joueurs))
                                <li class="list-group-item">{{$data->nombre_joueurs}} joueurs</li>
                            @endif
                            <a href="{{ route('jeu.regles', ['id' => $data->id]) }}">Règles du jeu</a>
                        </ul>
                    </div>
                        @auth
                    <div class="card-footer">
                        <form action="{{route('jeu.commentaire',['jeu'=>$data->id])}}" method="POST" name="formulaire">
                            Votre note
                            <input type="radio" name="Note" value="1"> 1
                            <input type="radio" name="Note" value="2"> 2
                            <input type="radio" name="Note" value="3"> 3
                            <input type="radio" name="Note" value="4"> 4
                            <input type="radio" name="Note" value="5"> 5 <br>
                            <input type="submit" value="Envoyer">

                            <input
                                class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500'
                                id='grid-text-1' name="commentaire" value="{{ old('commentaire') }}" placeholder='Saisir votre commentaire'>
                        </form>

                    </div>
                        @endauth
                </div>
            </div>
        </div>
</div>
@endif

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>
