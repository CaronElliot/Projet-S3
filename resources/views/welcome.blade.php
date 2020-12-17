@extends('base')

@section('body')
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            </div>
        @endif
    </div>
    <div class="text-center mb-3">
        <a class="btn btn-outline-warning rounded-pill" href="{{route('test')}}">Carte des jeux</a>
        <a class="btn btn-outline-warning rounded-pill" href="{{url('/jeu')}}">Liste des jeux</a>
        @auth
            <a class="btn btn-outline-warning rounded-pill" href="{{route('accueil')}}">Choix de 5 jeux aléatoires</a>
    </div>
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
@endsection
