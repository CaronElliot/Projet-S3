@extends('base')

@section('body')
    <body>
    <div class="container-full">
        <div class="row">
            <div class="col-lg-3 col-sm-12">
                <div class="profil-div d-flex justify-content-center flex-column align-items-center ml-3 py-3">
                    <p class="lead">Pseudonyme : {{$user->name}}</p>
                    <p class="lead">Adresse e-mail : {{$user->email}}</p>
                    <a class="btn btn-orange-outline rounded-pill"
                       href="{{route('logout')}}">Logout</a>
                </div>
            </div>
            <div class="col-lg-8 col-sm-12">
                @if(!empty($jeuxUser))
                    <div class="row card-deck">
                        @foreach($jeuxUser as $s)
                            <div class="col-lg-3 col-md-4 col-sm-12 mx-auto mb-2 d-flex align-items-stretch">
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
                                            <li class="list-group-item"><a
                                                    href="{{ route('jeu.show', ['jeu' => $s->id]) }}"
                                                    class="btn btn-vert-outline rounded-pill">Voir le jeu</a></li>
                                            <li class="list-group-item">
                                                <div class="flex items-center justify-end mt-4 top-auto">
                                                    <form action="{{route('supprimerAchat',['jeu' => $s->id])}}"
                                                          method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" name="delete" value="valide"
                                                                class="btn btn-orange-outline rounded-pill">
                                                            Supprimer le jeu de votre collection
                                                        </button>
                                                    </form>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-lg-3 col-md-4 col-sm-12 mx-auto mb-2 d-flex align-items-stretch">
                            <div class="card shadow-sm">
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <button type="button" class="btn btn-vert-outline rounded-pill" data-toggle="modal"
                                            data-target="#modalAjout">
                                        <li class="fas fa-plus"></li>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="modal fade" id="modalAjout" tabindex="-1" role="dialog" aria-labelledby="modalAjout"
             aria-hidden="true">
            <div class="modal-dialog text-center" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAjoutTitre">Ajouter un jeu à votre collection</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('ajouterAchat')}}" method="POST" name="formulaireAjoutAchat">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label class='lead'>Ajouter un
                                        jeu</label>
                                    <select name="jeu" value="{{ old('jeu') }}"
                                            class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 shadow-inner px-4 py-2 pr-8 rounded">
                                        <option>Choisir le jeu à ajouter</option>
                                        @foreach($jeux as $j)
                                            <option value="{{$j->id}}"
                                                    @if($j == old('j')) selected @endif>{{$j->nom}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label class='lead'
                                           for='grid-text-1'>Date d'achat</label>
                                    <input
                                        class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500'
                                        id='grid-text-1' name="date_achat" value="{{ old('date_achat') }}"
                                        placeholder="aaaa-mm-jj hh:mm:ss"
                                        required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label class='lead'
                                           for='grid-text-1'>Lieu d'achat</label>
                                    <input
                                        class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500'
                                        id='grid-text-1' name="lieu" value="{{ old('lieu') }}"
                                        placeholder="Saisir le lieu d'achat"
                                        required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label class='lead'
                                           for='grid-text-1'>Prix d'achat</label>
                                    <input
                                        class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500'
                                        id='grid-text-1' name="prix" value="{{ old('prix') }}"
                                        placeholder="Saisir le prix d'achat"
                                        required>
                                </div>
                            </div>
                            <div class="text-center">
                                <button
                                    class="btn btn-vert-outline rounded-pill"
                                    type="submit">Ajouter
                                </button>
                                <button type="button" class="btn btn-orange-outline rounded-pill" data-dismiss="modal">
                                    Fermer
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection


