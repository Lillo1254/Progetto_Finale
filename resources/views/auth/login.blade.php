<x-layout titlePage="Login">

    <div class="main-bg min-vh-100">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h1 class="secondary-text display-3 pt-5 text-center">{{ __('ui.login') }}</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <form class="primary-light-bg p-5 rounded-0 form-glow" action="{{ route('login') }}" method="POST">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger rounded-0 m-0 mb-4">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label white-text">{{ __('ui.email') }}</label>
                            <input type="email" class="form-control rounded-0" id="exampleInputEmail1" name="email">
                            <div id="emailHelp" class="form-text secondary-text">{{ __('ui.privacy') }}</div>
                        </div>
                        <div>
                            <label for="exampleInputPassword1" class="form-label white-text">{{ __('ui.password') }}</label>
                            <input type="password" class="form-control rounded-0" id="exampleInputPassword1" name="password">
                        </div>
                        <div
                            class="d-flex flex-column flex-lg-row align-items-center justify-content-between m-0 my-auto p-0">
                            <button type="submit" class="btn btn-form mt-5 rounded-5 px-5">
                                <p class="m-auto p-0 px-2 dark-text">{{ __('ui.iscriviti') }}</p>
                            </button>
                            <p class="my-0 mt-5 secondary-text"> <a
                                    class="form-link secondary-text text-decoration-none"
                                    href="{{ route('register') }}">{{ __('ui.sign_up') }}</a></p>
                        </div>
                        <div class="left-glow"></div>
                        <div class="bottom-glow"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>


</x-layout>
