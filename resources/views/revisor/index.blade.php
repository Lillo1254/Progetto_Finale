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
                        @if ($article->images->count())
                        <div class="col-12 col-sm-10 col-lg-4 col-xl-4 text-center">
                            <div class="row flex-wrap">
                            @foreach ($article->images as $key => $image)
                                <div class="col-6 col-sm-4text-center">
                                    <img src="{{ $image->getUrl(300, 300) }}" class="img-fluid rounded-0"
                                        alt="immagine {{ $key + 1 }} dell'articolo {{ $article->title }}">
                                </div>
                            @endforeach
                            </div>
                        </div>
                        @else
                        <div class="col-12 col-sm-10 col-lg-4 col-xl-4 text-center">
                            <div class="row flex-wrap">
                                @for ($i = 0; $i < 6; $i++)
                                <div class="col-6 col-sm-4 text-center">
                                    <img src="/media/default.jpg" class="img-fluid rounded-0 pb-4" alt="Missing image">
                                </div>                                    
                                @endfor
                            </div>
                        </div>
                        @endif
                        <article class="col-12 col-md-10 col-lg-8 col-xl-6">
                            <div class="card primary-light-bg p-4 rounded-0 h-100">
                                <div class="card-body p-0">                                   
                                    <h2 class="pb-2">{{ $article->title }}</h2>
                                    <p class="white-text"><strong class="white-text">Categoria:</strong> {{ $article->category->name }}</p>
                                    <p class="white-text"><strong class="white-text">Prezzo:</strong> {{ $article->price }}€</p>
                                    <p class="white-text"><strong class="white-text">Data inserimento:</strong> {{ $article->created_at->format('d/m/Y') }}</p>
                                    <p class="white-text"><strong class="white-text">Descrizione:</strong> {{ $article->description }}</p>
                                </div>

                                <div class="row justify-content-between gap-2 gap-sm-3 gap-md-4 gap-lg-5 mt-3 px-2">
                                    <!-- <a type="button" class="btn col-12 col-sm btn-form rounded-5" href="">
                                        <p class="m-auto dark-text">Vedi dettagli</p>
                                    </a> -->
                                    <button type="button" class="btn col-12 col-sm btn-success rounded-5" data-bs-toggle="modal"
                                        data-bs-target="#acceptModal-{{ $article->id }}">
                                        <p class="m-auto dark-text">Accetta articolo</p>
                                    </button>
                                    <button type="button" class="btn col-12 col-sm btn-delete rounded-5" data-bs-toggle="modal"
                                        data-bs-target="#declineModal-{{ $article->id }}">
                                        <p class="m-auto dark-text">Rifiuta articolo</p>
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
