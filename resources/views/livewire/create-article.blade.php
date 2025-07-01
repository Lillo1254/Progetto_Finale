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

                    <!-- Titolo -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" class="form-control rounded-0" id="title" wire:model="title" required>
                        @error('title')
                            <span class="text-danger">{{ $messages }}</span>
                        @enderror
                    </div>

                    <!-- Prezzo -->
                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo</label>
                        <input type="number" class="form-control rounded-0" id="price" wire:model="price"
                            step="0.01" required>
                        @error('price')
                            <span class="text-danger">{{ $messages }}</span>
                        @enderror
                    </div>

                    <!-- Descrizione -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea class="form-control rounded-0 text-dark" id="description" wire:model="description" required></textarea>
                        @error('description')
                            <span class="text-danger">{{ $messages }}</span>
                        @enderror
                    </div>

                    <!-- Categoria -->
                    <label for="category" class="form-label">Categoria</label>
                    <div class="row justify-content-center ">
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

                    <div>
                        <input type="file" wire:model.live="temporary_image" multiple
                            class="form-control shadow @error('temporary_image.*') is-invalid @enderror"
                            placeholder="Img/" />
                        @error('temporary_image.*')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        @error('temporary_image')
                            <p>{{ $message }} </p>
                        @enderror
                    </div>
                    @if (!empty($images))
                        <div class="row">
                            <div class="col-2">
                                <label for="preview" class="form-label">Preview</label>
                                <div>
                                    @foreach ($images as $key => $image)
                                        <div class="col-2">
                                            <div class="img-preview mx-auto shadow rounded"
                                                style="background-image:url({{ $image->temporaryUrl() }});">

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif


                    <!-- Pulsante di invio -->
                    <div
                        class="d-flex flex-column flex-lg-row align-items-center justify-content-between m-0 my-auto p-0">
                        <button type="submit" class="btn btn-form mt-4 px-4 rounded-5">
                            <p class="m-auto p-0 px-2 dark-text">Crea articolo</p>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
