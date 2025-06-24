<x-layout> 
 
    <div class="primary-bg min-vh-100">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h1 class="secondary-text display-3 pt-5 text-center">Login</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <form class="primary-light-bg p-5 rounded-4" action="{{route('login')}}" method="POST">
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
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email">
                            <div id="emailHelp" class="form-text secondary-text">We'll never share your email with anyone else.</div>
                            </div>
                        <div>
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                        </div>
                        <div class="d-flex flex-column flex-lg-row align-items-center justify-content-between m-0 my-auto p-0">
                            <button type="submit" class="btn btn-form mt-5 px-5">Submit</button>
                            <p class="my-0 mt-5 secondary-text">Don't have an account? <a class="form-link secondary-text text-decoration-none" href="{{route('register')}}">Sign up</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

 
 </x-layout>