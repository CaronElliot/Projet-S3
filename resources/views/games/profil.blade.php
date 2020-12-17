@extends('base')

@section('body')
    <body>
    <div class="container">
        <br>
        <div class="row">
            <p>
                Nom de l'utilisateur : {{$user->name}}
                <br/>
                Email de l'utilisateur : {{$user->email}}
            </p>
        </div>
        @if(!empty($jeuxUser))
            <div>
                @foreach($jeuxUser as $s)
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
                                    <li class="list-group-item">
                                        <div class="flex items-center justify-end mt-4 top-auto">
                                            <form action="{{route('supprimerAchat',['jeu' => $s->id])}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" name="delete" value="valide"
                                                        class=" bg-white text-red-500 px-2 py-2 rounded-md ">
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
            </div>
        @endif
        <br>
        <div class="row">
            <form action="{{route('ajouterAchat')}}" method="POST" name="formulaireAjoutAchat">
                @csrf
                <div class='w-full md:w-full px-3 mb-6'>
                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Ajouter un
                        jeu</label>
                    <div class="flex-shrink w-full inline-block relative">
                        <select name="jeu" value="{{ old('jeu') }}"
                                class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 shadow-inner px-4 py-2 pr-8 rounded">
                            <option>Choisir le jeu à ajouter</option>
                            @foreach($jeux as $j)
                                <option value="{{$j->id}}" @if($j == old('j')) selected @endif>{{$j->nom}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class='w-full md:w-full px-3 mb-6'>
                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'
                           for='grid-text-1'>Date d'achat</label>
                    <input
                        class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500'
                        id='grid-text-1' name="date_achat" value="{{ old('date_achat') }}"
                        placeholder="aaaa-mm-jj hh:mm:ss"
                        required>
                </div>
                <br>
                <div class='w-full md:w-full px-3 mb-6'>
                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'
                           for='grid-text-1'>Lieu d'achat</label>
                    <input
                        class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500'
                        id='grid-text-1' name="lieu" value="{{ old('lieu') }}" placeholder="Saisir le lieu d'achat"
                        required>
                </div>
                <br>
                <div class='w-full md:w-full px-3 mb-6'>
                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'
                           for='grid-text-1'>Prix d'achat</label>
                    <input
                        class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500'
                        id='grid-text-1' name="prix" value="{{ old('prix') }}" placeholder="Saisir le prix d'achat"
                        required>
                </div>
                <br>
                <div class="flex justify-end">
                    <button
                        class="appearance-none bg-gray-200 text-gray-900 px-2 py-1 shadow-sm border border-gray-400 rounded-md mr-3"
                        type="submit">Ajouter
                    </button>
                </div>
            </form>
        </div>
        <form method="POST" action="http://127.0.0.1:8000/logout">
            <input type="hidden" name="_token" value="eeusNEokZ2pFyMx2S2iA0oO645NLSHM8nCw1Hat6">
            <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
               href="{{route('logout')}}">Logout</a>

        </form>
    </div>
    </body>
@endsection


