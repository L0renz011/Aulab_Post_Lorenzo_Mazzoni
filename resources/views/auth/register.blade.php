
<x-layout>
    
    {{-- Posso aggiungere questo?
       <div> 
        <a href="{{ route('register') }}">Non hai ancora un account? Registrati qui</a>
        </div> 
    --}}
    

    <div class="container-fluid p-5 bg-info-white text-center text-black mb-4">
        <div class="row justify-content-center">
            <h1 class="display-1">
                Registrati
            </h1>
        </div>
    </div>
    
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="co.-12 col-md-8">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>

                        @foreach ($errors as $error)
                            <li>{{ $error }}</li>                             
                        @endforeach
                    </ul>
                </div>
                @endif

                <form class="card p-5 shadow" action="{{route('register')}}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input name="name" type="text" class="form-control" id="username" value="{{old('name')}}">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="email" value="{{old('email')}}">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="password">
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Conferma Password</label>
                        <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
                    </div>

                    <div class="mb-2">
                        <button class="btn bg-warning text-black">Registrati</button>
                        <p class="small mt-2">Già registrato? <a href="{{route('login')}}">Login</a></p>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-layout>