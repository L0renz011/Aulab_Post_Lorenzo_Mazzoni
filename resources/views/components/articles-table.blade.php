<table class="table table-striped table-hover border">
    <thead class="table-dark">
        <tr>
            <th scape="col">#</th>
            <th scape="col">Titolo</th>
            <th scape="col">Sottotitolo</th>
            <th scape="col">Redattore</th>
            <th scape="col">Azioni</th>  
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
        <tr>
            <th scape="row">{{$article->id}}</th>
            <td>{{$article->title}}</td>
            <td>{{$article->subtitle}}</td>
            <td>{{$article->user->name}}</td>
            <td>

                @if (is_null($article->is_accepted))
                    <a href="{{route('article.show', compact('article'))}}" class="btn btn-info text-white">Leggi l'articolo</a>
                    @else
                    <a href="{{route('revisor.undoArticle', compact('article'))}}" class="btn btn-info text-white">Riporta in revisione</a>                    
                @endif

            </td>
        </tr>
        @endforeach
    </tbody>
</table>