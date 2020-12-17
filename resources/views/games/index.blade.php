@extends('base')

@section('body')
    <a href="{{ route('jeu.index', ['tri' => 'oui', 'pagination' => $pagination]) }}" class="btn btn-outline-secondary">Trier</a>
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
    <form action="{{route('jeu.index',['pagination' => $pagination])}}" method="get" class="mt-6 border-t border-gray-400 pt-4">
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
        <input
            class='appearance-none block w-full bg-white text-gray-600 border border-gray-400 shadow-inner rounded-md py-2 px-4 leading-tight focus:outline-none  focus:border-gray-500'
            id='grid-text-1' name="nbJoueurs" value="{{ old('nbJoueurs') }}" placeholder='Saisir le nombre de joueurs'
            >
        <input
            class='appearance-none block w-full bg-white text-gray-600 border border-gray-400 shadow-inner rounded-md py-2 px-4 pr-0 leading-tight focus:outline-none  focus:border-gray-500'
            id='grid-text-1' name="duree" value="{{ old('duree') }}" placeholder="Saisir la durée de jeu"
        >
        <select name="langue"
                class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 shadow-inner px-4 py-2 pr-8 rounded">
            <option value="">Choisir une langue</option>
            <option value="Fr">Français</option>
            <option value="En">Anglais</option>
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
                <div>
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
        @endif
    </div>
@endsection
