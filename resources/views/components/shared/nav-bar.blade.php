<nav class="navbar navbar-expand-lg bg-body-tertiary shadow position-relative">
  <div class="container-fluid position-relative">

    <!-- Brand centrato su desktop -->
    <a class="navbar-brand navbar-brand-centered" href="{{route('home')}}">
      HorizonMedia <i class="fa-solid fa-newspaper ms-2"></i>
    </a>

    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Contenuto navbar -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <!-- Menu principale -->
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0 text-center text-lg-start">
        <li class="nav-item">
          <a class="nav-link active d-flex align-items-center justify-content-center justify-content-lg-start" href="{{route('home')}}">Home</a>
        </li>

        <li class="nav-item d-flex align-items-center">
          <a class="nav-link active" href="{{route('article.index')}}">Tutti i nostri articoli</a>
        </li>

        <!-- Nuova voce: Dove siamo -->
        <li class="nav-item d-flex align-items-center">
          <a class="nav-link active" href="{{ route('dove.siamo') }}">Dove siamo</a>
        </li>

        <!-- Filtro categorie -->
        <li class="nav-item dropdown d-flex align-items-center">
          <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">
            <i class="fa-solid fa-filter"></i>
          </a>
          <ul class="dropdown-menu">
            @foreach(\App\Models\Category::all() as $category)
              <li><a class="dropdown-item" href="{{ route('article.byCategory', $category->id) }}">{{ $category->name }}</a></li>
            @endforeach
          </ul>
        </li>
      </ul>

      <!-- Form di ricerca + Dropdown utente -->
      <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center gap-2 ms-lg-2">

        <!-- Dropdown Benvenuto / Utente -->
        <ul class="navbar-nav">
          @guest
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                Benvenuto!
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ route('register') }}">Registrati</a></li>
                <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
              </ul>
            </li>
          @endguest

          @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                Ciao {{ Auth::user()->name }}
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                @if (Auth::user()->is_admin)
                  <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard Admin</a></li>
                @endif
                @if (Auth::user()->is_revisor)
                  <li><a class="dropdown-item" href="{{ route('revisor.dashboard') }}">Dashboard Revisor</a></li>
                @endif
                <li><a class="dropdown-item" href="{{ route('article.create') }}">Crea articolo</a></li>
                @if (Auth::user()->is_writer)
                  <li><a class="dropdown-item" href="{{ route('writer.dashboard') }}">Dashboard Redattore</a></li>
                @endif
                <li>
                  <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a>
                  <form action="{{ route('logout') }}" method="POST" id="form-logout" class="d-none">@csrf</form>
                </li>
              </ul>
            </li>
          @endauth
        </ul>

        <!-- Form cerca -->
        <form class="d-flex" role="search" method="GET" action="{{route('article.search')}}">
          <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search" />
          <button class="btn btn-gradient" type="submit">Cerca</button>
        </form>
      </div>
    </div>
  </div>
</nav>
