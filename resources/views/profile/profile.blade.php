<x-layout titlePage="Profilo Utente - {{ auth()->user()->name }}">
    <main class="primary-bg min-vh-100 pt-3">
        @if (session('message'))
            <div class="alert alert-success dark-text m-0 mb-4 rounded-0">
                {{ session('message') }}
            </div>
        @endif
        <article class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="card rounded-0 p-3 pb-0 mt-3 primary-light-bg">
                        <div class="card-body text-center">
                            <h1 class="secondary-text display-5">Profilo Utente</h1>
                            <hr class="my-3 white-text">
                            <h4 class="secondary-text pt-2"> Nome: {{ auth()->user()->name }}</h4>
                            <h4 class="secondary-text pb-2"> Email: {{ auth()->user()->email }}</h4>
                            <p class="secondary-text fw-bold white-text pb-0"> Articoli creati:
                                {{ auth()->user()->articles()->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <section class="my-4">
                <h2 class="text-center secondary-text py-3"><i class="fas fa-shopping-cart"></i> I tuoi Articoli</h2>
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8">
                        @if ($user->articles->isEmpty())
                            <p class="text-danger text-center"><em>Nessun articolo inserito</em></p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped table-sm border-0 primary-light-bg w-100">
                                    <thead class="table-dark">
                                        <tr>
                                            <th class="fw-bold p-2 primary-light-bg">Titolo</th>
                                            <th class="fw-bold p-2 primary-light-bg">Prezzo</th>
                                            <th class="fw-bold p-2 primary-light-bg">Categorie</th>
                                            <th class="hide fw-bold p-2 primary-light-bg">Descrizione</th>
                                            <th class="hide fw-bold p-2 primary-light-bg w-15">Data</th>
                                            <th class="fw-bold p-2 primary-light-bg text-start w-auto">Azioni</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($articles as $article)
                                            <tr>
                                                <td class="p-2 primary-light-bg">{{ $article->title }}</td>
                                                <td class="p-2 primary-light-bg">{{ $article->price }}</td>
                                                <td class="p-2 primary-light-bg">{{ $article->category->name }}</td>
                                                <td class="p-2 hide primary-light-bg">{{ Str::limit($article->description, 50) }}</td>
                                                <td class="p-2 hide primary-light-bg w-15">{{ $article->created_at->format('d/m/Y') }}</td>
                                                <td class="p-2 primary-light-bg text-start w-auto">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <a href="{{ route('article.show', $article) }}"
                                                            class="btn rounded-5 btn-form btn-sm">
                                                            <i class="bi bi-eye dark-text"></i>
                                                        </a>
                                                        <a href="{{ route('article.edit', $article) }}"
                                                            class="btn rounded-5 btn-success btn-sm">
                                                            <i class="bi bi-pencil dark-text"></i>
                                                        </a>
                                                        <button type="button" class="btn rounded-5 btn-delete btn-sm"
                                                            data-bs-toggle="modal" data-bs-target="#deleteModal">
                                                            <i class="bi bi-trash dark-text"></i>
                                                        </button>

                                                        <!-- modale -->
                                                        <div class="modal fade" id="deleteModal" tabindex="-1"
                                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content primary-light-bg">

                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="deleteModalLabel">
                                                                            Conferma
                                                                            eliminazione</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Chiudi"></button>
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        Sei sicuro di voler eliminare questo
                                                                        articolo? Questa azione non può essere
                                                                        annullata.
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <form
                                                                            action="{{ route('article.destroy', $article) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="btn rounded-5 btn-delete">
                                                                                <p class="dark-text m-0 px-2">Conferma
                                                                                    eliminazione</p>
                                                                            </button>
                                                                        </form>

                                                                        <button type="button"
                                                                            class="btn rounded-5 btn-form"
                                                                            data-bs-dismiss="modal">
                                                                            <p class="dark-text m-0 px-2">Annulla</p>
                                                                        </button>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        </article>
    </main>
</x-layout>
