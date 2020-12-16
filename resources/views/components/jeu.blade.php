<div class="card">
    <img class="card-img-top">
    <div class="card-body">
        <h2 class="card-title">
            {{$id}}
        </h2>
        <h3 class="card-text">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    {{$id->editeur->nom}}
                </li>

                <li class="list-group-item">
                    {{$id->theme->nom}}
                </li>

                <li class="list-group-item">
                    @foreach($id->mecaniques as $meca)
                        <span class="badge badge-pill badge-danger">
                            {{$meca->nom}}
                        </span>
                    @endforeach
                </li>
            </ul>

        </h3>

    </div>
</div>
