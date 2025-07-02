<x-layout titlePage="Categoria {{ $categoryName }}">
    
    <main class="primary-bg min-vh-100">
        <div class="container primary-bg pb-5 ">
            <div class="row justify-content-center w-100 mb-5">
    
                @if ($articles->count() > 0)
                
                <h1 class="text-center secondary-text display-3 pt-5">
                    Sei nella sezione {{ $categoryName }}
                </h1>
                @else
                <h4 class="text-center secondary-text mt-5 py-5">
                    <em>Nessun articolo presente per questa categoria</em>
                </h4>
                <a href="{{ route('article.catalogo') }}" class="btn col-12 col-sm-6 col-md-4 col-lg-2 btn-form rounded-5 px-3 mx-3">
                    <p class="dark-text m-0 p-0">Torna al catalogo</p>
                </a>
                @endif
            </div>
    
                <article class="row">
                    @foreach ($articles as $article)
                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <x-card :article="$article"/>
                        </div>
                    @endforeach
                </article>
    
    
        </div>
    </main>
</x-layout>
