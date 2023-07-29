<x-layout>

        <div class="container-fluid p-5 bg-info text-center text-white">
            <div class="row justify-content-center">
                <h1 class="diplasy-1">
                    {{$article->title}}
                </h1>
            </div>
        </div>

        <div class="container my-5">
            <div class="row justify-content-around">
                <div class="col-12 col-md-8">
                    <img src="{{Storage::url($article->image)}}" alt="" class="img-fluid my-3">
                    <div class="text-center"></div>
                        <h2>{{$article->subtitle}}</h2>
                        <div class="my-3 text-muted fst-italic">
                            <p>Redatto da {{$article->user->name}} il {{$article->created_at->format('d/m/y')}}</p>
                        </div>
                    </div>
                <hr>
                <p>{{$article->body}}</p>
                <div class="text-center">
                    @if(Auth::user() && Auth::user()->is_revisor)
                        <a href="{{ route('revisor.acceptArticle', compact('article')) }}" class="btn btn-warning text-white my-5">Accetta articolo</a>
                        <a href="{{ route('revisor.rejectArticle', compact('article')) }}" class="btn btn-warning text-white my-5">Rifiuta articolo</a>
                    @endif
                    <a href="{{route('article.index')}}" class="btn btn-info text-white my-5">Torna indietro</a>
                </div>
            </div>
        </div>
    </div>

</x-layout>