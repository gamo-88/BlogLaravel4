@extends('welcome')

@section('body')
    
    <main class="container">
        <section class="row d-flex justify-content-center vh-100 align-items-center">
            <div class="col-lg-4">
                <h3 class="text-center">S'inscrire</h3>
                @session('succes')
                    <div class="alert alert-danger">{{$value}}</div>
                @endsession
                <form action="{{route('register')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="UserName..." value="{{old('nom')}}" name="nom">
                        @error('nom')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
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
                    
                    <div class="mb-3">
                        <input type="password" class="form-control" placeholder="Confirmation de mot de passe..." value="{{old('password')}}" name="password_confirmation">
                        @error('password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <p class="text-center my-3">
                        Deja un compte? <a href="{{route('login')}}">Se Connecter</a>
                    </p>
                    <button type="submit" class="btn btn-outline-dark w-100">S'Inscrire</button>
                </form>
            </div>
        </section>
    </main>

@endsection

