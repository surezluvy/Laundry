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

        <form action="{{ route('address-change') }}" method="post" class="registerForm">
            @csrf
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
                                    <input type="hidden" name="user_lat" class="form-control" value="">
                                    <input type="hidden" name="user_long" class="form-control" value="">
                                    <iframe src="https://www.google.com/maps?q={{ auth()->user()->user_lat }},{{ auth()->user()->user_long }}&hl=es;z=14&output=embed"
                                        class="h-190 w-100 rounded mb-3" allowfullscreen="" loading="lazy"></iframe>
                                    <h7 style="color: grey">*Penggantian alamat menggunakan GPS, secara otomatis mengubah alamat anda berada sekarang<h7>
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