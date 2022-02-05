@extends('layout.main')
@section('title', 'Profile Setting')
@section('content')
    <!-- header start -->
    <header>
        <div class="back-links">
            <a href="{{ route('profile') }}">
                <i class="iconly-Arrow-Left icli"></i>
                <div class="content">
                    <h2>Profile Setting</h2>
                </div>
            </a>
        </div>
    </header>
    <!-- header end -->


    <!-- user avtar section -->
    <section class="user-avtar-section top-space pt-0 px-15">
        <img src="assets/images/user/1.png" class="img-fluid" alt="">
        <span class="edit-icon"><i class="iconly-Edit-Square icli"></i></span>
    </section>
    <!-- user avtar end -->


    <!-- detail form start -->
    <form method="post" action="{{ route('profile-change', $user->user_id) }}">
        <section class="detail-form-section px-15">
            <h2 class="page-title mb-4">Personal Details</h2>
            @csrf
            <div class="form-floating mb-4">
                <input type="text" name="full_name" class="form-control @error('full_name') is-invalid @enderror" id="one" placeholder="Mauskan nama lengkap" value="{{ $user->full_name }}">
                <label for="one">Nama lengkap</label>
                @error('full_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-4">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="five" placeholder="Masukan email" value="{{ $user->email }}">
                <label for="five">Email</label>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-4">
                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Masukan alamat" value="{{ $user->address }}">
                <label for="address">Alamat</label>
                @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </section>
        <div class="divider"></div>
        <section class="detail-form-section pt-0 px-15">
            <div class="form-floating mb-4">
                <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" id="six" placeholder="Masukan No. Hp" value="{{ $user->phone }}">
                <label for="six">No. Hp</label>
                @error('phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-4">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="eight" placeholder="Password">
                <label for="eight">Password</label>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </section>
        <!-- detail form end -->


        <!-- panel space start -->
        <section class="panel-space"></section>
        <!-- panel space end -->


        <!-- bottom panel start -->
        <div class="cart-bottom row m-0" style="z-index: 6">
            <div>
                <div class="left-content col-5">
                    <a href="{{ route('profile') }}" class="title-color">CANCEL</a>
                </div>
                <button type="submit" class="btn btn-solid col-7 text-uppercase">Save Details</button>
            </div>
        </div>
    
    </form>
    <!-- bottom panel end -->

@endsection