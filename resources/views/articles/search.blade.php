<x-layout>
    <div class="min-vh-100">
    
 @forelse ($articles as $article)

  
    
     
 @empty
     <p>Nessun articolo corrispondente alla ricerca.</p>
 @endforelse
</div>
</x-layout>