<div class="primary-bg">

    <main class="mx-0 image-home position-relative p-1">
        <div class="container-fluid container h-100 d-flex flex-column justify-content-center" data-aos-duration="2000"
            data-aos-easing="ease-cubic" data-aos="fade-right">
            <h1 class="header-text text-shadow display-5">ReBrand</h1>
            <h6 class="p-1 pb-0 white-text text-shadow">Trasforma gli oggetti che non usi più in quello che desideri davvero,</h6>
            <h6 class="p-1 pt-0 white-text text-shadow">in un'unica piattaforma sicura.</h6>
            <h4 class="p-1 header-text text-shadow">Il tuo mercato, a modo tuo.</h4>
        </div>
    </main>

    <div class="container-fluid container">
        <article class="row justify-content-center justify-content-md-end">
            <div class="col-12 col-md-8 primary-bg py-5">
                <div class="mt-4 d-flex flex-column align-items-center align-items-md-end" data-aos-duration="2000"
                    data-aos-easing="ease-cubic" data-aos="fade-left">
                    <h2 class="secondary-text text-center text-md-end">Trova le migliori offerte per te</h2>
                    <p class=" fs-5 text-center text-md-end">
                        Scopri una vasta gamma di prodotti selezionati con cura per offrirti qualità e convenienza.
                        Approfitta delle nostre offerte esclusive e rendi il tuo shopping un'esperienza unica.
                    </p>
                    <a class="btn btn-home w-md-25 px-4 rounded-5" href="{{ route('article.catalogo') }}">
                        <p class="m-auto p-0 px-2 dark-text">Acquista</p>
                    </a>
                </div>
            </div>
        </article>

        <article class="row justify-content-center justify-content-md-start mb-5">
            <div class="col-12 col-md-8 primary-bg py-5">
                <div class="mt-4 d-flex flex-column align-items-center align-items-md-start" data-aos-duration="2000"
                    data-aos-easing="ease-cubic" data-aos="fade-right">
                    <h2 class="secondary-text text-center text-md-start">Dai nuova vita ai tuoi oggetti</h2>
                    <p class=" fs-5 text-center text-md-start">
                        Metti in vendita in pochi secondi, vendi in pochi giorni, acquista in un attimo — è tutto più
                        facile.
                    </p>
                    <a class="btn btn-home w-md-25 px-4 rounded-5" href="{{ route('article.create') }}">
                        <p class="m-auto p-0 px-3 dark-text">Vendi</p>
                    </a>
                </div>
            </div>
        </article>

        <section class="row rounded-0 m-0 p-3 secondary-bg">
            <div class="col-9 my-auto">
                <h3 class="primary-light-text pt-1 m-0">Scopri le migliori offerte sul catalogo</h3>
                <p class="primary-light-text py-1 m-0">Non perderti questi sconti esclusivi su una gamma di prodotti
                    selezionati dal nostro team.</p>
            </div>
            <div class="col-3 m-auto text-end">
                <a class="btn btn-banner w-md-25 px-4 rounded-5" href="{{ route('article.catalogo') }}"><p class="m-auto p-0 px-3 secondary-text">Acquista ora</p></a>
            </div>
        </section>

        <div class="row justify-content-end justify-content-sm-center mt-5">
            <div class="col-12">
                <!-- Ultimi Annunci -->
                <h2 class="text-start secondary-text py-3">Ultimi Annunci</h2>
            </div>
        </div>

        <article class="row row-cols-1 row-cols-md-3 row-cols-lg-3 pb-5 justify-content-center">
            @foreach ($articles as $article)
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <x-card :article="$article"/>
                </div>
            @endforeach
        </article>

    </div>
</div>
