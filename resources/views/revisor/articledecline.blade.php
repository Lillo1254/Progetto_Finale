<x-layout>
    <div class="container py-4">
        <table class="table table-bordered table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th>Titolo</th>
                    <th>Descrizione</th>
                    <th>Prezzo</th>
                    <th>Azione</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($articles as $article)
                    <tr>
                        <td class="text-dark">{{ $article->title }}</td>
                        <td class="text-dark">{{ $article->description }}</td>
                        <td class="text-dark">{{ $article->price }} €</td>
                        <td>
                            <form action="{{ route('revisor.annulla', ['article' => $article->id]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-warning">
                                    Resume
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <h2><em>Nessun articolo rifiutato</em></h2>
                @endforelse
            </tbody>
        </table>
    </div>
    </table>
    <a href="{{ route('revisor.profile', Auth::user()) }}" class="btn btn-success">torna indietro</a>
</x-layout>
