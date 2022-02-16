@extends('layout.main')

@section('title', 'Profile')
@section('data-page', '')
@section('content')	
<main class="h-100 has-header ">

    <!-- Header -->
    <header class="container-fluid header">
        <div class="row h-100">
            <div class="col-auto align-self-center">
                <a href="{{ route('home') }}" class="btn btn-link back-btn text-color-theme">
                    <i class="bi bi-arrow-left size-20"></i>
                </a>
            </div>
            <div class="col text-center align-self-center">
                <h5 class="mb-0">My Orders</h5>
            </div>
        </div>
    </header>
    <!-- Header ends -->

    <!-- main page content -->
    <div class="main-container container">
        <!-- Search -->
        {{-- <div class="row mb-4">
            <div class="col">
                <div class="form-floating">
                    <input type="text" class="form-control is-valid" id="search" placeholder="Search">
                    <label for="search">Search</label>
                    <button type="button" class="btn btn-link tooltip-btn d-block text-color-theme">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
        </div> --}}

        <!-- cart items -->
        <div class="row mb-3">
            <div class="col align-self-center">
                <h5 class="mb-0">Semua transaksi</h5>
            </div>
        </div>
        <div class="row mb-2">

            @foreach ($data as $d)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card shadow-sm product mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <figure class="text-center avatar-70 avatar">
                                    <img src="{{ asset('assets/img/product1.png') }}" alt="">
                                </figure>
                            </div>
                            <div class="col ps-0 align-self-center">
                                <p class="mb-0">
                                    <small class="text-opac">{{ $d->created_at }}</small>
                                </p>
                                <h6 class="text-color-theme">{{ $d->laundry->laundry_name }}</h6>
                                <div class="row">
                                    <div class="col">
                                        <p class="text-primary">Rp. {{ number_format($d->subtotal,2,',','.'); }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


        </div>

    </div>
    <!-- main page content ends -->


</main>
@include('includes.footer')
@endsection