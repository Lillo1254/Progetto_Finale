<div class="card position-relative p-0 border-0 primary-light-bg-card rounded-0 h-100 overflow-hidden shadow-card">

    <!-- ? IMAGE -->
    <a href="{{ route('article.show', $article) }}" class="card-link z-1">
        <img src="{{ $article->images->IsNotEmpty() ? $article->images->first()->getUrl(1024, 1024) : '/media/default.jpg' }}"
            alt="immagine dell'articolo {{ $article->title }}" class="article-img rounded-0 z-1 p-0 m-0 w-100">
    </a>

    <!-- ? CARD BODY -->
    <div class="card-body p-4 z-2 primary-light-bg-card pb-0">
        <a href="{{ route('article.show', $article) }}"
            class="card-link card-title z-1 text-decoration-none white-text fw-light fs-3">{{ $article->title }}</a>
        <h5 class="card-text fw-light pt-2 fs-6 secondary-text">{{ $article->price }} €</h5>
        <a href="{{ route('category.articles', $article->category) }}"
            class=" card-text secondary-text ">{{ $article->category->name }}</a>

        @guest
            <div class="mb-3"></div>
        @endguest

        @auth
            @if ($article->user_id != auth()->id())
                <div class="mb-3"></div>
            @endif
        @endauth
    </div>

    <!-- ? CARD BUTTONS -->
    @auth
        @if ($article->user_id === auth()->id())
            
        <div class="container-fluid p-0">

        
            <div class="row z-3 py-3 align-items-center justify-content-center primary-light-bg-card g-0">
                <div class="col-4 g-0 mx-auto">
                    <a href="{{ route('article.edit', $article) }}" class="btn-form btn m-0 px-0 rounded-5">
                        <p class="m-auto px-2 dark-text">{{ __('ui.modifica') }}</p>
                    </a>
                </div>
                <div class="col-4 g-0 mx-auto">
                    <button type="button" class="btn btn-delete rounded-5 " data-bs-toggle="modal"
                        data-bs-target="#deleteModal">
                        <p class="m-auto p-0 dark-text">{{ __('ui.elimina_articoli') }}</p>
                    </button>
                </div>
            </div>

            {{-- modale --}}
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content primary-light-bg">

                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">
                                {{ __('ui.elimina_articolo') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
                        </div>

                        <div class="modal-body">
                            {{ __('ui.conferma_eliminazione') }}
                        </div>

                        <div class="modal-footer">
                            <form action="{{ route('article.destroy', $article) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn rounded-5 btn-delete">
                                    <p class="dark-text m-0 px-2">{{ __('ui.elimina_articolo') }}</p>
                                </button>
                            </form>

                            <button type="button" class="btn rounded-5 btn-form" data-bs-dismiss="modal">
                                <p class="dark-text m-0 px-2">{{ __('ui.annulla') }}</p>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
            {{-- fine mdoale --}}
            </div>
        @endif
    @endauth

</div>
