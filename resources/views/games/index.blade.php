@extends('base')

@section('body')
    <div class="container-full">
        <div class="row">
            <div class="col-lg-3 col-sm-12">
                <div class="sticky-top text-center ml-3">
                    <a href="{{ route('jeu.index', ['tri' => 'oui', 'pagination' => $pagination]) }}" class="btn btn-orange-outline rounded-pill mb-3">Trier</a>
                    @auth
                        <a href="{{ route('jeu.create') }}" class="btn btn-orange-outline rounded-pill">Créer un nouveau jeu</a>
                    @endauth
                    <form action="{{route('jeu.index')}}" method="get">
                        <div class="form-group">
                            <select name="editeur"
                                    class="form-control">
                                <option value="">Choisir un éditeur</option>
                                @foreach($editeurs as $editeur)
                                    <option value="{{$editeur->id}}">{{$editeur->nom}}</option>
                                @endforeach
                            </select>
                            <button
                                class="mt-3 btn btn-orange-outline rounded-pill"
                                type="submit">Valider
                            </button>
                        </div>
                    </form>
                    <form action="{{route('jeu.index',['pagination' => $pagination])}}" method="get">
                        <div class="form-group">
                            <select name="theme"
                                    class="form-control">
                                <option value="">Choisir un thème</option>
                                @foreach($themes as $theme)
                                    <option value="{{$theme->id}}">{{$theme->nom}}</option>
                                @endforeach
                            </select>
                            <button
                                class="mt-3 btn btn-orange-outline rounded-pill"
                                type="submit">Valider
                            </button>
                        </div>
                    </form>
                    <form action="{{route('jeu.index')}}" method="get">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <select name="mecanique"
                                        class="form-control">
                                    <option value="">Choisir une mécanique</option>
                                    @foreach($mecaniques as $mecanique)
                                        <option value="{{$mecanique->id}}">{{$mecanique->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <input
                                    class='form-control'
                                    id='grid-text-1' name="nbJoueurs" value="{{ old('nbJoueurs') }}" placeholder='Saisir le nombre de joueurs'
                                >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input
                                    class='form-control'
                                    id='grid-text-1' name="duree" value="{{ old('duree') }}" placeholder="Saisir la durée de jeu"
                                >
                            </div>
                            <div class="form-group col-md-6">
                                <select name="langue"
                                        class="form-control">
                                    <option value="">Choisir une langue</option>
                                    <option value="Fr">Français</option>
                                    <option value="En">Anglais</option>
                                </select>
                            </div>
                        </div>
                        <button
                            class="mt-3 btn btn-orange-outline rounded-pill"
                            type="submit">Valider
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-lg-8 col-sm-12">
                @if(!empty($data))
                    <div class="row">
                        @foreach($data as $s)
                            <div class="col-lg-3 col-md-4 col-sm-12 mx-auto my-3">
                                <div class="card shadow-sm card-welcome">
                                    @if(!empty($s->url_media))
                                        <img src={{$s->url_media}} alt="" class="card-img-top">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title text-center">{{$s->nom}}</h5>
                                        <ul class="list-group list-group-flush text-center">
                                            @if(!empty($s->duree))
                                                <li class="list-group-item">{{$s->duree}} minutes</li>
                                            @endif
                                            @if(!empty($s->nombre_joueurs))
                                                <li class="list-group-item">{{$s->nombre_joueurs}} joueurs</li>
                                            @endif
                                            <li class="list-group-item"><a href="{{ route('jeu.show', ['jeu' => $s->id]) }}" class="btn btn-vert-outline rounded-pill">Voir le jeu</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <div class="text-center mt-3">
            <form action="{{route('jeu.index')}}" method="GET">
                <button type="submit" name="pagination" value="15"
                        class=" bg-white text-red-500 px-2 py-2 rounded-md ">
                    15
                </button>
                <button type="submit" name="pagination" value="20"
                        class=" bg-white text-red-500 px-2 py-2 rounded-md ">
                    20
                </button>
                <button type="submit" name="pagination" value="25"
                        class=" bg-white text-red-500 px-2 py-2 rounded-md ">
                    25
                </button>
                @if($str=="tri")
                    @if($data->currentpage()!=1)
                        <a class="mx-1" href="{{route('jeu.index', ['page' => ($data->currentpage())-1, 'pagination' => $pagination, 'tri' => 'oui'])}}">
                            Précédent
                        </a>
                    @endif
                    @if($data->currentpage()<$data->lastPage())
                        <a class="mx-1" href="{{route('jeu.index', ['page' => ($data->currentpage())+1, 'pagination' => $pagination, 'tri' => 'oui'])}}">
                            Suivant
                        </a>
                    @endif
                @else
                    @if($data->currentpage()!=1)
                        <a class="mx-1" href="{{route('jeu.index', ['page' => ($data->currentpage())-1, 'pagination' => $pagination])}}">
                            Précédent
                        </a>
                    @endif
                    @if($data->currentpage()<$data->lastPage())
                        <a class="mx-1" href="{{route('jeu.index', ['page' => ($data->currentpage())+1, 'pagination' => $pagination])}}">
                            Suivant
                        </a>
                    @endif
                @endif
            </form>
        </div>
    </div>
@endsection
