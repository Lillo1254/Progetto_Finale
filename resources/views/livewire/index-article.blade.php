<main class="login-register min-vh-100">
    <div class="container pb-3">
        <div class="row mb-5">
            <div class="col-12">
                <h1 class="secondary-text display-3 pt-5 text-center text-shadow-white">{{ __('ui.tutti_articoli') }}</h1>
            </div>
        </div>
        <article class="row">
            @foreach ($articles as $article)
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                    <x-card :article="$article"/>
                </div>
            @endforeach
        </article>

        <!-- ? PAGINATION -->
        <div class="row justify-content-center mt-3">
            {{ $articles->links() }}
        </div>
    </div>
</main>
