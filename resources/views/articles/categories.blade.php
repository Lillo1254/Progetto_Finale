<x-layout>
    <div class="container-fluid primary-bg">
        <div class="row justify-content-center w-100">

            @if (count($articles) > 0)
                <h1 class="text-center secondary-text mt-2">
                    Sei nella Sezione {{ $articles[0]->category->name }}
                </h1>
            @else
                <h4 class="text-center secondary-text mt-2">
                    <em>Nessun articolo presente per questa categoria</em>
                </h4>
            @endif

            @forelse ($articles as $article)
                <div class="col-12 col-md-8 col-lg-5 d-flex justify-content-center align-items-center">
                    <div class="card m-4 card-categories primary-light-bg card-scale" style="width: 18rem;">
                        <img src="https://picsum.photos/500/400" class="card-img-top"
                            alt="immagine relativo all'articolo {{ $article->title }}">
                        <div class="card-body d-flex flex-column -justify-content-center align-items-center">
                            <h5 class="card-title ">{{ $article->title }}</h5>
                            <p class="card-text ">{{ $article->description }}</p>
                            <a href="{{ route('article.show', $article) }}"
                                class="btn btn-form card-scale-btn">visualizza articolo</a>
                        </div>
                    </div>
                </div>
            @empty
                <h4><em>Nessun articolo trovato</em></h4>
            @endforelse


        </div>
    </div>

</x-layout>
