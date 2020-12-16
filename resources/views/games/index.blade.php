@extends('base')

@section('body')
    <a href="{{ route('jeu.index', ['tri' => 'oui']) }}" class="btn btn-outline-secondary">Trier</a>
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
@endsection
