
@extends('welcome')
@php
    use Carbon\Carbon;
@endphp

@section('body')
    
<main class="container mt-2">
    <h3 class="text-center">Tous nos articles de blog</h3>
    <section class="row">
        @forelse ($articles as $article)
            <div class="col-lg-3 md-6">
                <a href="{{route("article.detail", ["id"=>$article->id])}}" style="text-decoration: none">
                    <div class="card mb-3">
                        <img src="{{asset('storage/imageArticle/'.$article->imageArticle)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">{{$article->nomArticle}}</h5>
                          <p class="card-text">  
                           {{Str::limit($article->descArticle, 30)}} <br>
                            Publier par <strong>{{$article->user->name}}</strong> <br>
                            date de publication <strong>
                                @php
                                    $now=Carbon::now()->locale('fr_FR');
                                    $dt=Carbon::parse($article->created_at)->locale('fr_FR');
                                    echo $dt->diffForHumans($now);
                                @endphp
                            </strong>
                        </p>
                        </div>
                      </div>

                </a>
            </div>
        @empty
            <p class="display-6 text-center">Pas d'articles dans le blog</p>
        @endforelse
    </section>
</main>

@endsection