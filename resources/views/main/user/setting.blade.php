@extends('layout.main')

@section('title', 'Setting')
@section('data-page', '')
@section('content')	
@include('includes.sidebar')
<main class="h-100 has-header has-footer">

    <!-- Header -->
    @include('includes.header')
    <!-- Header ends -->

    <!-- main page content -->
    <div class="main-container container">

        <!-- profile picture -->
        <div class="row  mb-4">
            <div class="col-auto">
                <figure class="avatar avatar-100 rounded mx-auto">
                    <img src="{{ asset('assets/img/user2.jpg') }}" alt="">
                </figure>
            </div>
            <div class="col align-self-center">
                <h5 class="">{{ ucfirst(trans(auth()->user()->full_name)) }}</h5>
                <p class="text-opac">{{ ucfirst(trans(auth()->user()->address)) }}</p>
            </div>
        </div>

        <!-- profile information -->
        <div class="row mb-3">
            <div class="col">
                <h5 class="mb-0">Basic Information</h5>
            </div>
        </div>

        <form action="{{ route('profile-change') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card card-light shadow-sm mb-4">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group form-floating mb-3">
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="full_name"
                                            placeholder="Masukan nama lengkap" value="{{ auth()->user()->full_name }}" name="full_name" required autofocus>
                                        <label for="full_name">Nama lengkap</label>
                                        @error('full_name')
                                        <button type="button"  class="btn btn-link text-danger tooltip-btn invalid-tooltip"
                                            data-bs-toggle="tooltip" data-bs-placement="left" title="{{ $message }}">
                                            <i class="bi bi-exclamation-circle"></i>
                                        </button>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group form-floating mb-3">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="emailaddress" name="email" placeholder="Masukan email" value="{{ auth()->user()->email }}" required>
                                        <label for="emailaddress">Email</label>
                                        @error('email')
                                        <button type="button"  class="btn btn-link text-danger tooltip-btn invalid-tooltip"
                                            data-bs-toggle="tooltip" data-bs-placement="left" title="{{ $message }}">
                                            <i class="bi bi-exclamation-circle"></i>
                                        </button>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group form-floating mb-3">
                                        <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="0851561131741" value="{{ auth()->user()->phone }}" required>
                                        <label for="phone">No. Hp</label>
                                        @error('phone')
                                        <button type="button"  class="btn btn-link text-danger tooltip-btn invalid-tooltip"
                                            data-bs-toggle="tooltip" data-bs-placement="left" title="{{ $message }}">
                                            <i class="bi bi-exclamation-circle"></i>
                                        </button>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group form-floating mb-3">
                                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Masukan alamat" value="{{ auth()->user()->address }}" required>
                                        <label for="address">Alamat</label>
                                        @error('address')
                                        <button type="button"  class="btn btn-link text-danger tooltip-btn invalid-tooltip"
                                            data-bs-toggle="tooltip" data-bs-placement="left" title="{{ $message }}">
                                            <i class="bi bi-exclamation-circle"></i>
                                        </button>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group form-floating mb-3">
                                        <input type="text" class="form-control @error('address_detail') is-invalid @enderror" id="address_detail" name="address_detail" placeholder="Masukan detail alamat" value="{{ auth()->user()->address_detail }}" required>
                                        <label for="address_detail">Detail alamat</label>
                                        @error('address_detail')
                                        <button type="button"  class="btn btn-link text-danger tooltip-btn invalid-tooltip"
                                            data-bs-toggle="tooltip" data-bs-placement="left" title="{{ $message }}">
                                            <i class="bi bi-exclamation-circle"></i>
                                        </button>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- change address -->
            <div class="row mb-3">
                <div class="col">
                    <h5 class="mb-0">Ubah Alamat</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-light shadow-sm mb-4">
                        <div class="card-body">
                            <div class="row h-100">
                                <div class="col-12 col-md-6 col-lg-4">
                                    <iframe src="https://www.google.com/maps?q={{ auth()->user()->user_lat }},{{ auth()->user()->user_long }}&hl=es;z=14&output=embed"
                                        class="h-190 w-100 rounded mb-3" allowfullscreen="" loading="lazy"></iframe>
                                    <h7 style="color: grey">*Penggantian alamat menggunakan GPS, secara otomatis mengubah alamat anda berada sekarang<h7>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- change password -->
            <div class="row mb-3">
                <div class="col">
                    <h5 class="mb-0">Ubah Password</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-light shadow-sm mb-4">
                        <div class="card-body">
                            <div class="row h-100">
                                <div class="col-12 col-md-6 col-lg-4">
                                
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukan password">
                                        <label for="password">Password</label>
                                        @error('password')
                                        <button type="button"  class="btn btn-link text-danger tooltip-btn invalid-tooltip"
                                            data-bs-toggle="tooltip" data-bs-placement="left" title="{{ $message }}">
                                            <i class="bi bi-exclamation-circle"></i>
                                        </button>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row h-100 mb-4">
                <div class="col-12 d-grid">
                    <button type="submit" target="_self" class="btn btn-lg btn-default shadow-sm">Ubah</button>
                </div>
            </div>
        
        </form>

    </div>
    <!-- main page content ends -->


</main>
@include('includes.footer')
@endsection