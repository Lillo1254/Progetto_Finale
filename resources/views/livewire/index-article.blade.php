<div class="primary-bg min-vh-100">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <h1 class="secondary-text display-3 pt-5 text-center">All articles</h1>
            </div>
        </div>
        <div class="row">
            @foreach ($articles as $article)
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card position-relative p-0 border-0 primary-light-bg rounded-4 h-100 overflow-hidden">
                        <a href="{{ route('article.show', $article) }}"
                            class="position-absolute card-link w-100 h-100 z-2"></a>
                        <img src="https://picsum.photos/id/{{$article->id}}/500/400" width="auto" height="auto" alt="" class="article-img rounded-4 z-1 p-0 m-0">
                        <div class="card-body p-4 z-1 primary-light-bg pb-0">
                            <h2 class="card-title white-text fw-light">{{ $article->title }}</h2>
                            <h5 class="card-title fw-light">{{ $article->price }} €</h5>
                            <p class="card-text mt-2 secondary-text">{{ $article->category->name }}</p>
                            
                            @guest
                                <div class="mb-3"></div>
                            @endguest

                        </div>
                        @auth
                           @if ($article->user_id === auth()->id())
                        <hr class="secondary-text">
                        <div class="article-buttons z-3 p-4 pt-0">
                            <a href="{{ route('article.edit', $article) }}" class="btn-form btn mt-1 rounded-3">
                                <p class="m-auto p-0 px-3 text-dark">Edit</p>
                            </a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
  Elimina articolo
</button>
                        </div>

{{-- modale --}}
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Conferma eliminazione</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
      </div>

      <div class="modal-body">
        Sei sicuro di voler eliminare questo articolo? Questa azione non può essere annullata.
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>

        <form action="{{ route('article.destroy', $article) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Conferma elimina</button>
        </form>
      </div>

    </div>
  </div>
</div>
{{-- fine mdoale --}}

                            @endif
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center mt-3">
            {{ $articles->links() }}
        </div>
    </div>



    
</div>


