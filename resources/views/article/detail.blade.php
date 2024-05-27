@extends('welcome')

@php
    use Carbon\Carbon;
@endphp

@section('body')
    <main class="container mt-2">
        <p class="text-center">Detail de l'article <strong>{{$article->nomArticle}} </strong> </p>
        <section class="row">
            <div class="col-lg-4">
                <img src="{{asset('storage/imageArticle/'.$article->imageArticle)}}" alt="" class="img-fluid">
            </div>
            <div class="col-lg-8">
                <p style="text-align: justify">
                        {{$article->descArticle}}
                </p>
                <p>
                    Auteur: <strong>{{$article->user->name}}</strong>
                </p>
                <p>
                    Publier le :
                    <strong>
                        @php
                            $now=Carbon::now()->locale('fr_FR');
                            $dt=Carbon::parse($article->created_at)->locale('fr_FR');
                            echo $dt->diffForHumans($now);
                        @endphp
                    </strong>
                </p>

            </div>
        </section>
        <hr>
        @forelse ($commentaires as $commentaire)
        <div class="card mb-3" >
            <div class="card-body">
              <h5 class="card-title">
                {{$commentaire->user->name}}
              </h5>
              <p class="card-text">
                {{$commentaire->descCommentaires}}
              </p>
              <h6 class="card-subtitle mb-2 text-body-secondary">
                @php
                $now=Carbon::now()->locale('fr_FR');
                $dt=Carbon::parse($commentaire->created_at)->locale('fr_FR');
                echo $dt->diffForHumans($now);
            @endphp
              </h6>

            </div>
          </div>
        @empty
            <p class="fs-4">Pas de commentaires</p>
        @endforelse
      @auth
      <section class="row mt-3">
        <h3>Tous les commentaires</h3>
        <form action="{{route("article.commentaire", ["id"=>$article->id])}}" method="POST">
            @csrf
            <div class="mb-3">
                <textarea name="comment" rows="5" class="w-75 form-control commentaires" ></textarea>
            </div>
            <button type="submit" class="btn btn-dark btncomment" disabled>Commenter</button>
        </form>
    </section>
      @endauth
    </main>
@endsection