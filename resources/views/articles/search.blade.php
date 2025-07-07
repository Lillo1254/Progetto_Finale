<x-layout titlePage="Hai cercato : {{ $query }}">
    <main class="container primary-bg min-vh-100">

        <h1 class="text-center secondary-text display-5 py-5">{{ __('ui.risultati') }} "{{ $query }}"</h1>
        <div class="row  justify-content-center pb-5">
            @if ($articles->count() > 0)
                @foreach ($articles as $article)
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <x-card :article="$article"/>
                    </div>
                @endforeach
            @else
                <h4 class="text-center secondary-text mt-0 py-5">
                    <em>{{ __('ui.no_risultati') }}</em>
                </h4>
                <a href="{{ route('article.catalogo') }}" class="btn col-12 col-sm-6 col-md-4 col-lg-2 btn-form rounded-5 px-3 mx-3">
                    <p class="dark-text m-0 p-0">{{ __('ui.torna_catalogo') }}</p>
                </a>
            @endif
        </div>
    </main>
</x-layout>
