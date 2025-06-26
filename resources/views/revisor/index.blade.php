<x-layout>
    <div class="primary-bg min-vh-100">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h1 class="secondary-text display-3 pt-5">
                        Dashboard Revisore - {{ Auth::user()->name }}
                    </h1>
                </div>
            </div>

@if(session()->has('message'))
<div>{{ session('message') }}</div>
@endif
            @if ($articles_to_check)
                <div class="row justify-content-center">
                    @foreach ($articles_to_check->take(4) as $article)
                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="card primary-light-bg p-4 rounded-0">
                                <h2 class="pb-2">{{ $article->title }}</h2>
                                <p><strong>Autore:</strong> {{ $article->author }}</p>
                                <p><strong>Categoria:</strong> {{ $article->category->name }}</p>
                                <p><strong>Stato:</strong> {{ $article->status }}</p>

                                <div class="d-flex justify-content-between mt-3">
                                    <button type="button" class="btn btn-success rounded-5 px-3" data-bs-toggle="modal"
                                        data-bs-target="#acceptModal-{{ $article->id }}">
                                        Accetta articolo
                                    </button>
                                    <button type="button" class="btn btn-danger rounded-5 px-3" data-bs-toggle="modal"
                                        data-bs-target="#declineModal-{{ $article->id }}">
                                        Rifiuta articolo
                                    </button>
                                </div>
                            </div>
                        </div>

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
                                            <button class="btn btn-success rounded-5 px-3">Accetta</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary rounded-5 px-3" data-bs-dismiss="modal">Annulla</button>
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
                                            <button class="btn btn-danger rounded-5 px-3">Rifiuta</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary rounded-5 px-3" data-bs-dismiss="modal">Annulla</button>
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
            <div class="text-center">
                <a href="{{ route('home') }}" class="btn btn-success rounded-5 px-3 mt-3">Torna all'homepage</a>
            </div>
        </div>
    </div>
</x-layout>
