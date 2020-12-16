@extends('base')

@section('body')
    <div class="container">
        <br>
        <div class="row">
            <p>
                Nom de l'utilisateur : {{$user->name}}
                <br/>
                Email de l'utilisateur : {{$user->email}}
            </p>
        </div>
        <br>
        <div class="row">
            <form action="{{route('ajouterAchat')}}" method="POST" name="formulaireAjoutAchat">
                @csrf
                <div class='w-full md:w-full px-3 mb-6'>
                    <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Ajouter un jeu</label>
                    <div class="flex-shrink w-full inline-block relative">
                        <select name="jeu"  value="{{ old('jeu') }}"
                                class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 shadow-inner px-4 py-2 pr-8 rounded">
                            <option>Choisir le jeu à ajouter</option>
                            @foreach($jeux as $j)
                                <option value="{{$j->id}}"  @if($j == old('j')) selected @endif>{{$j->nom}}</option>
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
                        id='grid-text-1' name="date_achat" value="{{ old('date_achat') }}" placeholder="aaaa-mm-jj hh:mm:ss"
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
    </div>
@endsection
