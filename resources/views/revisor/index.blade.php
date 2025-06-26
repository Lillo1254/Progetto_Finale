<x-layout>
    <div class="primary-bg min-vh-100">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h1 class="secondary-text display-3 pt-5 text-center">Dashboard Revisori</h1>
                </div>
            </div>
        </div>
    </div>
    @if ($article_to_check)

        <div class="rcontainer-fluid justify-content-center pt-5">
            <div class="row justify-content-center">
                @for ($i = 0; $i < 4; $i++)
                    <div
                        class="col-6 col-md-4 mb-4 text-center d-flex flex-column align-items-center justify-content-between">


                        <img src="https://picsum.photos/300" class="img-fluid rounded-4 mb-3" alt="immagine default">
                        <h1 text-center>{{ $article_to_check->title }}</h1>
                        <h4 class="text-muted text-center">{{ $article_to_check->category->name }}</h4>
                        <p class="h6 text-center">{{ $article_to_check->description }}</p>
                        <div class="d-flex pb-4 justify-content-around">
                            <form action="" method="POST">
                                @csrf
                                <button class="btn btn-danger py-2 px-5 fw-bold">Rifiuta</button>
                            </form>
                            <form action="" method="POST">
                                @csrf
                                <button class="btn btn-success py-2 px-5 fw-bold">Accetta</button>
                            </form>
                        </div>

                    </div>
            </div>
        </div>
    @endfor

    @endif
@else
    <div class="row justify-content-center align-items-center height-custom text-center">
        <div class="col-12">
            <h1 class="fst-italic display-4">
                Nessun articolo da revisionare
            </h1>
            <a href="{{ route('homepage') }}" class="mt-5 btn btn-success">Torna all'homepage</a>
        </div>
    </div>
    @endif


</x-layout>
