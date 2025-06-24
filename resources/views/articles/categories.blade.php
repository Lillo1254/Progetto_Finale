<x-layout> 
 
 @forelse ($articles as $article)
     <div class="card" style="width: 18rem;">
  {{-- <img src="..." class="card-img-top" alt="..."> --}}
  <div class="card-body">
    <h5 class="card-title">{{ $article->name }}</h5>
    <p class="card-text">{{ $article->description }}</p>
    <a href="{{ route('article.show', $article) }}" class="btn btn-primary">visualizza articolo</a>
  </div>
</div>
 @empty
     <h4 ><em>Nessun articolo trovato</em></h4>
 @endforelse 
 
 </x-layout>