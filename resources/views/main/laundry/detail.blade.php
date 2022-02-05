@extends('layout.main')
@section('title', 'Detail Laundry')
@section('data-page', 'product')
@section('content')
@include('includes.sidebar')
<main class="h-100 has-header">

    <!-- Header -->
    @include('includes.header')
    <!-- Header ends -->

    <!-- main page content -->
    
    @foreach ($data as $d)
    <div class="main-container container">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm mb-4">
                    <div class="card-body pb-0 position-relative">
                        <div class="position-absolute top-0 end-0 m-3 z-index-9">
                            <button class="btn btn-sm avatar avatar-30 p-0 rounded-circle btn-outline-info me-2"
                                type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                                aria-expanded="false" aria-controls="collapseExample">
                                <i class="bi bi-share"></i>
                            </button>
                            <button class="btn btn-sm avatar avatar-30 p-0 rounded-circle btn-outline-danger">
                                <i class="bi bi-heart"></i>
                            </button>
                        </div>
                        <div class="swiper-container imageswiper">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                <div class="swiper-slide text-center mb-0">
                                    <img src="{{ asset('assets/img/apple.png') }}" alt="" class="h-190 mb-2">
                                </div>
                                <div class="swiper-slide text-center mb-0">
                                    <img src="{{ asset('assets/img/apple.png') }}" alt="" class="h-190 mb-2">
                                </div>
                                <div class="swiper-slide text-center mb-0">
                                    <img src="{{ asset('assets/img/apple.png') }}" alt="" class="h-190 mb-2">
                                </div>
                            </div>
                            <div class="swiper-pagination imageswiper-pagination "></div>
                        </div>
                    </div>
                    <div class="collapse" id="collapseExample">
                        <div class="card-footer justify-content-center text-center">
                            <p class="mb-1 text-opac">Share laundry with</p>
                            <a href="#" class="btn btn-link text-color-theme"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="btn btn-link text-color-theme"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="btn btn-link text-color-theme"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="btn btn-link text-color-theme"><i class="bi bi-google"></i></a>
                        </div>
                    </div>
                </div>
                <p class="mb-1">
                    <span class="text-opac"><i class="bi bi-geo-alt"></i> {{ $d->laundry_address }}</span>
                    <span class="float-end"><span class="text-opac">{{ round($d->distance, 2); }} km</span> <i class="bi bi-truck"></i></span>
                </p>
                <h4 class="text-color-theme mb-3">{{ $d->laundry_name }}</h4>
                <div class="row mb-4">
                    <div class="col">
                        <h5 class="mb-0">Rp. {{ number_format($d->laundry_price,2,',','.') }} /kg</h5>
                        <p class="text-opac">10:00am - 11:00pm</p>
                    </div>
                    {{-- <div class="col-auto align-self-center">
                        <!-- button counter increamenter-->
                        <div class="counter-number">
                            <button class="btn btn-sm avatar avatar-30 p-0 rounded-circle">
                                <i class="bi bi-dash size-22"></i>
                            </button>
                            <span>2</span>
                            <button class="btn btn-sm avatar avatar-30 p-0 rounded-circle">
                                <i class="bi bi-plus size-22"></i>
                            </button>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>

        <!-- delivery time -->
        <div class="row">
            <div class="col-12">
                <div class="card card-light shadow-sm mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col align-self-center">
                                <iframe src="https://www.google.com/maps?q={{ $d->laundry_lat }},{{ $d->laundry_long }}&hl=es;z=14&output=embed"
                                class="h-190 w-100 rounded mb-3" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- description -->
        <div class="row mb-3">
            <div class="col">
                <h5 class="mb-0">Deskripsi laundry</h5>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12">
                <p class="text-opac">{{ $d->laundry_description }}</p>
                <h5>Fitur laundry</h5>
                <ol class="text-opac">
                    @foreach($fitur as $f)
                        <li>{{ $f->laundryFitur_name }}</li>
                    @endforeach
                </ol>
            </div>
        </div>

        
        <div class="row mb-3">
            <div class="col align-self-center d-grid">
                <a href="{{ route('pesan', $d->laundry_id) }}" class="btn btn-default btn-lg shadow-sm">Pesan</a>
            </div>
        </div>

        <!-- description of vitamins -->
        {{-- <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow-sm mb-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-4">
                                <div id="progressCircle1" class="small-circle d-inline-block me-2"></div>
                                <div class="d-inline-block">
                                    <p class="lh-16"><small class="text-opac">Carbs</small><br>75g</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div id="progressCircle2" class="small-circle d-inline-block me-2"></div>
                                <div class="d-inline-block">
                                    <p class="lh-16"><small class="text-opac">Fat</small><br>45g</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div id="progressCircle3" class="small-circle d-inline-block me-2"></div>
                                <div class="d-inline-block">
                                    <p class="lh-16"><small class="text-opac">Protein</small><br>105g</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <p class="text-opac">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque
                            sollicitudin dignissim nisi, eget malesuada ligula ultricies sit amet. Suspendisse
                            efficitur ex eu est placerat mattis.</p>
                    </div>
                </div>
                <p class="text-opac small">** Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque
                    sollicitudin dignissim nisi, eget malesuada ligula ultricies sit amet. Suspendisse
                    efficitur ex eu est placerat mattis.</p>
            </div>
        </div> --}}

        <!-- Available at shops -->
        <div class="row mb-3">
            <div class="col">
                <h5 class="mb-0">Laundry terdekat lainnya</h5>
            </div>
        </div>

        <!-- shop slides -->
        <div class="row">
            <div class="col-12 px-0">
                <div class="swiper-container shopslides mb-4">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">


                        <!-- Slides -->
                        @foreach($latest as $last)
                        <div class="swiper-slide">
                            <div class="card shadow-sm ">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-auto">
                                            <figure class="text-center mb-0 avatar avatar-60 page-bg rounded">
                                                <i class="bi bi-shop size-24 text-color-theme"></i>
                                            </figure>
                                        </div>
                                        <div class="col">
                                            <a href="{{ route('detail', $last->laundry_id) }}" class="text-normal text-color-theme">
                                                <h6 class="mb-1">{{ $last->laundry_name }} <i class="bi bi-arrow-up-right-circle text-color-theme float-end"></i></h6>
                                            </a>
                                            <p class="mb-1">{{ $last->laundry_address }}</p>
                                            <p class="small d-block">
                                                <span class="text-opac">10:00am - 11:00pm</span>
                                                <span class="float-end"><span class="text-opac">{{ round($last->distance, 2); }} km</span> <i class="bi bi-truck"></i></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- main page content ends -->

</main>
@endsection