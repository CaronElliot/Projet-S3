<div class="card text-center">
    <img class="card-img-top" src="{{$j->url_media}}">
    <div class="card-body">
        <h2 class="card-title">
            {{$j->name}}
        </h2>
        <h3 class="card-text">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    {{$j->editeur->nom}}
                </li>

                <li class="list-group-item">
                    {{$j->theme->nom}}
                </li>

                <li class="list-group-item">
                    @foreach($j->mecaniques as $meca)
                        <span class="badge badge-pill badge-warning">
                            {{$meca->nom}}
                        </span>
                    @endforeach
                </li>
            </ul>
        </h3>
    </div>
</div>
