<x-layout>

    <div class="container-fluid p-5 bg-info text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1"> 
                The Aulab Post
            </h1>
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
        <li class="nav-item dropdown">
            <a class="nav-link-dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Benvenuto
        </a>
        <ul class="nav-item dropdown" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{route('register')}}">Registrati</a></li>
            <li><a class="dropdown-item" href="{{route('login')}}">Accedi</a></li>
        </ul>
        </li>
    @endguest

    @if(session('message'))
        <div class="alert alert-success text-center">
            {{session('message')}}
        </div>
    @endif

    <div class=""container my-5>
        <div class="row justify-content-around">
            @foreach ('articles' as 'article')
            <div class="col-12 col-md-3">
                <div class="card">
                    <img src="{{Storage::url($article->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <p class"card-text">{{"article->subtitle"}} </p>
                        <p class="small text-muted fst-italic textcapitalize">{{$article->category->name}}</p>
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