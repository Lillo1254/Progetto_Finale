<x-layout titlePage="Modifica Articolo">
    <div class="primary-bg min-vh-100">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h1 class="secondary-text display-3 pt-5 text-center">Modifica articolo</h1>
                </div>
            </div>

            <div class="row justify-content-center mb-5">
                <div class="col-12 col-md-10 col-lg-8">
                    <form class="primary-light-bg p-5 rounded-0" action="{{ route('article.update', $article) }}"
                        method="POST">
                        @csrf
                        @method('PUT')

                        @if ($errors->any())
                            <div class="alert alert-danger m-0 mb-4">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="title" class="form-label">Titolo</label>
                            <input type="text" name="title" id="title" class="form-control rounded-0"
                                value="{{ old('title', $article->title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Prezzo</label>
                            <input type="number" name="price" id="price" class="form-control rounded-0"
                                value="{{ old('price', $article->price) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Descrizione</label>
                            <textarea name="description" id="description" class="form-control rounded-0" required>{{ old('description', $article->description) }}</textarea>
                        </div>

                        <!-- Categoria -->
                        <label for="category" class="form-label">Categoria</label>
                        <div class="row justify-content-center ">
                            @foreach ($categories as $category)
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input  " type="radio" name="category_id"
                                            id="category-{{ $category->id }}" value="{{ $category->id }}"
                                            {{ old('category_id', $article->category_id ?? '') == $category->id ? 'checked' : '' }}>
                                        <label class="form-check-label  " for="category-{{ $category->id }}">
                                            {{ $category->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="d-flex flex-column flex-lg-row align-items-center justify-content-between mt-5">
                            <button type="submit" class="btn rounded-5 btn-success px-4">
                                <p class="m-auto p-0 dark-text">Salva modifiche</p>
                            </button>


                            <button type="button" class="btn rounded-5 btn-delete px-4 " data-bs-toggle="modal"
                                data-bs-target="#deleteModal">
                                <p class="m-auto p-0 dark-text">Elimina articolo</p>
                            </button>
                            <a href="{{ route('article.catalogo') }}" class="btn rounded-5 btn-form px-5"><p class="m-auto p-0 dark-text">Annulla</p></a>
                        </div>
                    </form>
                </div>
            </div>
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
</x-layout>
