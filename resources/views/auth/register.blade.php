<x-layout> 
 
    <div class="primary-bg min-vh-100">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h1 class="secondary-text display-3 pt-5 text-center">Registrati</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <form class="primary-light-bg p-5 rounded-4" action="{{route('register')}}" method="POST">
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
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Indirizzo Email</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Conferma Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        <div class="d-flex flex-column flex-lg-row align-items-center justify-content-between m-0 my-auto p-0">
                            <button type="submit" class="btn btn-form mt-5 px-5">Register</button>
                            <p class="my-0 mt-5 secondary-text">Already have an account? <a class="form-link secondary-text text-decoration-none" href="{{route('login')}}">Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

</x-layout>