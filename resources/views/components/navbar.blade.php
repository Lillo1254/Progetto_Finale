<nav class="navbar sticky-top primary-light-bg secondary-text">
    <div class="container">

        <div class="d-flex justify-content-between  alignt-items-center w-100 py-2">
            <div class="col-4 m-auto">
                <form class="d-flex position-relative align-items-center" role="search">
                    <button class="btn position-absolute px-3" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                    <input class="form-control ps-5 py-2 primary-bg rounded-5 w-50 white-text" type="search" placeholder="Search" aria-label="Search"/>
                </form>
            </div>
            <div class="col-4 m-auto">
                <a class="navbar-brand m-auto text-center" href="#">
                    <h2 class="display-6 my-auto">BRAND LOGO</h2>
                </a>
            </div>
            <div class="col-4 m-auto d-flex align-items-center justify-content-end">
                <a href="{{ route('article.create') }}" class="text-decoration-none px-2">Vendi</a>
                <div class="buttons">
                    <button href="" class="p-1 px-2 pb-2 btn btn-navbar border-none">
                        <i class="bi bi-bag-dash-fill white-text fs-5"></i>
                    </button>   
                    <button class="navbar-toggler pb-2 btn btn-navbar p-1 border-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar"
                        aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                        <i class="bi bi-person-fill white-text fs-4"></i>
                    </button>
                </div>
            </div>

        </div>

        <div class="d-flex justify-content-between alignt-items-center w-100 py-2">
            <div class="col-12 m-auto">
                <ul class="navbar-nav justify-content-end flex-grow-1 d-flex flex-row justify-content-center p-0 gap-4">
                    <li class="nav-item">
                        <a class="text-decoration-none  active" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="text-decoration-none " href="{{ route('article.catalogo') }}">Catalogo</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="text-decoration-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categorie
                        </a>
                        <ul class="dropdown-menu position-absolute rounded-0 primary-light-bg">
                            @forelse ($categories as $category)
                                <li>
                                    <a class="dropdown-item" href="{{ route('category.articles', ['category' => $category->id]) }}">{{ $category->name }}</a>
                                </li>
                            @empty
                                <p>non ci sono categorie da visualizzare</p>
                            @endforelse
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <div class="offcanvas offcanvas-end primary-light-bg" tabindex="-1" id="offcanvasDarkNavbar"
            aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">
                    @auth
                        Ciao <a href="{{ route('profile', ['user' => auth()->user()]) }}"
                            class="text-decoration-none">{{ Auth::user()->name }}</a>
                    @else
                        Benvenuto
                    @endauth
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>

            <div class="offcanvas-body py-0">
                <ul class="list-unstyled">                   
                    @auth
                        <li class="nav-item py-1">
                            <a class="dropdown-item" href="{{ route('article.create') }}">Inserisci articolo</a>
                        </li>
                        <li class="nav-item py-1">
                            <a class="dropdown-item" href="">I tuoi annunci</a>
                        </li>
                        <li class="nav-item py-1">
                            <a class="dropdown-item" href="">Ordini</a>
                        </li>
                    @endauth
                </ul>

                <!-- Sezione Login/Register -->
                @guest
                    <h5 class="text-start pb-1">Accedi o Registrati</h5>
                    <div class="d-flex gap-3">
                        <a href="{{ route('login') }}" class="btn btn-success w-50">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-form w-50">Registrati</a>
                    </div>
                @endguest

                <!-- Sezione Logout -->
                @auth
                    <form method="POST" action="{{ route('logout') }}" class="mt-4">
                        @csrf
                        <button type="submit" class="btn btn-form w-100 text-start d-flex align-items-center">
                            <i class="bi bi-box-arrow-right primary-text fs-5 pe-2 m-0"></i>
                            <span class="primary-text m-0 p-0">Logout</span>
                        </button>
                    </form>
                @endauth

            </div>
        </div>
    </div>
</nav>
