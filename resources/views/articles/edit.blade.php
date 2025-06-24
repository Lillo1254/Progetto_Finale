<x-layout>
    <div class="primary-bg min-vh-100">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h1 class="secondary-text display-3 pt-5 text-center">Modifica articolo</h1>
                </div>
            </div>

            <div class="row justify-content-center mb-5">
                <div class="col-12 col-md-10 col-lg-8">
                    <form class="primary-light-bg p-5 rounded-4" action="{{route('article.update', $article)}}" method="POST">
                         @csrf
                        @method('PUT') 

                        @if ($errors->any())
                            <div class="alert alert-danger m-0 mb-4">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                       <div class="mb-3">
                            <label for="title" class="form-label">Titolo</label>
                            <input type="text" name="title" id="title" class="form-control"
                                   value="{{ old('title', $article->title) }}" required>
                        </div>
                       <div class="mb-3">
                           <label for="price" class="form-label">Prezzo</label>
                           <input type="number" name="price" id="price" class="form-control"
                                  value="{{ old('price', $article->price) }}" required>
                       </div>
                       <div class="mb-3">
                           <label for="description" class="form-label">Descrizione</label>
                           <textarea name="description" id="description" class="form-control"
                                     required>{{ old('description', $article->description) }}</textarea>
                       </div>
                         <div class="d-flex flex-column flex-lg-row align-items-center justify-content-between">
                            <button type="submit" class="btn btn-success mt-4 px-4">Salva modifiche</button>


                            <a href=""
                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $article->id }}').submit();"
                                class="btn mt-4 rounded-3 btn-delete px-4 primary-text">Cancella articolo</a>
                            <a href="{{ route('article.catalogo') }}" class="btn btn-form mt-4 px-5">Annulla</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
                            <form id="delete-form-{{ $article->id }}" action="{{ route('article.destroy', $article) }}"
                                method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
</x-layout>