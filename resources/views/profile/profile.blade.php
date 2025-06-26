<x-layout>
    <div class="primary-bg min-vh-100 py-3">
        @if (session()->has('message'))
            <div class="text-center text-success ">{{ session('message') }}</div>
        @endif
        <div class="container pb-4">
            <div class="row justify-content-center">
                <div class="col-md-8 pt-5 pb-2">
                    <div class="card p-3 primary-light-bg rounded-0">
                        <div class="card-body text-center">
                            <h1 class="secondary-text "><i class="fas fa-user-circle"></i> Profilo Utente</h1>
                            <hr class="my-3">
                            <h3 class="secondary-text"><i class="fas fa-user"></i> Nome: {{ auth()->user()->name }}</h3>
                            <h4 class="secondary-text"><i class="fas fa-envelope"></i> Email:
                                {{ auth()->user()->email }}</h4>
                            <p class="secondary-text "><i class="fas fa-box"></i> Articoli creati:
                                {{ $user->articles()->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="mt-4 row justify-content-center">
                <h2 class="text-center secondary-text py-3 col-12"></i> I tuoi Articoli</h2>
                <div class="col-12"> 
                    @if ($user->articles->isEmpty())
                        <p class="text-danger text-center"><em>Nessun articolo inserito</em></p>
                    @else
                        <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="p-2 px-3 secondary-border primary-light-bg">Titolo</th>
                                            <th class="p-2 px-3 secondary-border primary-light-bg">Prezzo</th>
                                            <th class="p-2 px-3 secondary-border primary-light-bg">Categorie</th>
                                            <th class="p-2 px-3 secondary-border primary-light-bg">Descrizione</th>
                                            <th class="p-2 px-3 secondary-border primary-light-bg w-15">Data</th>
                                            <th class="p-2 px-3 secondary-border primary-light-bg text-start w-auto">Azioni</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach ($user->articles as $article)
                                            <tr>
                                                <td class="p-2 px-3 secondary-border primary-light-bg">{{ $article->title }}</td>
                                                <td class="p-2 px-3 secondary-border primary-light-bg">
                                                    €{{ number_format($article->price, 2) }}</td>
                                                <td class="p-2 px-3 secondary-border primary-light-bg">{{ $article->category->name }}</td>
                                                <td class="p-2 px-3 secondary-border primary-light-bg">
                                                    {{ Str::limit($article->description, 50) }}</td>
                                                <td class="p-2 px-3 secondary-border primary-light-bg w-15">
                                                    {{ $article->created_at->format('d/m/Y') }}</td>
                                                <td class="p-2 px-3 secondary-border primary-light-bg text-start w-auto">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <a href="{{ route('article.show', $article) }}"
                                                            class="btn btn-form btn-sm">
                                                            <i class="bi bi-eye primary-text"></i>
                                                        </a>
                                                        <a href="{{ route('article.edit', $article) }}"
                                                            class="btn btn-warning btn-sm">
                                                            <i class="bi bi-pencil primary-text"></i>
                                                        </a>
                                                        <form action="{{ route('article.destroy', $article) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Sei sicuro di voler eliminare questo articolo?')">
                                                                <i class="bi bi-trash primary-text"></i>
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
    </div>
</x-layout>
