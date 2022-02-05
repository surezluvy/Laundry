@extends('layout.main')
@section('title', 'Daftar')
@section('data-page', 'signup')
@section('body-class', ' d-flex flex-column h-100 dark-bg bg1')
@section('content')
<main class="container-fluid h-100 main-container">
    <div class="overlay-image text-end">
        <img src="assets/img/apple.png" class="orange-slice" alt="">
    </div>

    <div class="row h-100">
        <div class="col-12 text-center">
            <div class="logo-small">
                <img src="assets/img/logo.png" alt="" class="img">
                <h6>My<br><small>Laundry</small></h6>
            </div>
        </div>
        <div class="col-12 mx-auto text-center" style="height: 100%;">
            <div class="row h-100">
                <div class="col-10 col-sm-8 col-md-6 col-lg-4 col-xl-3 mx-auto align-self-center">
                    <h2 class="text-center mb-4">Sign up</h2>
                    <div class="card card-light shadow-sm mb-4">
                        <div class="card-body">
                            <form class="registerForm" class="" method="post" action="{{ route('store') }}">
                                @csrf
                                <input type="hidden" name="user_lat" class="form-control" value="">
                                <input type="hidden" name="user_long" class="form-control" value="">

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="full_name"
                                        placeholder="Masukan nama lengkap" value="{{ old('full_name') }}" name="full_name" required autofocus>
                                    <label for="full_name">Nama lengkap</label>
                                    @error('full_name')
                                    <button type="button"  class="btn btn-link text-danger tooltip-btn invalid-tooltip"
                                        data-bs-toggle="tooltip" data-bs-placement="left" title="{{ $message }}">
                                        <i class="bi bi-exclamation-circle"></i>
                                    </button>
                                    @enderror
                                </div>

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
                                    <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="0851561131741" value="{{ old('phone') }}" required>
                                    <label for="phone">No. Hp</label>
                                    @error('phone')
                                    <button type="button"  class="btn btn-link text-danger tooltip-btn invalid-tooltip"
                                        data-bs-toggle="tooltip" data-bs-placement="left" title="{{ $message }}">
                                        <i class="bi bi-exclamation-circle"></i>
                                    </button>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Masukan alamat" value="{{ old('address') }}" required>
                                    <label for="address">Alamat</label>
                                    @error('address')
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

                                <button type="submit" class="btn btn-lg btn-default shadow-sm">Daftar</button>

                            </form>
                        </div>
                    </div>

                    <div class="col-12 text-center align-self-end py-2">
                        <div class="row">
                            <div class="col text-center">
                                Already have account? <a href="{{ route('login') }}" class="btn btn-link px-0 ms-2">Sign in <i class="bi bi-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</main>
@endsection