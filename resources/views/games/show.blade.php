@extends('base')

@section('body')
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
                </div>
            </div>
        </div>
    @endif
</div>

<div class="container">

</div>
@endsection
