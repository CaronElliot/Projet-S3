@extends('base')

@section('body')
    <div class="container-full">
        <p>Nom de l'utilisateur : {{$user->name}} </p><br/>
        Email de l'utilisateur : {{$user->email}}</p>
    </div>

@endsection
