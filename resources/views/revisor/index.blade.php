<x-layout titlePage="Dashboard Revisore">
    <main class="primary-bg min-vh-100">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h1 class="secondary-text display-3 pt-5">
                        Dashboard Revisore - {{ Auth::user()->name }}
                    </h1>
                </div>
            </div>

            @if (session('message'))
                <div class="row justify-content-center px-12">
                    <div class="col-12 col-sm-10 col-lg-12 col-xl-10 alert alert-success dark-text mb-4 rounded-0">
                        {{ session('message') }}
                    </div>
                </div>
            @endif

            @if ($articles_to_check)
                @foreach ($articles_to_check->take(4) as $article)
                    <div class="row justify-content-center mb-5">
                        <article class="col-12 col-md-8 col-lg-6 col-xl-5"> 
                            <div class="card primary-light-bg p-4 rounded-0 h-100">
                                <div class="card-body p-0 d-flex flex-column"> 
                                    <h2 class="pb-2">{{ $article->title }}</h2>
                                    <p class="white-text"><strong class="white-text">Categoria:</strong>
                                        {{ $article->category->name }}</p>
                                    <p class="white-text"><strong class="white-text">Prezzo:</strong>
                                        {{ $article->price }}€</p>
                                    <p class="white-text"><strong class="white-text">Data inserimento:</strong>
                                        {{ $article->created_at->format('d/m/Y') }}</p>
                                    <p class="white-text"><strong class="white-text">Descrizione:</strong>
                                        {{ $article->description }}</p>

                                    @if ($article->images->count())
                                        <div class="row flex-wrap my-3 flex-grow-1"> 
                                            @foreach ($article->images as $key => $image)
                                                <div class="col-12 col-md-6 mb-4 d-flex flex-column">
                                                    <div class="image-container text-center mb-3 flex-grow-1 d-flex align-items-center justify-content-center"
                                                        style="height: 200px; overflow: hidden;"> 
                                                        <img src="{{ $image->getUrl(1024, 1024) }}"
                                                            class="img-fluid rounded-0"
                                                            alt="immagine {{ $key + 1 }} dell'articolo {{ $article->title }}"
                                                            style="object-fit: cover; width: 100%; height: 100%;">
                                                    </div>
                                                    <div class="image-details mt-auto">
                                                        <h5 class="mb-2">Labels</h5>
                                                        @if ($image->labels)
                                                            <div class="labels-container d-flex flex-wrap gap-2 mb-3">
                                                                @foreach ($image->labels as $label)
                                                                    <span
                                                                        class="badge bg-secondary p-2 rounded-pill label-pill">#{{ $label }}</span>
                                                                @endforeach
                                                            </div>
                                                        @else
                                                            <p class="fst-italic white-text">No labels</p>
                                                        @endif

                                                        <h5 class="mt-3 mb-2">Ratings</h5>
                                                        <div class="row">
                                                            <div class="col-12 d-flex align-items-center mb-1">
                                                                <div class="rating-circle {{ $image->adult }} me-2">
                                                                </div>
                                                                <span class="white-text">Adult</span>
                                                            </div>
                                                            <div class="col-12 d-flex align-items-center mb-1">
                                                                <div class="rating-circle {{ $image->violence }} me-2">
                                                                </div>
                                                                <span class="white-text">Violence</span>
                                                            </div>
                                                            <div class="col-12 d-flex align-items-center mb-1">
                                                                <div class="rating-circle {{ $image->spoof }} me-2">
                                                                </div>
                                                                <span class="white-text">Spoof</span>
                                                            </div>
                                                            <div class="col-12 d-flex align-items-center mb-1">
                                                                <div class="rating-circle {{ $image->racy }} me-2">
                                                                </div>
                                                                <span class="white-text">Racy</span>
                                                            </div>
                                                            <div class="col-12 d-flex align-items-center mb-1">
                                                                <div class="rating-circle {{ $image->medical }} me-2">
                                                                </div>
                                                                <span class="white-text">Medical</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="row flex-wrap my-3 flex-grow-1">
                                            @for ($i = 0; $i < 2; $i++)
                                                <div class="col-6 col-sm-4 text-center d-flex flex-column">
                                                    <div class="image-container mb-3 flex-grow-1 d-flex align-items-center justify-content-center"
                                                        style="height: 200px; overflow: hidden;">
                                                        <img src="/media/default.jpg" class="img-fluid rounded-0"
                                                            alt="Missing image"
                                                            style="object-fit: cover; width: 100%; height: 100%;">
                                                    </div>
                                                    <div class="image-details mt-auto">
                                                        <h5 class="mb-2">Labels</h5>
                                                        <p class="fst-italic white-text">No labels</p>
                                                        <h5 class="mt-3 mb-2">Ratings</h5>
                                                        <p class="fst-italic white-text">No ratings</p>
                                                    </div>
                                                </div>
                                            @endfor
                                        </div>
                                    @endif
                                </div>

                                <div class="row justify-content-between gap-2 gap-sm-3 gap-md-4 gap-lg-5 mt-3 px-2">
                                    <button type="button" class="btn col-12 col-sm btn-success rounded-5"
                                        data-bs-toggle="modal" data-bs-target="#acceptModal-{{ $article->id }}">
                                        <p class="m-auto dark-text">Accetta articolo</p>
                                    </button>
                                    <button type="button" class="btn col-12 col-sm btn-delete rounded-5"
                                        data-bs-toggle="modal" data-bs-target="#declineModal-{{ $article->id }}">
                                        <p class="m-auto dark-text">Rifiuta articolo</p>
                                    </button>
                                </div>
                            </div>
                        </article>

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
                                        <strong class="white-text">{{ $article->title }}</strong>?
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

                        <div class="modal fade" id="declineModal-{{ $article->id }}" tabindex="-1"
                            aria-labelledby="declineModalLabel-{{ $article->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content primary-light-bg">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="declineModalLabel-{{ $article->id }}">
                                            Rifiuta
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
                    </div>
                @endforeach
            @else
                <div class="text-center my-5">
                    <h2><em>Nessun articolo da revisionare</em></h2>
                </div>
            @endif
            <div class="text-center my-5">
                <a href="{{ route('revisor.articledecline') }}" class="btn btn-home rounded-5 px-3 me-3 me-md-5">
                    <p class="m-auto p-0 px-1 dark-text">Lista articoli rifiutati</p>
                </a>
                <a href="{{ route('home') }}" class="btn btn-success rounded-5 px-3 ms-3 ms-md-5">
                    <p class="m-auto p-0 px-1 dark-text">Torna all'homepage</p>
                </a>
            </div>
        </div>
    </main>
</x-layout>
