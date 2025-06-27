<x-layout>
    <div class="primary-bg min-vh-100 py-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    
                        <div class="card-body text-center">
                            <h1 class="secondary-text fw-bold"><i class="fas fa-shopping-cart"></i> Articoli Rifiutati
                            </h1>
                            <hr class="my-3">
                        </div>
                    
                </div>
            </div>

            <div class="mt-4">
                
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @if ($articles->isEmpty())
                            <p class="text-danger text-center"><em>Nessun articolo rifiutato</em></p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped table-sm border-0 primary-light-bg w-100">
                                    <thead class="table-dark">
                                        <tr>
                                            <th class="fw-bold p-2 primary-light-bg">Titolo</th>
                                            <th class="fw-bold p-2 primary-light-bg">Prezzo</th>
                                            <th class="fw-bold p-2 primary-light-bg">Categorie</th>
                                            <th class="fw-bold p-2 primary-light-bg">Descrizione</th>
                                            <th class="fw-bold p-2 primary-light-bg w-15">Data</th>
                                            <th class="fw-bold p-2 primary-light-bg text-start w-auto">Azioni</th>
                                        </tr>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($articles as $article)
                                            <tr>
                                                <td class="p-2  primary-light-bg">{{ $article->title }}</td>
                                                <td class="p-2  primary-light-bg">{{ $article->price }}</td>
                                                <td class="p-2  primary-light-bg">{{ $article->category->name }}</td>
                                                <td class="p-2  primary-light-bg">{{ Str::limit($article->description, 50) }}</td>
                                                <td class="p-2  primary-light-bg w-15">{{ $article->created_at->format('d/m/Y') }}</td>
                                                <td class="p-2  primary-light-bg text-start w-auto">
                                                    <div class="d-flex align-items-center gap-2">
                                                         <a href="{{ route('article.show', $article) }}" class="btn btn-form btn-sm">
                                                            <i class="bi bi-eye primary-text"></i>
                                                        </a>
                                                        <form
                                                            action="{{ route('revisor.annulla', ['article' => $article->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="btn btn-form btn-sm">
                                                                <i
                                                                    class="bi bi-arrow-counterclockwise text-dark"></i>
                                                                Ripristina
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
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('revisor.profile', Auth::user()) }}" class="btn btn-success">
                    <i class="bi bi-arrow-left"></i> Torna Indietro
                </a>
            </div>
        </div>
    </div>
</x-layout>
