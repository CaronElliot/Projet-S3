@extends('base')

@section('body')
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            </div>
        @endif
    </div>
    <h1 class="text-center">Game Boost</h1>
    <br/>
        <div class="text-center mb-3">
            <ul class="nav nav-pills nav-fill">
                <li class="nav-item ml-3">
                    <a class="nav-link bg-warning rounded"  href="{{url('/jeu')}}">Liste des jeux</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-warning rounded " href="{{route('test')}}">Carte des jeux</a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link bg-warning rounded" href="{{route('accueil',['triggermeilleurs'=>'oui'])}}">Affichage des 5 meilleurs jeux</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-warning rounded" href="{{route('accueil')}}">Choix de 5 jeux aléatoires</a>
                </li>
                @endauth
            </ul>
            <hr class="my-5"/>
            @auth
                @if(!empty($meilleursJeux))
                    <div class="container">
                        <div class="row d-flex justify-content-around">
                            @foreach($meilleursJeux as $jeu)
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
                </div>
            @endif

            @if(!empty($data) and empty($meilleursJeux))

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
            @endif
            <hr class="my-5"/>
        @endauth
    <footer class="text-center mb-5">
        <h2>Contacter les créateurs</h2>
        <br/>
        <br/>
        <div class="container-fluid text-center">
            <div class="row offset-lg-2">
                <div class="col-lg-2 col-mg-12">
                    <a href="mailto:marc_bayart@ens.univ-artois.fr"><h5 class="text-success">Marc Bayart</h5></a>
                </div>
                <div class="col-lg-2 col-mg-12">
                    <a href="mailto:romain_dieu@ens.univ-artois.fr"><h5 class="text-success">Romain Dieu</h5></a>
                </div>
                <div class="col-lg-2 col-mg-12">
                    <a href="mailto:julien_dégardin@ens.univ-artois.fr"><h5 class="text-success">Julien Dégardin</h5></a>
                </div>
                <div class="col-lg-2 col-mg-12">
                    <a href="mailto:thomas_blondel@ens.univ-artois.fr"><h5 class="text-success">Thomas Blondel</h5></a>
                </div>
                <div class="col-lg-2 col-mg-12">
                    <a href="mailto:elliot_caron@ens.univ-artois.fr"><h5 class="text-success">Elliot Caron</h5></a>
                </div>
            </div>
        </div>
    </footer>
@endsection
