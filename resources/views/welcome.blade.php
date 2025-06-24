<x-layout> 
 
<livewire:home />
<div class="primary-bg vh-100">
        <h1 class="secondary-text display-3 pt-5 text-center">Benvenuti nel sito</h1>
    </div>
    <div class="container mt-5">
        <h2 class="text-center text-primary fw-bold">Ultimi Annunci</h2>
        <div class="row">
            @foreach($articles as $article)
                <div class="col-md-4">
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">💰 Prezzo: €{{ number_format($article->price, 2) }}</p>
                            <p class="card-text">{{ Str::limit($article->description, 100) }}</p> 
                            <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary">Vedi Dettagli</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
     </div>
    
     
   

 
 </x-layout>