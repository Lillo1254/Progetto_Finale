<x-layout titlePage="{{ $article->title }}">
    <main class="primary-bg min-vh-100 py-5">
        <div class="container">
            <div class="row justify-content-center p-3">
                <div class="col-12 col-lg-10 primary-light-bg p-3 p-md-5 rounded-0">
                    <article class="row flex-column-reverse flex-md-row">
                        
                        <div class="col-12 col-md-6 overflow-hidden">
                            <h1 class="secondary-text display-5">{{ $article->title }}</h1>
                            <h6 class="white-text px-1">{{ __('ui.prezzo') }}: {{ number_format($article->price, 2) }} €</h6>                        
                            <h6 class="white-text px-1">{{ __('ui.categoria') }}: <a href="{{ route('category.articles', $article->category) }}" class="white-text">{{ $article->category->name ?? 'Nessuna categoria' }}</a></h6>
                            <p class="white-text mt-3 px-1">{{ $article->description }}</p>
                            <p class="white-text">Inserito da:</p>
                             @auth
        @if(auth()->id() === $article->user->id)
            <a href="{{ route('profile', auth()->user()) }}" class="white-text">Il tuo profilo</a>
        @else
            <a href="{{ route('profiloarticolo', $article->user) }}" class="white-text">{{ $article->user->name }}</a>
        @endif
    @endauth    
                        </div>

@if ($article->images->count() > 0)
    <div class="row">
        @foreach ($article->images as $key => $image)
            <div class="col-6 col-md-4 col-lg-3 mb-3">
                <img src="{{ $image->getUrl(1024, 1024) }}"
                     class="img-fluid rounded shadow cursor-pointer"
                     data-bs-toggle="modal"
                     data-bs-target="#imageModal{{ $key }}"
                     alt="Miniatura {{ $key + 1 }}">

                <!-- Modale per l'immagine ingrandita -->
                <div class="modal fade" id="imageModal{{ $key }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-md">
                        <div class="modal-content bg-transparent border-0">
                            <div class="modal-body p-0 text-center">
                                <img src="{{ $image->getUrl(1024, 1024) }}" class="img-fluid rounded shadow" alt="Immagine grande {{ $key + 1 }}">
                            </div>
                            <div class="modal-footer justify-content-center border-0">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
                    </article>

                   <div class="d-flex flex-column align-items-center">
                    <div class="text-center mt-3 mt-md-5">
                        <a href="{{ route('article.catalogo') }}" class="btn btn-home px-4 rounded-5"><p class="m-auto p-0 px-2 dark-text">{{ __('ui.torna_catalogo') }}</p></a>
                    </div>
                    @if (Auth::check() && Auth::user()->is_revisor && $article->is_accepted == false)
                    <div class="mt-3">

                        <a href="{{ route('revisor.articledecline') }}" class="btn rounded-5 btn-success"><p class="m-auto p-0 px-2 dark-text">Torna alla lista rifiutati</p>
                        </a>
                    </div>
                    @endif
                </div>

                </div>
            </div>
        </div>
    </main>
</x-layout>