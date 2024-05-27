@extends('welcome')

@section('body')
    
    <main class="container">
        <section class="row d-flex justify-content-center vh-100 align-items-center">
            <div class="col-lg-4">
                <h3 class="text-center">Se Connecter</h3>

                <form action="{{route('login')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Email..." value="{{old('email')}}" name="email">
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" placeholder="Mot de passe..." value="{{old('password')}}" name="password">
                        @error('password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <p class="text-center my-3">
                        Pas de compte? <a href="{{route('register')}}">S'inscrire</a>
                    </p>
                    <button type="submit" class="btn btn-outline-dark w-100">Se Connecter</button>
                </form>
            </div>
        </section>
    </main>

@endsection
