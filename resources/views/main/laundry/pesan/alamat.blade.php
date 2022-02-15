@extends('layout.main')

@section('title', 'Pemesanan')
@section('data-page', '')

@section('content')	
@include('includes.sidebar')
<main class="h-100 has-header">

    <!-- Header -->
    @include('includes.header')
    <!-- Header ends -->

    <!-- main page content -->
    @foreach ($data as $d)
    <div class="main-container container top-20">
        <!-- wizard links -->
        <div class="row justify-content-between wizard-wrapper mb-4 shadow-sm">
            <div class="col">
                <a href="{{ route('pesan', $d->laundry_id) }}" class="wizard-link filled">
                    <i class="bi bi-bag shadow-sm"></i>
                    <span class="wizard-text">Metode</span>
                </a>
            </div>
            <div class="col">
                <a href="#" class="wizard-link active">
                    <i class="bi bi-geo-alt shadow-sm"></i>
                    <span class="wizard-text">Alamat</span>
                </a>
            </div>
        </div>

        <!-- address -->
        <div class="row mb-3">
            <div class="col align-self-center">
                @if($metode == 'antar')
                    <h5 class="mb-0">Lokasi antar<br>
                        <span class="text-opac small">Silahkan antarkan pakaian anda ke lokasi laundry berikut</span>
                    </h5>
                @else
                    <h5 class="mb-0">Lokasi jemput<br>
                        <span class="text-opac small">Mitra akan menjemput pakaian anda pada lokasi anda</span>
                    </h5>
                @endif
            </div>
            <div class="col-auto pe-0 align-self-center">
                @if($metode == 'jemput')
                    <a href="{{ route('setting') }}" class="link text-color-theme">Ubah alamat <i class="bi bi-chevron-right"></i></a>
                @endif
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card shadow-sm product mb-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col align-self-center">
                                @if($metode == 'antar')
                                    <h5 class="mb-0">{{ $d->laundry_address }}</h5>
                                @else
                                    <h5 class="mb-0">{{ auth()->user()->address }}</h5>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if($metode == 'antar')
                            <iframe src="https://www.google.com/maps?q={{ $d->laundry_lat }},{{ $d->laundry_long }}&hl=es;z=14&output=embed" class="h-190 w-100 rounded mb-3" allowfullscreen="" loading="lazy"></iframe>
                        @else
                            <iframe src="https://www.google.com/maps?q={{ auth()->user()->user_lat }},{{ auth()->user()->user_long }}&hl=es;z=14&output=embed" class="h-190 w-100 rounded mb-3" allowfullscreen="" loading="lazy"></iframe>
                        @endif
                        <div class="row">
                            <div class="col">
                                @if($metode == 'antar')
                                    {{ $d->laundry_address_detail }}
                                @else
                                    {{ auth()->user()->address_detail }}
                                @endif
                            </div>
                            <div class="col-auto text-end">
                               <small class="text-opac">{{ round($d->distance, 2); }} km <i class="bi bi-geo-alt"></i></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- pricing -->
        <div>
            <div class="row mb-3">
                <div class="col align-self-center">
                    <h5 class="mb-0">Total</h5>
                    <h8>*Belum disesuaikan dengan total berat pakaian</h8>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <p>Harga laundry /kg</p>
                </div>
                <div class="col-auto">Rp. {{ number_format($d->laundry_price,2,',','.') }}</div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <p>Jasa antar</p>
                </div>
                <div class="col-auto">Rp. {{ number_format($harga_ongkir,2,',','.'); }}</div>
            </div>
            @if($metode == 'antar')
                <div class="row mb-3">
                    <div class="col">
                        <p>Metode antar</p>
                    </div>
                    <div class="col-auto">- Rp. {{ number_format(5000,2,',','.'); }}</div>
                </div>
            @endif
            
            <div class="row fw-bold mb-4">
                <div class="mb-3 col-12">
                    <div class="dashed-line"></div>
                </div>
                <div class="col">
                    <p>Total</p>
                </div>
                <div class="col-auto">Rp. {{ number_format($total,2,',','.'); }}</div>
            </div>
        </div>

        <!-- Button -->
        <div class="row mb-3">
            <form action="{{ route('proses_pesan') }}" method="post">
                @csrf
                <div class="col align-self-center d-grid">
                    <input type="hidden" name="laundry_id" value="{{ $d->laundry_id }}" required>
                    <input type="hidden" name="user_id" value="{{ auth()->user()->user_id }}" required>
                    <input type="hidden" name="metode" value="{{ $metode }}" required>
                    <input type="hidden" name="subtotal" value="{{ $subtotal }}" required>

                    <button type="submit" class="btn btn-default btn-lg shadow-sm">Proses</button>
                </div>
            </form>
        </div>

        <div style="margin-bottom: 80px"></div>

    </div>
            
    @endforeach
    <!-- main page content ends -->


</main>

@include('includes.footer')
@endsection