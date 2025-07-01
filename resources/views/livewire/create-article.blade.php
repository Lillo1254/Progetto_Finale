<main class="primary-bg min-vh-100 d-flex flex-column justify-content-center pb-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <h1 class="secondary-text display-3 pt-5 text-center">Crea un Articolo</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-xl-9 col-xxl-8">
                <form class="primary-light-bg p-5 rounded-0 mb-5" wire:submit.prevent="create">
                    @csrf

                    @if (session()->has('success'))
                        <div class="alert alert-success m-0 mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger m-0 mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" class="form-control rounded-0" id="title" wire:model="title" required>
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo</label>
                        <input type="number" class="form-control rounded-0" id="price" wire:model="price"
                            step="0.01" required>
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea class="form-control rounded-0 text-dark" id="description" wire:model="description" required></textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Categoria</label>
                        <div class="row justify-content-center">
                            @foreach ($categories as $category)
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="category_id"
                                            id="category-{{ $category->id }}" value="{{ $category->id }}"
                                            wire:model="category_id">
                                        <label class="form-check-label" for="category-{{ $category->id }}">
                                            {{ $category->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @error('category_id')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>

                    

                    <div class="mb-2 pt-3">
                        <label for="imageUpload" class="form-label">Carica Immagini</label>
                        <input type="file" wire:model.live="temporary_image" multiple id="imageUpload"
                            class="form-control rounded-0 shadow @error('temporary_image.*') is-invalid @enderror" />

                        <p class="text-muted mt-2">
                            Hai selezionato **{{ count($images) }}** immagine(i).
                            @if (count($images) > 0)
                            @endif
                        </p>

                        @error('temporary_image.*')
                            <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                        @error('temporary_image')
                            <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    @if (!empty($images))
                        <div class="mb-4 mt-2">
                            <h5 class="mb-3">Anteprima Immagini:</h5>
                            <div class="row">
                                @foreach ($images as $key => $image)
                                    <div class="col-6 col-md-4 col-lg-3 mb-3">
                                        <div class="img-preview mx-auto shadow rounded-0 position-relative"
                                            style="background-image:url({{ $image->temporaryUrl() }}); height: 150px; background-size: cover; background-position: center;">
                                            <a wire:click="removeImg({{ $key }})"
                                                class="position-absolute top-0 end-0 p-1 text-decoration-none cursor-pointer">
                                                <i class="bi bi-x-square-fill fs-4 text-danger rounded-0"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif


                    <div class="text-start mt-5">
                        <button type="submit" class="btn btn-form px-5 py-2 rounded-5">
                            <p class="m-auto dark-text fs-5">Crea articolo</p>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
