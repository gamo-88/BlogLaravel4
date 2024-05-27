@extends('welcome')

@section('body')
    <main class="container mt-2">
        <h3 class="text-center">Creer votre article</h3>
        <section class="row d-flex justify-content-center">
            <div class="col-lg-8">
                @session('session')
                    <div class="alert alert-success">{{$value}}</div>
                @endsession
                <form method="POST" enctype="multipart/form-data" action="{{route('article.store')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="nom">Nom Article</label>
                        <input type="text" class="form-control" value="{{old('nom')}}" name="nom">
                        @error('nom')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image">Image Article</label>
                        <input type="file" class="form-control" value="{{old('image')}}" name="image" accept="image/*" >
                        @error('image')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="desc">Description Article</label>
                        <textarea name="desc" rows="5" class="form-control" >{{old('desc')}}</textarea>
                        @error('desc')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-dark w-100" >Creer article</button>
                </form>
            </div>
        </section>
    </main>
@endsection