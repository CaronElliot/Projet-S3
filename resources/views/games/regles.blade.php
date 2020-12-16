@extends('base')

@section('body')
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
@endsection
