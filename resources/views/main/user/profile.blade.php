@extends('layout.main')

@section('title', 'Profile')
@section('data-page', '')
@section('content')	
<main class="h-100 has-header">

    <!-- Header -->
    <header class="container-fluid header">
        <div class="row h-100">
            <div class="col-auto align-self-center">
                <a href="{{ route('home') }}" class="btn btn-link back-btn text-color-theme">
                    <i class="bi bi-arrow-left size-20"></i>
                </a>
            </div>
            <div class="col text-center align-self-center">
                <h5 class="mb-0">My Profile</h5>
            </div>
            <div class="col-auto align-self-center">
                <a href="{{ route('setting') }}" class="link text-color-theme">
                    <i class="bi bi-gear size-22"></i>
                </a>
            </div>
        </div>
    </header>
    <!-- Header ends -->

    <!-- main page content -->
    <div class="main-container container">
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <!-- profile picture -->

        <!-- wallet info -->
        <div class="row">
            <div class="col-12">
                <div class="card card-theme shadow-sm mb-4">
                    <div class="card-body">
                        <div class="card card-light mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-auto">
                                        <figure class="avatar avatar-80 rounded mx-auto">
                                            <img src="{{ asset('assets/img/user2.jpg') }}" alt="">
                                        </figure>
                                    </div>
                                    <div class="col align-self-center">
                                        <h5 class="mb-0">{{ ucfirst(trans(auth()->user()->full_name)) }}</h5>
                                        <p class="text-opac">{{ ucfirst(trans(auth()->user()->email)) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- experince -->
        <div class="row mb-3">
            <div class="col">
                <h5 class="mb-0">Riwayat terbaru</h5>
            </div>
            <div class="col-auto text-end">
                <a href="{{ route('all_booking') }}" style="text-decoration: none;">Lihat semua</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm mb-4">
                    <ul class="list-group list-group-flush my-2 bg-none">

                        @if($data->count() == 0)
                            <h5 class="mx-auto" style="color: red;"><b>Riwayat anda kosong!</b></h5>
                        @endif
                        @foreach ($data as $d)
                        <a href="{{ route('track', $d->booking_id) }}" style="text-decoration: none">
                            <li class="list-group-item border-0">
                                <div class="row">
                                    <div class="col-auto">
                                        <figure class="avatar avatar-50 rounded-circle">
                                            <img src="{{ asset('assets/img/googlelogo.png') }}" alt="">
                                        </figure>
                                    </div>
                                    <div class="col px-0">
                                        <p>{{ $d->laundry->laundry_name }}<br><small class="text-opac">{{ $d->laundry->laundry_address }}</small></p>
                                        
                                    </div>
                                    <div class="col-auto text-end">
                                        <p>
                                            <small class="text-opac">{{ $d->created_at }}</small>
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </a>
                        @endforeach


                    </ul>
                </div>
            </div>
        </div>

        <!-- address  -->
        <div class="row mb-3">
            <div class="col">
                <h5 class="mb-0">Alamat </h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-5">
                <div class="card shadow-sm product mb-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col align-self-center">
                                <h5 class="mb-0">{{ ucfirst(trans(auth()->user()->address)) }}<br>
                                    <span class="text-opac small">Primary</span>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- <iframe src="https://www.google.com/maps?q=-7.4161,109.2899&hl=es;z=14&output=embed" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> --}}
                        <iframe src="https://www.google.com/maps?q={{ auth()->user()->user_lat }},{{ auth()->user()->user_long }}&hl=es;z=14&output=embed"
                            class="h-190 w-100 rounded mb-3" allowfullscreen="" loading="lazy"></iframe>
                        <div class="row">
                            <div class="col text-opac">
                                {{ ucfirst(trans(auth()->user()->address)) }}<br>Jawa Tengah
                            </div>
                            <div class="col-auto text-end">
                                <i class="bi bi-arrow-up-right-circle text-color-theme"></i><br>
                                <small class="text-opac">2.5km <i class="bi bi-geo-alt"></i></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- main page content ends -->


</main>
@include('includes.footer')
@endsection