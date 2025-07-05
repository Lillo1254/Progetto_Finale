<x-layout titlePage="Richiedi di diventare revisore">
    @if(auth()->user()->is_revisor)
    <div>
        <h1><em>Sei gia un Revisore</em></h1>

        @else



    </div>
    <div class="primary-bg min-vh-100 d-flex flex-column justify-content-start pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center mt-5">
                    <h1 class="secondary-text display-3 pt-3 text-center">{{ __('ui.pagina_revisore') }}</h1>
                </div>
            </div>
            <div class="row justify-content-center py-5">
                <div class="col-12 col-md-10 col-lg-8">
                    <form class="primary-light-bg p-5 mb-5" action="{{ route('revisor.request') }}" method="POST">
                        @csrf
                        <input type="hidden" name="is_revisor" value="1">

                        <div class="mb-3 text-start">
                            <label for="name" class="form-label">{{ __('ui.nome') }}</label>
                            <input type="text" class="form-control border-0 rounded-0" id="name" name="name" value="{{ auth()->user()->name }}" required>
                        </div>

                        <div class="mb-3 text-start">
                            <label for="email" class="form-label">{{ __('ui.email') }}</label>
                            <input type="email" class="form-control border-0 rounded-0" id="email" name="email" value="{{ auth()->user()->email }}"  required>
                        </div>

                        <div class="mb-3 text-start">
                            <label for="message" class="form-label">{{ __('ui.messaggio') }}</label>
                            <textarea class="form-control border-0 rounded-0" id="message" name="message" rows="4" required></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-form mt-5 px-5 rounded-pill">
                                {{ __('ui.diventa_revisore') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
</x-layout> 