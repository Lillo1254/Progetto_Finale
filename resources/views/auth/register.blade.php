<x-layout titlePage="Registrazione">

    <div class="main-bg min-vh-100">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h1 class="secondary-text display-3 pt-5 text-center">Registrati</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 ">
                    <form class="primary-light-bg p-5 rounded-0 form-glow mb-5" action="{{ route('register') }}" method="POST">
                        @csrf
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
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control rounded-0 primary-bg white-text" id="name" name="name" required value="{{old('name')}}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Indirizzo Email</label>
                            <input type="email" class="form-control rounded-0 primary-bg white-text" id="email" name="email"
                                aria-describedby="emailHelp" required value="{{old('email')}}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control rounded-0 primary-bg white-text" id="password" name="password" required>
                        </div>
                        <div class="mb-0">
                            <label for="password_confirmation" class="form-label">Conferma Password</label>
                            <input type="password" class="form-control rounded-0 primary-bg white-text" id="password_confirmation"
                                name="password_confirmation" required>
                        </div>
                        <div
                            class="d-flex flex-column flex-lg-row align-items-center justify-content-between m-0 my-auto p-0">
                            <button type="submit" class="btn btn-form mt-5 px-5 rounded-5">
                                <p class="m-auto p-0 px-2 dark-text">Registrati</p>
                            </button>
                            <p class="my-0 mt-5 secondary-text">Hai già un account? <a
                                    class="form-link secondary-text text-decoration-none"
                                    href="{{ route('login') }}">Login</a></p>
                        </div>
                        <div class="left-glow"></div>
                        <div class="bottom-glow"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>

</x-layout>
