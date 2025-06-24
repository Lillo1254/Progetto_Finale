<nav class="navbar sticky-top primary-light-bg secondary-text">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">@if (Auth::check()) Ciao {{ Auth::user()->name }} 
  
            
        @else
            Benvenuto            
        @endif</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon t"></span>
    </button>
    <div class="offcanvas offcanvas-end primary-light-bg" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"> @if (Auth::check()) Ciao {{ Auth::user()->name }} 
  
            
        @else
            Benvenuto            
        @endif</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div>
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('article.index') }}">Catalogo</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </a>
              <ul class="dropdown-menu primary-bg">
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="{{ route('article.create') }}">Inserisci articolo</a></li>
              </ul>
            </li>
              </ul>
            </li>
          </ul>
          <form class="d-flex mt-3" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
            <button class="btn btn-success" type="submit">Search</button>
          </form>
        </div>

        <!-- ! Login/Register section -->
        @guest
          <div class="mt-4 p-3 rounded primary-bg">
            <h5 class="text-center pb-1">Accedi o Registrati</h5>
            <div class="d-flex gap-3">
              <a href="{{ route('login') }}" class="btn btn-success w-50">Login</a>
              <a href="{{ route('register') }}" class="btn btn-form w-50">Registrati</a>
            </div>
          </div>
        @endguest

        <!-- ! Logout -->
        @auth          
          <a href="" class="btn btn-form mt-3 w-100 text-start d-flex align-items-center">
            <i class="bi bi-box-arrow-right primary-text fs-5 pe-2 m-0"></i>
            <p class="primary-text m-0 p-0">Logout</p>
          </a>
        @endauth
      </div>
  </div>
</nav>