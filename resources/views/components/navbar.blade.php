<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('home')}}">Blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        @guest
          <li class="nav-item px-3">
            <a class="btn btn-primary" aria-current="page" href="{{route('login')}}">Se Connecter</a>
            <a class="btn btn-success" aria-current="page" href="{{route('register')}}">S'inscrire</a>
          </li> 
        @endguest

        @auth
          <li class="nav-item px-3">
            <a class="nav-link active" aria-current="page" href="{{route('article.create')}}">Creer un article</a>
          </li>
          <li class="nav-item px-3 dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{Auth::user()->name}}
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="#">{{Auth::user()->email}}</a></li>
              <li><a class="dropdown-item" href="#">Profil</a></li>
              <li><a class="dropdown-item" href="{{route('logout')}}">Deconnexion</a></li>
            </ul>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
