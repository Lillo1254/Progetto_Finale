<x-layout>
    <div class="primary-bg min-vh-100 py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 primary-light-bg p-5 rounded-4 shadow-lg">
                    <div class="row d-flex align-items-center">
                        <!-- Sezione Testo -->
                        <div class="col-12 col-md-6 overflow-hidden">
                            <h1 class="secondary-text display-5">{{ $article->title }}</h1>
                            <h4 class="secondary-text px-1">Inserito da: {{ $article->user->name }}</h4>
                            <p class="secondary-text mt-3 px-1">{{ $article->description }}</p>
                            <h5 class="secondary-text px-1">Prezzo: {{ number_format($article->price, 2) }} €</h5>
                            

                            <!-- Sezione Categoria -->
                            <div class="mt-4 px-1">
                                <h5 class="secondary-text">Categoria:</h5>
                                <p class="secondary-text">{{ $article->category->name ?? 'Nessuna categoria' }}</p>
                            </div>
                        </div>

                        <!-- Sezione Carosello senza freccette -->
                        <div class="col-12 col-md-6">
                            <div id="articleCarousel" class="carousel slide shadow-sm" data-bs-ride="carousel">
                                <div class="carousel-inner rounded-4">
                                    <div class="carousel-item active">
                                        <img src="https://picsum.photos/500/301" class="d-block w-100" alt="Immagine articolo">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://picsum.photos/500/302" class="d-block w-100" alt="Immagine articolo">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://picsum.photos/500/303" class="d-block w-100" alt="Immagine articolo">
                                    </div>
                                </div>
                            </div>
                        </div>
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