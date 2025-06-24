<x-layout>

    <div class="primary-bg vh-100">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h1 class="secondary-text display-3 pt-5 text-center">All articles</h1>
                </div>
            </div>
            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-12 col-md-6 col-lg-4 col-xxl-3 mb-4">
                        <div class="card position-relative p-4 border-0 primary-light-bg rounded-4 h-100">
                            <a href="" class="position-absolute card-link"></a>
                            <div class="card-body p-0 z-3">
                                <h2 class="card-title white-text fw-light">{{ $article->title }}</h2>
                                <h5 class="card-title fw-light">{{ $article->price }}</h5>
                                <p class="card-text mt-2 white-text">{{ $article->description }}</p>
                                <p class="card-text mt-2 white-text">{{ $article->category->name }}</p>
                                <a href="{{ route('article.edit', $article) }}" class="btn-form btn mt-1 rounded-3">
                                    <p class="m-auto p-0 px-3 text-dark">Edit</p>
                                </a>
                                <a href="{{ route('article.destroy', $article) }}"
                                    class="btn primary-dark-bg ms-3 mt-1 rounded-3 danger-bg btn-delete">
                                    <p class="m-auto p-0 px-2 text-dark">Delete</p>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</x-layout>
