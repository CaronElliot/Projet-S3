@extends('base')

@section('body')
    @if(!empty($jeux))
        <div class="container">
            @foreach($jeux as $j)
                <x-jeux :id="$j->id"></x-jeux>
            @endforeach
        </div>

    @endif
@endsection
