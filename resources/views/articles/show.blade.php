<x-layout>
    <div class="primary-bg min-vh-100 py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 primary-light-bg p-5 rounded-4 shadow-lg">
                    <div class="row d-flex align-items-center">
                        <!-- Sezione Testo -->
                        <div class="col-12 col-md-6">
                            <h1 class="secondary-text fw-bold">{{ $article->title }}</h1>
                            <h4 class="secondary-text">Inserito da: {{ $article->user->name }}</h4>
                            <p class="secondary-text mt-3">{{ $article->description }}</p>
                            <p class="secondary-text fw-bold fs-4">Prezzo: {{ number_format($article->price, 2) }} €</p>
                        </div>

                        <!-- Sezione Carosello senza freccette -->
                        <div class="col-12 col-md-6">
                            <div id="articleCarousel" class="carousel slide rounded-4 shadow-sm" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="https://picsum.photos/500/301" class="d-block w-100 rounded-4" alt="Immagine articolo">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://picsum.photos/500/302" class="d-block w-100 rounded-4" alt="Immagine articolo">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://picsum.photos/500/303" class="d-block w-100 rounded-4" alt="Immagine articolo">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sezione Categoria -->
                    <div class="mt-4">
                        <h5 class="secondary-text fw-bold">Categoria:</h5>
                        <p class="secondary-text">{{ $article->category->name ?? 'Nessuna categoria' }}</p>
                    </div>

                    <!-- Pulsante di ritorno -->
                    <div class="text-center mt-4">
                        <a href="{{ route('article.catalogo') }}" class="btn btn-form px-5">Torna agli articoli</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>