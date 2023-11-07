<nav class="navbar navbar-expand-lg customnavbar">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">GP POST</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('welcome')}}">Home</a>
          </li>
          @auth
          <li class="nav-item">
            <a class="nav-link active" href="{{route('profile')}}">profilo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{route('article.create')}}" aria-disabled="true">Inserisci un articolo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{route('article.index')}}"aria-disabled="true">i nostri articoli</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{route('careers')}}"aria-disabled="true">Lavora con noi</a>
          </li>
          @if(Auth::user()->is_admin)
          <li><a class="dropdown-item"href="{{route('admin.dashboard')}}">Dashboard Admin</a></li>
          @endif
          @if(Auth::user()->is_revisor)
          <li><a class="dropdown-item"href="{{route('revisor.dashboard')}}">Dashboard del revisore</a></li>
          @endif
          @if(Auth::user()->is_writer)
          <li><a class="dropdown-item"href="{{route('writer.dashboard')}}">Dashboard del redattore</a></li>
          @endif
        </ul>
        @endauth
        <div>
            <li class="nav-item navbar-nav dropdown">
            <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-check-fill"></i>
            </a>
            <ul class="dropdown-menu nav-item">
            @guest
              <li><a class="dropdown-item" href="{{route('login')}}">Accedi</a></li>
              <li><a class="dropdown-item" href="{{route('register')}}">Registrati</a></li>
            @endguest
            @auth
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.queryselector('#form-logout').submit();">Esci</a></li>
              <form method="post" action="{{route('logout')}}" id="form-logout" class="d-none">
            @csrf
            </form>
            </ul>
            @endauth
          </li>
        </div>
        <form class="d-flex" method="GET" action="{{route('article.search')}}">
          <input class="form-control me-2" type="search" placeholder="Cosa stai cercando?" aria-label="Search"  name="query">
          <button class="btn btn-outline-info" type="submit">cerca</button>
        </form>
      </div>
    </div>
</nav>