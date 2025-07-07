<main class="login-register min-vh-100 d-flex flex-column justify-content-center pb-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <h1 class="secondary-text display-3 pt-5 text-center text-shadow-white">{{ __('ui.crea_articolo') }}</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-xl-9 col-xxl-8">
                <form class="primary-light-bg-form p-5 rounded-0 mb-5" wire:submit.prevent="create">
                    @csrf

                    @if (session('message'))
                        <div class="alert alert-success dark-text m-0 mb-4 rounded-0">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="title" class="form-label white-text">{{ __('ui.titolo') }}</label>
                        <input type="text" class="form-control rounded-0" id="title" wire:model="title">
                        @error('title')
                            <span class="danger-text">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label white-text">{{ __('ui.prezzo') }}</label>
                        <input type="number" class="form-control rounded-0" id="price" wire:model="price"
                            step="0.01">
                        @error('price')
                            <span class="danger-text">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label white-text">{{ __('ui.descrizione') }}</label>
                        <textarea class="form-control rounded-0 text-dark" id="description" wire:model="description"></textarea>
                        @error('description')
                            <span class="danger-text">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label white-text">{{ __('ui.categoria') }}</label>
                        <div class="row justify-content-center">
                            @foreach ($categories as $category)
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="category_id"
                                            id="category-{{ $category->id }}" value="{{ $category->id }}"
                                            wire:model="category_id">
                                        <label class="form-check-label white-text" for="category-{{ $category->id }}">
                                            {{ $category->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @error('category_id')
                            <span class="danger-text mt-2">{{ $message }}</span>
                        @enderror
                    </div>

                    

                    <div class="mb-2 pt-0">
                        <label for="imageUpload" class="form-label white-text">{{ __('ui.carica_immagini') }}</label>
                        <input type="file" wire:model.live="temporary_image" multiple id="imageUpload"
                            class="form-control rounded-0 @error('temporary_image.*') is-invalid @enderror" />

                        <p class="white-text mt-2">
                            @if (count($images) == 1)
                                {{ __('ui.selezione_immagine') }}
                            @else
                                {{ __('ui.hai_selezionato') }} {{ count($images) }} {{ __('ui.immagine') }}
                            @endif
                        </p>

                        @error('temporary_image.*')
                            <p class="danger-text mt-1">{{ __('ui.dimensione_massima') }}</p>
                        @enderror
                    </div>

                    @if (!empty($images))
                        <div class="mb-4 mt-2">
                            <h5 class="mb-3">{{ __('ui.anteprima_immagini') }}</h5>
                            <div class="row">
                                @foreach ($images as $key => $image)
                                    <div class="col-6 col-md-4 col-lg-3 mb-3">
                                        <div class="img-preview mx-auto rounded-0 position-relative" style="background-image:url({{ $image->temporaryUrl()}}); height: 150px; background-size: cover; background-position: center;">
                                            <a wire:click="removeImg({{ $key }})"
                                                class="position-absolute top-0 end-0 p-1 text-decoration-none cursor-pointer">
                                                <i class="bi bi-x-square-fill fs-4 danger-text rounded-0"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif


                    <div class="text-start mt-5">
                        <button type="submit" class="btn btn-form px-5 py-2 rounded-5">
                            <p class="m-auto dark-text fs-5">{{ __('ui.crea_articolo') }}</p>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
