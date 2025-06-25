<x-layout>
    <h1 class="text-dark">Nome : {{ auth()->user()->name }}</h1>
    <h3 class="text-dark">Email : {{ auth()->user()->email }}</h3>
    <p class="text-dark">articoli create: {{ $user->articles()->count() }} </p>
    <p class="text-dark">articoli inseriti: @forelse ($user->articles as $article)
            <a href="{{ route('article.show', $article) }}" class="text-decoration-none text-warning">{{ $article->title }}</a><br>
        @empty
            <p><em class="text-danger">Nessun articolo inserito</em></p>
        @endforelse
    </p>
</x-layout>
