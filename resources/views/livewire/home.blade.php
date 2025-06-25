<div class="primary-bg">

    <div class="container-fluid overflow-hidden p-0 m-0">
        <div class="row mx-0 g-0 w-100 px-0 mx-0">

            <div class="col-12 mx-0 image-home position-relative p-1" data-aos="fade-down">
                <h1 class="position-absolute top-50 translate-middle-y secondary-text display-3" data-aos="fade-down">Benvenuti nel sito</h1>
            </div>
        </div>
        <div class="row justify-content-center justify-content-md-end w-100 px-0 mx-0">
            <div class="col-12 col-md-8 primary-bg py-5">
                <div class="mt-4 d-flex flex-column align-items-center align-items-md-end" data-aos="fade-left">
                    <h2 class="secondary-text fw-bold text-center text-md-end"> Trova le migliori offerte per te!</h2>
                    <p class=" fw-bold fs-5 text-center text-md-end">
                            Scopri una vasta gamma di prodotti selezionati con cura per offrirti qualità e convenienza.
                            Approfitta delle nostre offerte esclusive e rendi il tuo shopping un'esperienza unica! 🎉
                    </p>
                    <a class="btn btn-form w-md-25" href="#">Inizia lo Shopping</a>
                </div>
            </div>
        </div>
        <div class="row  w-100 px-0 mx-0">
            <div class="col-12 col-md-8">

                <!-- Banner Promozionale -->
                <div class="mt-3 mt-md-5" data-aos="zoom-in">
                    <div class="alert alert-warning text-center text-dark fw-bold fs-4 py-3 rounded-4 shadow-lg">
                        🎉 Offerte Speciali! Saldi fino al 50% su prodotti selezionati! 🎉
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-end justify-content-sm-center mt-5 w-100 px-0 mx-0">
            <div class="col-12 col-md-6 col-lg-6">
                <!-- Ultimi Annunci -->
                <h2 class="text-center secondary-text fw-bold pb-3">Ultimi Annunci</h2>
            </div>
        </div>

        <div class="row py-5 justify-content-md-evenly  mx-0 mx-sm-auto px-0 w-100 ">
            @foreach ($articles as $article)
                <div class="col-12 col-md-3 col-lg-2 mb-3" data-aos="fade-left" data-aos-delay="200">
                    <div class="card-categories card h-100 ">
                        <img src="https://picsum.photos/200" class="img-fluid" alt="">
                        <div class="card-body primary-light-bg d-flex flex-column justify-content-between ">
                            <h5 class="card-title text-center">{{ $article->title }}</h5>
                            <p class="card-text text-center"> Prezzo: €{{ number_format($article->price, 2) }}</p>
                            <p class="card-text text-center">{{ Str::limit($article->description, 100) }}</p>
                            <a href="{{ route('article.show', $article->id) }}" class="btn btn-form card-scale-btn">Vedi Dettagli</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>  

    </div>
</div>
