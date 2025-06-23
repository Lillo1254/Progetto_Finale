<x-layout>

    <div class="container mt-4">
        <div class="row">
            @foreach ($articles as $article)
                <div class="col-12 col-md-6 col-lg-4 col-xxl-3 mb-4">
                    <div class="card position-relative p-4 border-0 primary-bg rounded-5 h-100">
                        <a href="" class="position-absolute card-link"></a>
                        <div class="card-body p-0 z-3">
                            <h2 class="card-title secondary-text fw-light">{{ $article->title }}</h2>
                            <h5 class="card-title secondary-dark-text fw-light">{{ $article->price }}</h5>
                            <p class="card-text mt-2 secondary-text">{{ $article->description }}</p>
                            <a href="{{route('articles.edit', $article)}}" class="btn-form btn primary-dark-bg mt-1 secondary-text rounded-5">
                                <p class="m-auto p-0 px-3">Edit</p>
                            </a>
                            <a href="{{route('articles.destroy', $article)}}" class="btn primary-dark-bg ms-3 mt-1 secondary-text rounded-5 btn-delete">
                                <p class="m-auto p-0 px-2">Delete</p>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center">
            {{ $articles->links() }}
        </div>
    </div>

</x-layout>
