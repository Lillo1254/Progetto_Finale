<x-layout>
    <div class="primary-bg min-vh-100 py-5">
        @if(session()->has('message'))
<div>{{ session('message') }}</div>
@endif
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                  
                    <div class="card shadow-lg rounded-4 p-4 primary-light-bg">
                        <div class="card-body text-center">
                            <h1 class="secondary-text fw-bold"><i class="fas fa-user-circle"></i> Profilo Utente</h1>
                            <hr class="my-4">

                            
                            <h3 class="secondary-text"><i class="fas fa-user"></i> Nome: {{ auth()->user()->name }}</h3>
                            <h4 class="secondary-text"><i class="fas fa-envelope"></i> Email:
                                {{ auth()->user()->email }}</h4>
                            <p class="secondary-text fw-bold"><i class="fas fa-box"></i> Articoli creati:
                                {{ $user->articles()->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="mt-5">
                <h2 class="text-center secondary-text fw-bold"><i class="fas fa-shopping-cart"></i> I tuoi Articoli</h2>
                <div class="row gy-4">
                    @forelse ($user->articles as $article)
                        <div class="col-md-4" data-aos="fade-up">
                            <div class="card primary-light-bg shadow-sm mb-4 h-100 d-flex flex-column">
                                <div class="card-body flex-grow-1">
                                    <h5 class="card-title secondary-text">{{ $article->title }}</h5>
                                    <p class="card-text"> Prezzo: €{{ number_format($article->price, 2) }}</p>
                                    <p class="card-text">{{ Str::limit($article->description, 100) }}</p>
                                </div>
                                <div class="card-footer bg-transparent border-0 text-center">
                                    <a href="{{ route('article.show', $article) }}" class="btn btn-form w-100">Vedi
                                        Dettagli</a>
                                </div >
                            </div  >
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p class="text-danger"><em>Nessun articolo inserito</em></p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-layout>
