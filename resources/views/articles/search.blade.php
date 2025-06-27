<x-layout>
    <div class="container-fluid primary-bg">
    
        <h1 class="text-center secondary-text display-5">risultati per "{{ $query }}"</h1>
        <div class="row justify-content-center">
@forelse ($articles as $article)
                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div
                                class="card position-relative p-0 border-0 primary-light-bg rounded-0 h-100 overflow-hidden">
    
                                <!-- ? IMAGE -->
                                <a href="{{ route('article.show', $article) }}" class="card-link z-1">
                                    <img src="https://picsum.photos/id/{{ $article->id }}/600/500" alt=""
                                        class="article-img rounded-0 z-1 p-0 m-0 w-100">
                                </a>
    
                                <!-- ? CARD BODY -->
                                <div class="card-body p-4 z-2 primary-light-bg pb-0">
                                    <a href="{{ route('article.show', $article) }}"
                                        class="card-link card-title z-1 text-decoration-none white-text fw-light fs-3">{{ $article->title }}</a>
                                    <h5 class="card-text fw-light pt-2 fs-6">{{ $article->price }} €</h5>
                                    <a href="{{ route('category.articles', $article->category) }}"
                                        class="text-decoration-none card-text secondary-text">{{ $article->category->name }}</a>
                                </div>
    
                                <!-- ? CARD BUTTONS -->
                                @auth
                                    @if ($article->user_id === auth()->id())
                                        <hr class="secondary-text">
                                        <div
                                            class="article-buttons z-3 p-4 pt-2 row align-items-center justify-content-between">
                                            <div class="col-6">
                                                <a href="{{ route('article.edit', $article) }}"
                                                    class="btn-form btn w-100 rounded-5">
                                                    <p class="m-auto p-0 px-3 text-dark">Modifica</p>
                                                </a>
                                            </div>
                                            <div class="col-6">
                                                <button type="button" class="btn btn-danger rounded-5 w-100 px-4"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $article->id }}">
                                                    Elimina
                                                </button>
                                            </div>
                                        </div>
    
                                        {{-- Modale eliminazione --}}
                                        <div class="modal fade" id="deleteModal-{{ $article->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Conferma eliminazione</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Chiudi"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Sei sicuro di voler eliminare questo articolo? Questa azione non può
                                                        essere annullata.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Annulla</button>
                                                        <form action="{{ route('article.destroy', $article) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Conferma
                                                                elimina</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Fine modale --}}
                                    @endif
                                @endauth
    
                            </div>
                        </div>
                    @empty
                        <h4 class="text-center secondary-text"><em>Nessun articolo trovato</em></h4>
                    @endforelse
                    </div>
</div>
</x-layout>