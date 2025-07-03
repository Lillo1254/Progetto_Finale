<div class="primary-bg">

    <main class="mx-0 image-home position-relative p-1">
        <div class="container-fluid container h-100 d-flex flex-column justify-content-center" data-aos-duration="2000"
            data-aos-easing="ease-cubic" data-aos="fade-right">
            <h1 class="header-text text-shadow display-5 fw-bold">Presto.it</h1>
            <h6 class="p-1 pb-0 white-text text-shadow"> {{ __('ui.trasforma') }}</h6>
            <h6 class="p-1 pt-0 white-text text-shadow">{{ __('ui.piattaforma') }}</h6>
            <h4 class="p-1 header-text text-shadow">{{ __('ui.mercato') }}</h4>
        </div>
    </main>

    <div class="container-fluid container">
        <article class="row justify-content-center justify-content-md-end">
            <div class="col-12 col-md-8 primary-bg py-5">
                <div class="mt-4 d-flex flex-column align-items-center align-items-md-end" data-aos-duration="2000"
                    data-aos-easing="ease-cubic" data-aos="fade-left">
                    <h2 class="secondary-text text-center text-md-end">{{ __('ui.offerte') }}</h2>
                    <p class=" fs-5 text-center text-md-end">
                        {{ __('ui.gamma') }}
                    </p>
                    <a class="btn btn-home w-md-25 px-4 rounded-5" href="{{ route('article.catalogo') }}">
                        <p class="m-auto p-0 px-2 dark-text">{{ __('ui.acquista') }}</p>
                    </a>
                </div>
            </div>
        </article>

        <article class="row justify-content-center justify-content-md-start mb-5">
            <div class="col-12 col-md-8 primary-bg py-5">
                <div class="mt-4 d-flex flex-column align-items-center align-items-md-start" data-aos-duration="2000"
                    data-aos-easing="ease-cubic" data-aos="fade-right">
                    <h2 class="secondary-text text-center text-md-start">{{ __('ui.vita') }}</h2>
                    <p class=" fs-5 text-center text-md-start">
                        {{ __('ui.vendita') }}
                    </p>
                    <a class="btn btn-home w-md-25 px-4 rounded-5" href="{{ route('article.create') }}">
                        <p class="m-auto p-0 px-3 dark-text">{{ __('ui.vendi') }}</p>
                    </a>
                </div>
            </div>
        </article>

        <section class="row rounded-0 m-0 p-3 secondary-bg">
            <div class="col-12 col-md-9 my-auto">
                <h3 class="primary-light-text pt-1 m-0">{{ __('ui.scopri') }}</h3>
                <p class="primary-light-text py-1 m-0">{{ __('ui.sconti') }}</p>
            </div>
            <div class="col-12 col-md-3 m-auto text-center text-md-end">
                <a class="btn btn-banner w-md-25 px-4 mt-2 mt-md-0 rounded-5" href="{{ route('article.catalogo') }}">
                    <p class="m-auto secondary-text">{{ __('ui.acquista_ora') }}</p>
                </a>
            </div>
        </section>

        <div class="row justify-content-end justify-content-sm-center mt-5">
            <div class="col-12">
                <!-- Ultimi Annunci -->
                <h2 class="text-start secondary-text py-3">{{ __('ui.annunci') }}</h2>
            </div>
        </div>

        <article class="row row-cols-1 row-cols-md-3 row-cols-lg-3 pb-5 justify-content-start">
            @foreach ($articles as $article)
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <x-card :article="$article"/>
                </div>
            @endforeach
        </article>

    </div>
</div>
