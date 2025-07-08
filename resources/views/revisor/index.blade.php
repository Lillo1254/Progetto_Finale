<x-layout titlePage="Dashboard Revisore">
    <main class=" min-vh-100 login-register">
        <div class="container-fluid">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h1 class="secondary-text display-3 pt-5 text-shadow">
                        {{ __('ui.dashboard_revisore') }} - {{ Auth::user()->name }}
                    </h1>
                </div>
            </div>



            @if ($articles_to_check)
                <div class="row justify-content-center mb-5 gap-5">
                    @foreach ($articles_to_check->take(4) as $article)
                        <article class="col-12">
                            <div class="card primary-light-bg p-4 rounded-0 h-100">
                                <div class="card-body p-0 d-flex flex-column">
                                    <h2 class="pb-2">{{ $article->title }}</h2>
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <p class="white-text"><strong
                                                    class="white-text">{{ __('ui.categorie') }}</strong>
                                                {{ $article->category->name }}</p>
                                            <p class="white-text"><strong
                                                    class="white-text">{{ __('ui.prezzo') }}</strong>
                                                {{ $article->price }}€</p>
                                            <p class="white-text"><strong
                                                    class="white-text">{{ __('ui.data') }}</strong>
                                                {{ $article->created_at->format('d/m/Y') }}</p>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <p class="white-text"><strong
                                                    class="white-text">{{ __('ui.descrizione') }}</strong>
                                                {{ $article->description }}</p>
                                        </div>

                                    </div>

                                    @if ($article->images->count())
                                        <div class="row flex-wrap my-3 flex-grow-1">
                                            @foreach ($article->images as $key => $image)
                                                @if ($article->images->count() == 1)
                                                    <div class="col-12 col-md-4 col-lg-2 mb-4 d-flex flex-column">
                                                    @else
                                                        <div class="col-12 col-md col-lg-2 mb-4 d-flex flex-column">
                                                @endif
                                                <div class="mb-3">
                                                    <img src="{{ $image->getUrl(1024, 1024) }}"
                                                        alt="immagine {{ $key + 1 }} dell'articolo {{ $article->title }}"
                                                        class="rounded-0 z-1 p-0 m-0 w-100">
                                                </div>
                                                <div class="image-details">
                                                    @if ($image->labels)
                                                        <details>
                                                            <summary class="d-flex">
                                                                <h5 class="me-2">Labels</h5>
                                                                <i class="bi bi-triangle-fill secondary-text"
                                                                    id="details"></i>
                                                            </summary>
                                                            <div class="labels-container d-flex flex-wrap gap-2 mb-3">
                                                                @foreach ($image->labels as $label)
                                                                    <span
                                                                        class="badge bg-secondary p-2 rounded-pill label-pill">#{{ $label }}</span>
                                                                @endforeach
                                                            </div>
                                                        </details>
                                                    @else
                                                        <h5 class="secondary-text">No labels</h5>
                                                    @endif
                                                    <details class="mt-3">
                                                        <summary class="d-flex">
                                                            <h5 class="me-2">Ratings</h5>
                                                            <i class="bi bi-triangle-fill secondary-text"
                                                                    id="details"></i>
                                                        </summary>
                                                        <div class="row mt-2">
                                                            <div class="col-12 d-flex align-items-center mb-1">
                                                                <div class="text-center me-2 {{ $image->adult }}">
                                                                </div>
                                                                <span class="white-text">Adult</span>
                                                            </div>
                                                            <div class="col-12 d-flex align-items-center mb-1">
                                                                <div class="text-center me-2 {{ $image->violence }}">
                                                                </div>
                                                                <span class="white-text">Violence</span>
                                                            </div>
                                                            <div class="col-12 d-flex align-items-center mb-1">
                                                                <div class="text-center me-2 {{ $image->spoof }}">
                                                                </div>
                                                                <span class="white-text">Spoof</span>
                                                            </div>
                                                            <div class="col-12 d-flex align-items-center mb-1">
                                                                <div class="text-center me-2 {{ $image->racy }}">
                                                                </div>
                                                                <span class="white-text">Racy</span>
                                                            </div>
                                                            <div class="col-12 d-flex align-items-center mb-1">
                                                                <div class="text-center me-2 {{ $image->medical }}">
                                                                </div>
                                                                <span class="white-text">Medical</span>
                                                            </div>
                                                        </div>
                                                    </details>

                                                </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="row flex-wrap my-3 flex-grow-1">
                                    @for ($i = 0; $i < 2; $i++)
                                        <div class="col-6 col-sm-4 text-center d-flex flex-column">
                                            <div class="mb-3">
                                                <img src="/media/default.jpg" alt="Missing image"
                                                    class="rounded-0 z-1 p-0 m-0 w-100">
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

                <div class="row justify-content-center my-3 px-3 mx-1 gap-3 gap-sm-1">
                    <button type="button"
                        class="btn col-12 col-sm-4 col-md-3 col-xl-2 btn-success rounded-5 px-3 me-sm-3"
                        data-bs-toggle="modal" data-bs-target="#acceptModal-{{ $article->id }}">
                        <p class="m-auto dark-text">{{ __('ui.accetta_articolo') }}</p>
                    </button>
                    <button type="button" class="btn col-12 col-sm-4 col-md-3 col-xl-2 btn-delete rounded-5 ms-sm-3"
                        data-bs-toggle="modal" data-bs-target="#declineModal-{{ $article->id }}">
                        <p class="m-auto dark-text px-3">{{ __('ui.rifiuta_articolo') }}</p>
                    </button>
                </div>
        </div>
        </article>

        <div class="modal fade " id="acceptModal-{{ $article->id }}" tabindex="-1"
            aria-labelledby="acceptModalLabel-{{ $article->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content primary-light-bg">
                    <div class="modal-header">
                        <h1 class="modal-titlefs-5" id="acceptModalLabel-{{ $article->id }}">
                            {{ __('ui.accetta_articolo') }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ __('ui.sicuro_accetta') }}
                        <strong class="white-text">{{ $article->title }}</strong>?
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('revisor.accept', $article) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success rounded-5 px-3">
                                <p class="m-auto p-0 px-2 dark-text">{{ __('ui.accetta') }}</p>
                            </button>
                        </form>
                        <button type="button" class="btn btn-secondary rounded-5 px-3" data-bs-dismiss="modal">
                            <p class="m-auto p-0 px-2 dark-text">{{ __('ui.annulla') }}</p>
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
                            Rifiuta Articolo</h1>
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
                        <button type="button" class="btn btn-secondary rounded-5 px-3" data-bs-dismiss="modal">
                            <p class="m-auto p-0 px-2 dark-text">{{ __('ui.annulla') }}</p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        </div>
    @else
        <div class="text-center my-5">
            <h2><em>Nessun articolo da revisionare</em></h2>
        </div>
        @endif
        <div class="row justify-content-center mt-3 pb-5 px-4 mx-1 gap-3">
            <a href="{{ route('revisor.articledecline') }}"
                class="btn col-12 col-sm-4 col-md-3 col-xl-2 btn-home rounded-5 ms-sm-3 shadow-card">
                <p class="m-auto p-0 px-1 dark-text">Lista articoli rifiutati</p>
            </a>
            <a href="{{ route('home') }}"
                class="btn col-12 mx-3 col-sm-4 col-md-3 col-xl-2 btn-home rounded-5 ms-sm-3 shadow-card">
                <p class="m-auto p-0 px-1 dark-text">Torna all'homepage</p>
            </a>
        </div>
        </div>
    </main>
</x-layout>
