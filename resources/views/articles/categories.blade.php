<x-layout titlePage="Categoria {{ $categoryName }}">

    <main class="primary-bg min-vh-100 login-register">
        <div class="container pb-5 bg-transparent">
            <div class="row justify-content-center w-100 mb-5 bg-transparent">

                @if ($articles->count() > 0)
                    <h1 class="text-center secondary-text display-3 pt-5 text-shadow">
                       {{ __('ui.nome_sezione') }} {{ $categoryName }}
                    </h1>
                @else
                    <h4 class="text-center secondary-text mt-5 py-5">
                        <em>{{ __('ui.no_articolo_sezione') }}</em>
                    </h4>
                    <a href="{{ route('article.catalogo') }}"
                        class="btn col-6 col-sm-4 col-md-3 col-lg-2 btn-form rounded-5 px-3 mx-auto">
                        <p class="dark-text m-0 p-0">{{ __('ui.torna_catalogo') }}</p>
                    </a>
                @endif
            </div>

            <article class="row bg-transparent">
                @foreach ($articles as $article)
                    <div class="col-12 col-md-6 col-lg-4 mb-4 bg-transparent">
                        <x-card :article="$article" />
                    </div>
                @endforeach
            </article>


        </div>
    </main>
</x-layout>
