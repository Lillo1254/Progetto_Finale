<x-layout titlePage="Profilo Utente - {{ auth()->user()->name }}">
    <main class="primary-bg min-vh-100 py-3">
        @if (session('message'))
            <div class="alert alert-success dark-text m-0 mb-4 rounded-0">
                {{ session('message') }}
            </div>
        @endif
        <article class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card rounded-0 p-3 pb-0 mt-3 primary-light-bg">
                        <div class="card-body text-center">
                            <h1 class="secondary-text display-5">Profilo Utente</h1>
                            <hr class="my-3 white-text">
                            <h4 class="secondary-text pt-2"> Nome: {{ auth()->user()->name }}</h4>
                            <h4 class="secondary-text pb-2"> Email: {{ auth()->user()->email }}</h4>
                            <p class="secondary-text fw-bold white-text pb-0"> Articoli creati: {{ auth()->user()->articles()->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <section class="my-4">
                <h2 class="text-center secondary-text py-3"><i class="fas fa-shopping-cart"></i> I tuoi Articoli</h2>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @if ($user->articles->isEmpty())
                            <p class="text-danger text-center"><em>Nessun articolo inserito</em></p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped table-sm border-0 primary-light-bg w-100">
                                    <thead class="table-dark">
                                        <tr>
                                            <th class="fw-bold white-text p-2 primary-light-bg">Titolo</th>
                                            <th class="fw-bold white-text p-2 primary-light-bg">Prezzo</th>
                                            <th class="fw-bold white-text p-2 primary-light-bg">Categorie</th>
                                            <th class="fw-bold white-text p-2 primary-light-bg">Descrizione</th>
                                            <th class="fw-bold white-text p-2 primary-light-bg w-15">Data</th>
                                            <th class="fw-bold white-text p-2 primary-light-bg text-start w-auto">Azioni</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user->articles as $article)
                                            <tr>
                                                <td class="p-2 white-text primary-light-bg">{{ $article->title }}</td>
                                                <td class="p-2 white-text primary-light-bg">{{ $article->price }}</td>
                                                <td class="p-2 white-text primary-light-bg">{{ $article->category->name }}</td>
                                                <td class="p-2 white-text primary-light-bg">{{ Str::limit($article->description, 50) }}</td>
                                                <td class="p-2 white-text primary-light-bg w-15">{{ $article->created_at->format('d/m/Y') }}</td>
                                                <td class="p-2 white-text primary-light-bg text-start w-auto">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <a href="{{ route('article.show', $article) }}" class="btn rounded-5 btn-form btn-sm">
                                                            <i class="bi bi-eye dark-text"></i>
                                                        </a>
                                                        <a href="{{ route('article.edit', $article) }}" class="btn rounded-5 btn-success btn-sm">
                                                            <i class="bi bi-pencil dark-text"></i>
                                                        </a>
                                                        <form action="{{ route('article.destroy', $article) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn rounded-5 btn-delete btn-sm"
                                                                onclick="return confirm('Sei sicuro di voler eliminare questo articolo?')">
                                                                <i class="bi bi-trash dark-text"></i>
                                                            </button>
                                                        </form>
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
