@extends('layout.main')
@section('title', 'Masuk')
@section('data-page', 'signin')
@section('body-class', ' d-flex flex-column h-100 dark-bg bg1')
@section('content')
<main class="container-fluid h-100 main-container">
    <div class="overlay-image text-end">
        <img src="{{ asset('assets/img/orange-slice.png') }}" class="orange-slice" alt="">
    </div>

    <div class="row h-100">
        <div class="col-12 text-center">
            <div class="logo-small">
                <img src="{{ asset('assets/img/logo.png') }}" alt="" class="img">
                <h6>My<br><small>Laundry</small></h6>
            </div>
        </div>
        <div class="col-12 mx-auto text-center">
            <div class="row h-100">
                <div class="col-10 col-sm-8 col-md-6 col-lg-4 col-xl-3 mx-auto align-self-center">
                    <h2 class="text-center mb-4">Sign in</h2>
                    <div class="card card-light shadow-sm mb-4">
                        @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        @if(session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('loginError') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <div class="card-body">
                            <form class=" was-validated" action="{{ route('authenticate') }}" method="post">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="emailaddress" name="email" placeholder="Masukan email" value="{{ old('email') }}" required>
                                    <label for="emailaddress">Email</label>
                                    @error('email')
                                    <button type="button"  class="btn btn-link text-danger tooltip-btn invalid-tooltip"
                                        data-bs-toggle="tooltip" data-bs-placement="left" title="{{ $message }}">
                                        <i class="bi bi-exclamation-circle"></i>
                                    </button>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukan password" value="{{ old('password') }}" required>
                                    <label for="password">Password</label>
                                    @error('password')
                                    <button type="button"  class="btn btn-link text-danger tooltip-btn invalid-tooltip"
                                        data-bs-toggle="tooltip" data-bs-placement="left" title="{{ $message }}">
                                        <i class="bi bi-exclamation-circle"></i>
                                    </button>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-lg btn-default shadow-sm">Masuk</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="col-12 text-center align-self-end py-2">
            <div class="row">
                <div class="col text-center">
                    Don't have account? <a href="{{ route('register') }}" class="btn btn-link px-0 ms-2">Sign up <i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection