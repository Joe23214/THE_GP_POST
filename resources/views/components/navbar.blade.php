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
          <li class="nav-item">
            <a class="nav-link active" href="#">profilo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{route('article.create')}}" aria-disabled="true">Inserisci un articolo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-disabled="true">linky</a>
          </li>
        </ul>
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
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
</nav>