<x-layout titlePage="Modifica Articolo">
    <main class="primary-bg min-vh-100">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h1 class="secondary-text display-3 pt-5 text-center">{{ __('ui.modifica_articolo') }}</h1>
                </div>
            </div>

            <article class="row justify-content-center mb-5">
                <div class="col-12 col-md-10 col-lg-8">
                    <form class="primary-light-bg p-5 rounded-0" action="{{ route('article.update', $article) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label white-text">{{ __('ui.titolo') }}</label>
                            <input type="text" name="title" id="title" class="form-control rounded-0"
                                value="{{ old('title', $article->title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label white-text">{{ __('ui.prezzo') }}</label>
                            <input type="number" name="price" id="price" class="form-control rounded-0"
                                value="{{ old('price', $article->price) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label white-text">{{ __('ui.descrizione') }}</label>
                            <textarea name="description" id="description" class="form-control rounded-0" required>{{ old('description', $article->description) }}</textarea>
                        </div>

                        <!-- Categoria -->
                        <label for="category" class="form-label white-text">{{ __('ui.categoria') }}</label>
                        <div class="row justify-content-center ">
                            @foreach ($categories as $category)
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="category_id"
                                            id="category-{{ $category->id }}" value="{{ $category->id }}"
                                            {{ old('category_id', $article->category_id ?? '') == $category->id ? 'checked' : '' }}>
                                        <label class="form-check-label white-text" for="category-{{ $category->id }}">
                                            {{ $category->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>



                        <div class="row justify-content-between gap-2 gap-sm-3 gap-md-4 gap-lg-5 mt-5 px-2">
                            <button type="submit" class="col-12 col-sm btn rounded-5 btn-success">
                                <p class="m-auto p-0 dark-text">{{ __('ui.salva_modifiche') }}</p>
                            </button>

                            <button type="button" class="col-12 col-sm btn rounded-5 btn-delete" data-bs-toggle="modal"
                                data-bs-target="#deleteModal">
                                <p class="m-auto p-0 dark-text">{{ __('ui.elimina_articoli') }}</p>
                            </button>

                            <a href="{{ route('article.catalogo') }}" class="col-12 col-sm btn rounded-5 btn-form">
                                <p class="m-auto p-0 dark-text">Annulla</p>
                            </a>
                        </div>
                    </form>
                </div>
            </article>
        </div>



        {{-- modale --}}
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content primary-light-bg">

                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">{{ __('ui.conferma_eliminazione') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
                    </div>

                    <div class="modal-body">
                        <p class="white-text m-0">
                            {{ __('ui.conferma_eliminazione') }}
                        </p>
                    </div>

                    <div class="modal-footer">

                        <form action="{{ route('article.destroy', $article) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn rounded-5 btn-delete">
                                <p class="dark-text m-0 px-2">{{ __('ui.elimina_articolo') }}</p>
                            </button>
                        </form>

                        <button type="button" class="btn rounded-5 btn-form" data-bs-dismiss="modal">
                            <p class="dark-text m-0 px-2">{{ __('ui.annulla') }}</p>
                        </button>
                    </div>

                </div>
            </div>
        </div>
        {{-- fine mdoale --}}
</x-layout>
