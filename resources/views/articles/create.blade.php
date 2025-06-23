<x-layout> 
    <div class="primary-bg vh-100">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h1 class="secondary-text display-3 pt-5 text-center">Crea un Articolo</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <form class="primary-light-bg p-5 rounded-4" action="#" method="POST">
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
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>

                        <!-- Prezzo -->
                        <div class="mb-3">
                            <label for="price" class="form-label">Prezzo</label>
                            <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                        </div>

                        <!-- Descrizione -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Descrizione</label>
                            <textarea class="form-control" id="description" name="description" required></textarea>
                        </div>

                        <!-- Pulsante di invio -->
                        <div class="d-flex flex-column flex-lg-row align-items-center justify-content-between m-0 my-auto p-0">
                            <button type="submit" class="btn btn-form mt-5 px-5">Crea Articolo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
