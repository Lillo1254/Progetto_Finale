<x-layout>
 @forelse ($articles as $article)
    <h1>Articolo Ricercato {{ $article->name }}/h1>
    
     
 @empty
     <p>Nessun articolo corrispondente alla ricerca.</p>
 @endforelse

</x-layout>