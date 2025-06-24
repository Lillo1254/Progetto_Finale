<x-layout>
    <div class="container-fluid mt-5">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-12 col-md-6 col-lg-5 d-flex flex-column align-items-center justify-content-center">
                <h1 class="text-dark">Dettagli articolo: {{ $article->title }}</h1>
                <h2 class="text-dark">Inserito da:</h2>
                <h5 class="text-dark">{{ $article->user->name }}</h5>
                <p class="text-dark">{{ $article->description }}</p>
                <p class="text-dark fw-bold">💰 Prezzo: € {{ number_format($article->price, 2) }}</p>
            </div>
        </div>
    </div>

    {{-- Carosello immagini --}}
    <div class="container-fluid">
      <div class="row w-100 justify-content-center align-items-center">
        <div class="col-12 col-md-6 col-lg-6 d-flex justify-content-center align-items-center ">
          <div id="articleCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://picsum.photos/500/401" class="d-block img-fluid rounded" alt="Immagine articolo">
            </div>
            <div class="carousel-item active">
                <img src="https://picsum.photos/500/402" class="d-block img-fluid rounded" alt="Immagine articolo">
            </div>
            <div class="carousel-item active">
                <img src="https://picsum.photos/500/403" class="d-block img-fluid rounded" alt="Immagine articolo">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#articleCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Precedente</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#articleCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Successivo</span>
        </button>
    </div>
        </div>
      </div>
    </div>
</x-layout>
