<x-layout>

    <div class="container-fluid p-5 bg-info-white text-center text-black mb-4">
        <div class="row justify-content-center">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@10..48,300&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Qwitcher+Grypen&display=swap" rel="stylesheet">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shadow Effect</title>
        <link rel="stylesheet" href="styles.css">
            <h1 class="display-1"> 
                The Aulab Post
            </h1>
            <h2 class="display-1">
                Il tuo contributo all'informazione!
            </h2>
        </div>
    </div>
    
    @auth
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Ciao {{Auth::user()->name}}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="">Profilo</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a></li>
                <form method="post" action="{{route('logout')}}" id"form-logout" class="d-none"></form>
                    @csrf
                </form>
            </ul>
        </li>
    @endauth

    @guest
    <section class="container my-5">
        <div class="row justify-content-around">
    
            <div class="col-12 col-md-3">
                <div class="card">
                    <div class="card-body">
                            <h5 class="card-title">Benvenuto</h5>
                            <p class="card-text">Benvenuto nel nostro sito! Scopri le ultime novità e contenuti che più ti interessano.</p>
                            <a href="#" class="btn btn-warning">Scopri di più</a>
                        </div>
                </div>
            </div>
    
            <div class="col-12 col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Registrati</h5>
                        <p class="card-text">Registrati per ottenere accesso a contenuti esclusivi e interagire con la nostra community.</p>
                        <a href="{{ route('register') }}" class="btn btn-warning">Registrati ora</a>
                    </div>
                </div>
            </div>
    
            <div class="col-12 col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Accedi</h5>
                        <p class="card-text">Hai già un account? Accedi per accedere ai contenuti e alle funzionalità del sito.</p>
                        <a href="{{ route('login') }}" class="btn btn-warning">Accedi</a>
                    </div>
                </div>
            </div>
    
        </div>
    </section>
    @endguest

    @if(session('message'))
        <div class="alert alert-success text-center">
            {{session('message')}}
        </div>
    @endif

    <div class=""container my-5>
        <div class="row justify-content-around">
            @foreach ($articles as $article)
            <div class="col-12 col-md-3">
                <div class="card">
                    <img src="{{Storage::url($article->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <p class"card-text">{{"article->subtitle"}} </p>
                        @if($article->category)
                            <a href="{{ route('article.byCategory', ['category' => $article->category->id])}}" class="small text-muted fst-italic text-capitalize">{{ $article->category->name }}</a>
                        @else
                            <p class="small text-muted fst-italic text-capitalize">
                            Non categorizzato
                            </p>
                        @endif
                        <span class="text-muted small fst-italic">- tempo di lettura {{ $article->readDuration()}} min</span>
                        <hr>
                        <p class="small text-muted fst-italic textcapitalize">{{$article->category->name}}</p>
                        <p class="small fst-italic text-capitalize">
                            @foreach($article->tags as $tag)
                                #{{ $tag->name }}
                            @endforeach
                        </p>
                    </div>
                    <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                        Redatto il {{$article->at->format('d/m/y')}} da{{$article->user>name}}
                        <a href="{{route('article.byCategory', ['category' => $article->category->id])}}" class="small text-muted fst-italic text-capitalize">{{$category-category-name}}</a>
                    </div>
                    <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                        Redatto da {{$editor->user->name}} il {{$article->at->format('d/m/y')}}
                        <a href="{{route('article.byEditor', ['editor' => $article->editor->id])}}" class="small text-muted fst-italic text-capitalize">{{$editor->editor->name}}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</x-layout>