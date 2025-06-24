<div class="primary-bg">

    <div class="container-fluid overflow-hidden p-0">
        <div class="row mx-0 g-0">

            <div class="col-12 mx-0 image-home position-relative p-1" data-aos="fade-down">

                <h1 class="position-absolute top-50 translate-middle-y secondary-text display-3   " data-aos="fade-down">
                    Benvenuti nel sito</h1>
            </div>

            <div class="row justify-content-end">

                <div class="col-lg-8 col-md-8 col-12 primary-bg py-5">




                    <div class="mt-4" data-aos="fade-left">
                        <h2 class="secondary-text fw-bold text"> Trova le migliori offerte per te!</h2>
                        <p class=" fw-bold fs-5">
                            Scopri una vasta gamma di prodotti selezionati con cura per offrirti qualità e convenienza.
                            Approfitta delle nostre offerte esclusive e rendi il tuo shopping un'esperienza unica! 🎉
                        </p>
                        <a class="btn btn-form" href="#">Inizia lo Shopping</a>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-12 col-md-6 col-lg-6">

                    <!-- Banner Promozionale -->
                    <div class="mt-5" data-aos="zoom-in">
                        <div class="alert alert-warning text-center text-dark fw-bold fs-4 py-3 rounded-4 shadow-lg">
                            🎉 Offerte Speciali! Saldi fino al 50% su prodotti selezionati! 🎉
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-end">
                <div class="col-12 col-md-6 col-lg-6">

                    <!-- Ultimi Annunci -->
                    <div class="mt-5">
                        <h2 class="text-center secondary-text fw-bold">Ultimi Annunci</h2>
                        <div class="row">
                            @foreach ($articles as $article)
                                <div class="col-12 col-md-6 col-lg-5" data-aos="fade-left" data-aos-delay="200">
                                    <div class="card-categories card mb-3 h-100 ">
                                        <div class="card-body primary-light-bg d-flex flex-column justify-content-between">
                                            <h5 class="card-title ">{{ $article->title }}</h5>
                                            <p class="card-text "> Prezzo: €{{ number_format($article->price, 2) }}</p>
                                            <p class="card-text ">{{ Str::limit($article->description, 100) }}</p>
                                            <a href="{{ route('article.show', $article->id) }}"
                                                class="btn btn-primary">Vedi Dettagli</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>





</div>
