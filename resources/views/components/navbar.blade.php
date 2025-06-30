<nav class="nav-bar primary-light-bg secondary-text">
  <div class="container">
    
    <div class="d-flex flex-row justify-content-between align-items-center w-100 gap-2">
      <!-- Search -->
      <div class="w-100 d-none d-md-block">
        <form class="d-flex position-relative align-items-center" action="{{ route('article.search') }}" method="GET">
          <button class="btn position-absolute btn-navbar px-3" type="submit">
            <i class="bi bi-search"></i>
          </button>
          <input class=" ps-5 py-2 rounded-5 white-text search-bar input-search-custom form-control" name="query" type="search" placeholder="Cerca" aria-label="Search" />
        </form>
      </div>

      <!-- Logo -->
      <div class="w-100 text-start text-md-center">
        <a class="navbar-brand m-0" href="#">
          <img src="{{ asset('media/logodasvg-removebg-preview.png') }}" class="logo" alt="">
        </a>
      </div>

      <!-- Icons -->
      <div class="w-100 w-md-33 d-flex align-items-center justify-content-end gap-2">
        <a href="{{ route('article.create') }}" class="text-decoration-none p-1 px-2 pb-2 btn-navbar btn border-0">
          <i class="bi bi-plus-square-fill fs-5"></i>
        </a>

        <button class="p-1 px-2 pb-2 btn-navbar btn border-0">
          <i class="bi bi-bag-dash-fill fs-5"></i>
        </button>

        <button class="navbar-toggler btn p-1 pb-2 btn-navbar person-icon-correction border-0 position-relative" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
          <i class="bi bi-person-fill"></i>
          
          @if ($counter > 0)
            <div class="notifications"></div>
          @endif

        </button>
      </div>

    </div>

      <!-- Search MOBILE-->
      <div class="w-100 w-md-33 d-block d-md-none pb-1">
        <form class="d-flex position-relative align-items-center" action="{{ route('article.search') }}" method="GET">
          <input class="form-control ps-3 py-2 primary-bg rounded-5 w-100 white-text input-search-custom" name="query" type="search" placeholder="Cerca" aria-label="Search" />
          <button class="btn position-absolute end-0 px-3" type="submit">
            <i class="bi bi-search btn-navbar"></i>
          </button>
        </form>
      </div>
  </div>

    <!-- MAIN NAVBAR -->
    <div class="d-none d-md-flex justify-content-between align-items-center w-100 pb-2">
      <div class="col-12 m-auto">
        <ul class="navbar-nav d-flex flex-row justify-content-center p-0 gap-4">
          <li class="nav-item">
            <a class="text-decoration-none active" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="text-decoration-none" href="{{ route('article.catalogo') }}">Catalogo</a>
          </li>
          <li class="nav-item dropdown position-relative">
            <a class="text-decoration-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categorie
            </a>
            <ul class="dropdown-menu rounded-0 primary-light-bg position-absolute bg-ul-category">
              @forelse ($categories as $category)
                <li>
                  <a class="dropdown-item" href="{{ route('category.articles', ['category' => $category->id]) }}">{{ $category->name }}</a>
                </li>
              @empty
                <li><p class="px-3">Nessuna categoria</p></li>
              @endforelse
            </ul>
          </li>
        </ul>
      </div>
    </div>

    <!-- OFFCANVAS -->
    <div class="offcanvas offcanvas-end primary-light-bg" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">
          @auth
            Ciao <a href="{{ route('profile', ['user' => auth()->user()]) }}" class="text-decoration-none ">{{ Auth::user()->name }}</a>
          @else
            Benvenuto
          @endauth
        </h5>
        <a type="button" class="bg-transparent ms-auto" data-bs-dismiss="offcanvas" aria-label="Close">
          <i class="bi bi-x-lg"></i>
        </a>
      </div>

      <div class="offcanvas-body py-0">
        <ul class="list-unstyled">
          <!-- NAV Links in mobile -->
          <li class="nav-item py-1 d-block d-md-none">
            <a class="dropdown-item" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item py-1 d-block d-md-none">
            <a class="dropdown-item" href="{{ route('article.catalogo') }}">Catalogo</a>
          </li>
          <li class="nav-item py-1 dropdown position-relative d-block d-md-none">
            <a class="dropdown-toggle dropdown-item " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categorie
            </a>
            <ul class="dropdown-menu dropdown-menu-end primary-light-bg">
              @forelse ($categories as $category)
                <li>
                  <a class="dropdown-item " href="{{ route('category.articles', ['category' => $category->id]) }}">{{ $category->name }}</a>
                </li>
              @empty
                <li><p class="px-3">Nessuna categoria</p></li>
              @endforelse
            </ul>
          </li>

          <!-- Auth links -->
          @auth
            <li class="nav-item py-1">
              <a class="dropdown-item" href="">Ordini</a>
            </li>
            <li class="nav-item py-1">
              <a class="dropdown-item" href="{{ route('article.create') }}">Inserisci articolo</a>
            </li>
            <li class="nav-item py-1">
              <a class="dropdown-item" href="{{ route('profile', ['user' => auth()->user()]) }}">Profilo utente</a>
            </li>
            @if (auth()->user()->is_revisor)
              <li class="nav-item py-1">
                <a class="dropdown-item" href="{{ route('revisor.profile', ['user' => auth()->user()]) }}">
                  Dashboard revisore
                  @if ($counter > 0)
                    <p class="pt-1"><em>Hai {{ $counter }} articoli da revisionare</em></p>
                  @endif
                </a>
              </li>
            @endif
          @endauth

          @guest
            <h5 class="text-start pb-1">Accedi o Registrati</h5>
            <div class="d-flex gap-3">
              <a href="{{ route('login') }}" class="btn btn-success w-50 rounded-5">Login</a>
              <a href="{{ route('register') }}" class="btn btn-form w-50 rounded-5">Registrati</a>
            </div>
          @endguest
        </ul>

        <label class="switch d-flex align-items-center"> 
            <input type="checkbox">
            <span class="slider"></span>
            <span class="ms-2">Theme Mode</span>
          </label>
        <!-- Logout -->
        @auth
          <form method="POST" action="{{ route('logout') }}" class="mt-4">
            @csrf
            <div class="h-100 d-flex align-items-end">
              <button type="submit" class="rounded-5 btn btn-form w-100 d-flex align-items-center justify-content-center span-logout">
                <i class="bi bi-box-arrow-right dark-text fs-5 pe-2 m-0"></i>
                <span class="m-0 p-0 dark-text">Logout</span>
              </button>

            </div>
            
          </form>
        @endauth
        
      </div>
    </div>
  </div>
</nav>
