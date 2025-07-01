<x-layout titlePage="Dashboard Revisore">
    <section class="primary-bg min-vh-100">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h1 class="secondary-text display-3 pt-5">
                        Dashboard Revisore - {{ Auth::user()->name }}
                    </h1>
                </div>
            </div>

            @if (session()->has('message'))
                <h5 class="text-center pb-5 display-6 white-text">{{ session('message') }}</h5>
            @endif

            @if ($articles_to_check)
                <main class="row justify-content-center">
                    @foreach ($articles_to_check->take(4) as $article)
                        @if ($article->images->count())
                            @foreach ($article_to_check->images as $key => $image)
                                <div class="col-6 col-md-4 mb-4 text-center">
                                    <img src="{{ $image->getUrl(300,300) }}" class="img-fluid rounded shadow"
                                        alt="immagine {{ $key + 1 }} dell'articolo {{ $article_to_check->title }}">
                                </div>
                            @endforeach
                        @else
                            @for ($i = 0; $i < 6; $i++)
                                <div class="col-3 col-md-3">
                                    <img src="https://picsum.photos/300" class="img-fluid rounded shadow"
                                        alt="immagine segnaposto">
                                </div>
                            @endfor
                        @endif
                        <article class="col-12 col-md-6 col-lg-5 mb-4">
                            <div class="card primary-light-bg p-4 rounded-0">
                                <h2 class="pb-2">{{ $article->title }}</h2>
                                <p><strong>Autore:</strong> {{ $article->author }}</p>
                                <p><strong>Categoria:</strong> {{ $article->category->name }}</p>
                                <p><strong>Stato:</strong> {{ $article->status }}</p>

                                <div class="d-flex justify-content-between mt-3">
                                    <button type="button" class="btn btn-success rounded-5 px-3" data-bs-toggle="modal"
                                        data-bs-target="#acceptModal-{{ $article->id }}">
                                        <p class="m-auto p-0 px-2 dark-text">Accetta articolo</p>
                                    </button>
                                    <button type="button" class="btn btn-delete rounded-5 px-3" data-bs-toggle="modal"
                                        data-bs-target="#declineModal-{{ $article->id }}">
                                        <p class="m-auto p-0 px-2 dark-text">Rifiuta articolo</p>
                                    </button>
                                </div>
                            </div>
                        </article>

                        <!-- Modal Accetta -->
                        <div class="modal fade " id="acceptModal-{{ $article->id }}" tabindex="-1"
                            aria-labelledby="acceptModalLabel-{{ $article->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content primary-light-bg">
                                    <div class="modal-header">
                                        <h1 class="modal-titlefs-5" id="acceptModalLabel-{{ $article->id }}">Accetta
                                            Articolo</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Sei sicuro di voler accettare l'articolo
                                        <strong>{{ $article->title }}</strong>?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('revisor.accept', $article) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-success rounded-5 px-3">
                                                <p class="m-auto p-0 px-2 dark-text">Accetta</p>
                                            </button>
                                        </form>
                                        <button type="button" class="btn btn-secondary rounded-5 px-3"
                                            data-bs-dismiss="modal">
                                            <p class="m-auto p-0 px-2 dark-text">Annulla</p>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Rifiuta -->
                        <div class="modal fade" id="declineModal-{{ $article->id }}" tabindex="-1"
                            aria-labelledby="declineModalLabel-{{ $article->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content primary-light-bg">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="declineModalLabel-{{ $article->id }}">Rifiuta
                                            Articolo</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body primary-light-bg">
                                        Sei sicuro di voler rifiutare l'articolo
                                        <strong>{{ $article->title }}</strong>?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('revisor.reject', $article) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-delete rounded-5 px-3">
                                                <p class="m-auto p-0 px-2 dark-text">Rifiuta</p>
                                            </button>
                                        </form>
                                        <button type="button" class="btn btn-secondary rounded-5 px-3"
                                            data-bs-dismiss="modal">
                                            <p class="m-auto p-0 px-2 dark-text">Annulla</p>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </main>
            @else
                <div class="text-center my-5">
                    <h2><em>Nessun articolo da revisionare</em></h2>
                </div>
            @endif
            <div class="text-center mt-3">
                <a href="{{ route('revisor.articledecline') }}" class="btn btn-form rounded-5 px-3 mx-3">
                    <p class="m-auto p-0 px-1 dark-text">Lista articoli rifiutati</p>
                </a>
                <a href="{{ route('home') }}" class="btn btn-success rounded-5 px-3 mx-3">
                    <p class="m-auto p-0 px-1 dark-text">Torna all'homepage</p>
                </a>
            </div>
        </div>
    </section>
</x-layout>
