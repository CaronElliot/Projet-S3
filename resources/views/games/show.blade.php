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
                        @auth
                            <div class="card-footer">
                                <form action="{{route('commentaire')}}" method="POST" name="formulaire">
                                    @csrf
                                    Votre note
                                    <input type="radio" name="Note" value="1"> 1
                                    <input type="radio" name="Note" value="2"> 2
                                    <input type="radio" name="Note" value="3"> 3
                                    <input type="radio" name="Note" value="4"> 4
                                    <input type="radio" name="Note" value="5"> 5 <br>
                                    <input name="idJeu" type="hidden" value="{{$data->id}}">
                                    <input type="submit" value="Envoyer">

                                    <input
                                        class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500'
                                        id='grid-text-1' name="commentaire" value="{{ old('commentaire') }}"
                                        placeholder='Saisir votre commentaire'>
                                </form>
                            </div>
                        @endauth
                            <a href="{{ route('jeu.show',['jeu'=>$data->id,'triggerstats'=>'oui']) }}"
                               class="btn btn-outline-secondary">Infos statistiques</a>
                            @if(!empty($moyCom))
                            <div>
                                <ul style="padding: 0">
                                    <li class="list-group-item">Moyenne : {{$moyCom}}<br>
                                    </li>
                                    <li class="list-group-item">Max : {{$maxCom}}<br>
                                    </li>
                                    <li class="list-group-item">Min : {{$minCom}}<br>
                                    </li>
                                    <li class="list-group-item">Nombre d'utilisateurs possédant le jeu : {{$nbCommJeu}}<br>
                                    </li>
                                    <li class="list-group-item">Nombre d'utilisateurs du site : {{$nbComm}}<br>
                                    </li>
                                    <li class="list-group-item">Classement du jeu : {{$classement}}<br>
                                    </li>

                                </ul>
                            </div>
                            @endif
                            <a href="{{ route('jeu.show',['jeu'=>$data->id,'triggerinfo'=>'oui']) }}"
                               class="btn btn-outline-secondary">Infos tarifaires</a>
                            @if(!empty($moyPrix))
                                <div>
                                    <ul style="padding: 0">
                                        <li class="list-group-item">Moyenne : {{$moyPrix}}<br>
                                        </li>
                                        <li class="list-group-item">Max : {{$maxPrix}}<br>
                                        </li>
                                        <li class="list-group-item">Min : {{$minPrix}}<br>
                                        </li>
                                        <li class="list-group-item">Nombre d'utilisateurs possédant le jeu : {{$nbUsersJeu}}<br>
                                        </li>
                                        <li class="list-group-item">Nombre d'utilisateurs du site : {{$nbUsers}}<br>
                                        </li>

                                    </ul>
                                </div>
                            @endif

                        @if(!empty($commentaires))
                            <a href="{{ route('jeu.show',['jeu'=>$data->id,'tri'=>'oui']) }}"
                               class="btn btn-outline-secondary">Trier</a>
                            <div>
                                <ul style="padding: 0">
                                    @foreach($commentaires as $comm)
                                        <li class="list-group-item">Auteur : {{$comm->user->name}}<br> Date
                                            : {{$comm->date_com}}<br> Commentaire : {{$comm->commentaire}}<br> Note (sur
                                            5) : {{$comm->note}} </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
