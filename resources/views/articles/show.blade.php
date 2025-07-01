<x-layout titlePage="{{ $article->title }}">
    <main class="primary-bg min-vh-100 py-5">
        <div class="container">
            <div class="row justify-content-center p-3">
                <div class="col-12 col-lg-10 primary-light-bg p-3 p-md-5 rounded-0">
                    <article class="row flex-column-reverse flex-md-row">
                        
                        <div class="col-12 col-md-6 overflow-hidden">
                            <h1 class="secondary-text display-5">{{ $article->title }}</h1>
                            <h6 class="white-text px-1">Prezzo: {{ number_format($article->price, 2) }} €</h6>                        
                            <h6 class="white-text px-1">Categoria: <a href="{{ route('category.articles', $article->category) }}" class="text-decoration-none">{{ $article->category->name ?? 'Nessuna categoria' }}</a></h6>
                            <p class="white-text mt-3 px-1">{{ $article->description }}</p>    
                        </div>

                        @if ($article->images->count()>0)
                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                            <div id="articleCarousel" class="carousel slide shadow-sm" data-bs-ride="carousel">
                                <div class="carousel-inner rounded-4">
                                    @foreach ($article->images as $key => $image)
                                        <div class="carousel-item @if($loop->first) active @endif">
                                            <img src="{{ $image->getUrl(300, 300) }}" class="d-block w-100 rounded shadow" alt="immagine {{ $key + 1 }} dell'articolo {{ $article->title }}">
                                        </div>
                                    @endforeach
                                </div>
                                
                            </div>
                        </div>
                    </article>

                   
                    <div class="text-center mt-3 mt-md-5">
                        <a href="{{ route('article.catalogo') }}" class="btn btn-form px-4 rounded-5"><p class="m-auto p-0 px-2 dark-text">Torna al catalogo</p></a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>