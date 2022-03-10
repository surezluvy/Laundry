@extends('layout.main')

@section('title', 'Profile')
@section('data-page', '')
@section('content')	
<main class="h-100 has-header" style="margin-bottom: 80px;">

    <!-- Header -->
    <header class="container-fluid header">
        <div class="row h-100">
            <div class="col-auto align-self-center">
                <a href="{{ url()->previous() }}" class="btn btn-link back-btn text-color-theme">
                    <i class="bi bi-arrow-left size-20"></i>
                </a>
            </div>
            <div class="col text-center align-self-center">
                <h5 class="mb-0">Track</h5>
            </div>
            {{-- <div class="col-auto align-self-center">
                <a href="home.html" class="link text-color-theme">
                    <i class="bi bi-shop size-22"></i>
                </a>
            </div> --}}
        </div>
    </header>
    <!-- Header ends -->

    <!-- main page content -->
    <div class="main-container container">
        <!-- Ordernumber  -->
        {{-- <div class="row mb-3">
            <div class="col">
                <p class="text-opac">{{ $data->created_at }}</p>
            </div>
            <div class="col-auto text-end">
                <p class="text-opac"></p>
            </div>
        </div> --}}

        <!-- items -->
        <div class="row ">
            <div class="col-12">
                <div class="card shadow-sm product mb-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <figure class="text-center avatar-70 avatar">
                                    <img src="{{ asset('assets/img/product1.png') }}" alt="">
                                </figure>
                            </div>
                            <div class="col ps-0 align-self-center">
                                <p class="mb-0">
                                    <small class="text-opac">{{ $data->created_at }}</small>
                                </p>
                                <h6 class="text-color-theme">{{ ucfirst($data->laundry->laundry_name) }}</h6>
                                <div class="row">
                                    <div class="col">
                                        <p class="mb-0">Rp. {{ number_format($data->subtotal,2,',','.'); }} @if($data->weight == NULL) <br> <small>*Harga sebelum berat di timbang</small> @endif</p>
                                    </div>
                                    {{-- <div class="col-auto">
                                        <a href="#" class="link text-color-theme px-0">Cancel</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-light shadow-sm mb-4">
                    <ul class="list-group list-group-flush bg-none">
                        <li class="list-group-item">
                            <p class="mb-1 fw-bold">{{ ucfirst($data->status) }} </p>
                            <p class="text-opac">{{ $data->updated_at }}</p>
                        </li>
                        {{-- <li class="list-group-item">
                            <p class="mb-1 fw-bold">Packed </p>
                            <p class="text-opac">Tuesday 6th April 2021</p>
                        </li>
                        <li class="list-group-item">
                            <p class="mb-1 fw-bold">Packed-Up by Courier </p>
                            <p class="text-opac">Tuesday 6th April 2021 - 8:36 pm</p>
                        </li>
                        <li class="list-group-item">
                            <p class="mb-1 fw-bold">Shipped </p>
                            <p class="text-opac">Tuesday 6th April 2021 - 10:45 pm<br>From London,
                                Bridge Station</p>
                        </li>
                        <li class="list-group-item">
                            <p class="mb-1 fw-bold">Delivered </p>
                            <p class="text-opac">Monday 19th April 2021 - 9:10 pm<br>Item is delivered
                                to Mr. Falks Henchriyu</p>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>

        <!-- Button -->
        {{-- <div class="row mb-4">
            <div class="col-12 col-md-6 col-lg-4 mx-auto">
                <div class="row">
                    <div class="col align-self-center d-grid">
                        <a href="product.html" class="btn btn-default shadow-sm brn-block">Beli lagi</a>
                    </div>
                </div>
            </div>
        </div> --}}

    </div>
    <!-- main page content ends -->


</main>
@include('includes.footer')
@endsection