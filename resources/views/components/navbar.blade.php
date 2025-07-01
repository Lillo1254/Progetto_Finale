<header class="nav-bar primary-light-bg secondary-text">
    <nav class="container">

        <!-- Main controls -->
        <div class="d-flex flex-row justify-content-between align-items-center w-100 gap-2 pt-3">
            <!-- Search -->
            <div class="w-100 d-none d-md-block pb-3">
                <form class="d-flex position-relative align-items-center" action="{{ route('article.search') }}"
                    method="GET">
                    <button class="btn position-absolute btn-navbar px-3" type="submit">
                        <i class="bi white-text bi-search"></i>
                    </button>
                    <input class=" ps-5 py-2 rounded-5 white-text search-bar input-search-custom form-control"
                        name="query" type="search" placeholder="{{ __('ui.cerca') }}" aria-label="Search" />
                </form>
            </div>

            <!-- Logo -->
            <div class="w-100 text-start text-md-center">
                <a class="navbar-brand m-0" href="#">
                    <img src="{{ asset('media/Logo_DarkMode.png') }}" class="logo text-start" alt="" id="nav-logo">
                </a>
            </div>

            <!-- Icons -->
            <div class="w-100 w-md-33 d-flex align-items-center justify-content-end gap-2 pb-3">
                <a href="{{ route('article.create') }}"
                    class="text-decoration-none white-text  p-1 px-2 pb-2 btn-navbar btn border-0">
                    <i class="bi white-text bi-plus-square-fill fs-5"></i>
                </a>

                <button class="p-1 px-2 pb-2 btn-navbar btn border-0">
                    <i class="bi white-text bi-bag-dash-fill fs-5"></i>
                </button>

                <button class="navbar-toggler btn p-1 pb-2 btn-navbar person-icon-correction border-0 position-relative"
                    type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar"
                    aria-controls="offcanvasDarkNavbar">
                    <i class="bi white-text bi-person-fill"></i>

                    @auth
                        @if (auth()->user()->is_revisor)
                            @if ($counter > 0)
                                <div class="notifications"></div>
                            @endif
                        @endif
                    @endauth
                </button>
            </div>
        </div>

        <!-- Search MOBILE-->
        <div class="w-100 w-md-33 d-block d-md-none py-1">
            <form class="d-flex position-relative align-items-center" action="{{ route('article.search') }}"
                method="GET">
                <input class="form-control ps-3 py-2 rounded-5 w-100 white-text input-search-custom"
                    name="query" type="search" placeholder="Cerca" aria-label="Search" />
                <button class="btn position-absolute end-0 px-3" type="submit">
                    <i class="bi white-text bi-search btn-navbar"></i>
                </button>
            </form>
        </div>

        <!-- MAIN NAVBAR -->
        <div class="d-none navbar-links d-md-flex justify-content-between align-items-center w-100 pb-2 pt-3">
            <div class="col-12 m-auto">
                <ul class="navbar-nav d-flex flex-row justify-content-center p-0 gap-4">
                    <li class="nav-item">
                        <a class="text-decoration-none white-text  active" href="{{ route('home') }}">{{ __('ui.home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="text-decoration-none white-text "
                            href="{{ route('article.catalogo') }}">{{ __('ui.catalogo') }}</a>
                    </li>
                    <li class="nav-item dropdown position-relative">
                        <a class="text-decoration-none white-text  dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ __('ui.categorie') }}
                        </a>
                        <ul class="dropdown-menu rounded-0 primary-light-bg position-absolute bg-ul-category">
                            @forelse ($categories as $category)
                                <li>
                                    <a class="dropdown-item white-text " href="{{ route('category.articles', ['category' => $category->id]) }}">{{ $category->name }}</a>
                                </li>
                            @empty
                                <li>
                                    <p class="px-3">{{ __('ui.no_categoria') }}</p>
                                </li>
                            @endforelse
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <!-- OFFCANVAS -->
        <div class="offcanvas offcanvas-end primary-light-bg" tabindex="-1" id="offcanvasDarkNavbar"
            aria-labelledby="offcanvasDarkNavbarLabel">

            <!-- offcanvas header -->
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">
                    @auth
                        {{ __('ui.ciao') }} <a href="{{ route('profile', ['user' => auth()->user()]) }}"
                            class="text-decoration-none white-text  ">{{ Auth::user()->name }}</a>
                    @else
                        {{ __('ui.benvenuto') }}
                    @endauth
                </h5>
                <a type="button" class="bg-transparent ms-auto" data-bs-dismiss="offcanvas" aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                </a>
            </div>

            <!-- offcanvas body -->
            <div class="offcanvas-body py-0">
                
                <!-- NAV Links in mobile -->
                <ul class="list-unstyled">
                    <li class="nav-item py-1 d-block d-md-none">
                        <a class="dropdown-item white-text " href="{{ route('home') }}">{{ __('ui.home') }}</a>
                    </li>
                    <li class="nav-item py-1 d-block d-md-none">
                        <a class="dropdown-item white-text " href="{{ route('article.catalogo') }}">{{ __('ui.catalogo') }}</a>
                    </li>
                    <li class="nav-item py-1 dropdown position-relative d-block d-md-none">
                        <a class="dropdown-toggle dropdown-item white-text  " href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ __('ui.categorie') }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end primary-light-bg">
                            @forelse ($categories as $category)
                                <li>
                                    <a class="dropdown-item white-text  "
                                        href="{{ route('category.articles', ['category' => $category->id]) }}">{{ $category->name }}</a>
                                </li>
                            @empty
                                <li>
                                    <p class="px-3">{{ __('ui.no_categoria') }}a</p>
                                </li>
                            @endforelse
                        </ul>
                    </li>

                    <!-- Auth links -->
                    @auth
                        <li class="nav-item py-1">
                            <a class="dropdown-item white-text " href="">{{ __('ui.ordini') }}</a>
                        </li>
                        <li class="nav-item py-1">
                            <a class="dropdown-item white-text "
                                href="{{ route('article.create') }}">{{ __('ui.articolo_crea') }}</a>
                        </li>
                        <li class="nav-item py-1">
                            <a class="dropdown-item white-text "
                                href="{{ route('profile', ['user' => auth()->user()]) }}">{{ __('ui.utente') }}</a>
                        </li>
                        @if (auth()->user()->is_revisor)
                            <li class="nav-item py-1">
                                <a class="dropdown-item white-text "
                                    href="{{ route('revisor.profile', ['user' => auth()->user()]) }}">
                                    {{ __('ui.dashboard') }}
                                    @if ($counter > 0)
                                        <p class="pt-1"><em class="white-text ">{{ __('ui.counter_1') }}{{ $counter }}{{ __('ui.counter_2') }}</em></p>
                                    @endif
                                </a>
                            </li>
                        @endif
                    @endauth



                    @guest
                        <h5 class="text-start pb-1 pt-3 pt-md-0">{{ __('ui.auth') }}</h5>
                        <div class="d-flex gap-3">
                            <a href="{{ route('login') }}" class="btn btn-success w-50 rounded-5">
                                <p class="m-auto p-0 px-2 dark-text">{{ __('ui.login') }}</p>
                            </a>
                            <a href="{{ route('register') }}" class="btn btn-form w-50 rounded-5">
                                <p class="m-auto p-0 px-2 dark-text">{{ __('ui.sign_up') }}</p>
                            </a>
                        </div>
                    @endguest
                </ul>

                <div class="row justify-content-start">

                    <!-- lang switch -->
                    @php
                        $currentLang = app()->getLocale();
                        $availableLangs = ['it', 'en', 'es', 'zh'];
                    @endphp
        
                    <div class="dropdown col-2 position-relative d-flex align-items-center justify-content-start primary-light-bg">
                        <a class="text-decoration-none white-text  dropdown-toggle d-flex align-items-center gap-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="curLang">
                            <img src="{{ asset('vendor/blade-flags/language-' . $currentLang . '.svg') }}" width="28" height="28" />
                        </a>
                        <ul class="dropdown-menu lang-menu primary-light-bg pb-2 px-0 ps-2 border-0">
                            @foreach ($availableLangs as $lang)
                                @if ($lang !== $currentLang)
                                    <li class="bg-none p-0 m-0">
                                        <x-_locale :lang='$lang' />
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    <!-- mode switch -->
                    <div class="col-5">
                        <label class="switch d-flex align-items-center justify-content-start pt-1">
                            <p class="white-text mx-2 my-0 mb-1">{{ __('ui.tema') }}</p>
                            <input type="checkbox">
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>
            
                <!-- Logout -->
                @auth
                    <form method="POST" action="{{ route('logout') }}" class="mt-4">
                        @csrf
                        <div class="h-100 d-flex align-items-end">
                            <button type="submit"
                                class="rounded-5 btn btn-form w-100 d-flex align-items-center justify-content-center span-logout">
                                <i class="bi bi-box-arrow-right dark-text fs-5 pe-2 m-0"></i>
                                <span class="m-0 p-0 dark-text">{{ __('ui.logout') }}</span>
                            </button>

                        </div>

                    </form>
                @endauth
            </div>
        </div>
    </nav>
</header>
