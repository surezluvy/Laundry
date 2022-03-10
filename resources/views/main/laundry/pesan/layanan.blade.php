@extends('layout.main')

@section('title', 'Pemesanan')
@section('data-page', '')

@section('content')	
@include('includes.sidebar')
<main class="h-100 has-header has-footer">

    <!-- Header -->
    @include('includes.header')
    <!-- Header ends -->

    <!-- main page content -->
    @foreach ($data as $d)
    <div class="main-container container top-20">
        <!-- wizard links -->
        <div class="row justify-content-between wizard-wrapper mb-4 shadow-sm">
            <div class="col">
                <a href="{{ route('pesan', $d->laundry_id) }}" class="wizard-link active">
                    <i class="bi bi-bag shadow-sm"></i>
                    <span class="wizard-text">Layanan</span>
                </a>
            </div>
            <div class="col">
                <a href="#" class="wizard-link">
                    <i class="bi bi-bag shadow-sm"></i>
                    <span class="wizard-text">Metode</span>
                </a>
            </div>
            <div class="col">
                <a href="#" class="wizard-link">
                    <i class="bi bi-geo-alt shadow-sm"></i>
                    <span class="wizard-text">Alamat</span>
                </a>
            </div>
        </div>

        <!-- Payment Proccess -->
        <div class="row mb-3">
            <div class="col align-self-center">
                <h5 class="mb-0">Pilih layanan</h5>
            </div>
        </div>
        <div class="row mb-2">
            @foreach($layanan as $l)
            <div class="col-12 col-md-6 col-lg-4">
                <a href="{{ route('pesan', [$d->laundry_id, $l->layanan_id]) }}" class="card shadow-sm mb-3 product text-normal">
                    <div class="card-body">
                        <div class="row">
                            <div class="col align-self-center">
                                <p>{{ $l->nama }} <br> <small>Harga : {{ $l->harga }}</small></p>
                            </div>
                            <div class="col-auto align-self-center">
                                <i class="bi bi-chevron-right text-color-theme"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
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
                    <p>Jasa antar</p>
                </div>
                <div class="col-auto">Rp. {{ number_format($harga_ongkir,2,',','.') }}</div>
            </div>
            
            <div class="row fw-bold mb-4">
                <div class="mb-3 col-12">
                    <div class="dashed-line"></div>
                </div>
                <div class="col">
                    <p>Total</p>
                </div>
                <div class="col-auto">Rp. {{ number_format($total,2,',','.') }}</div>
            </div>
        </div>

    </div>
    @endforeach
    <!-- main page content ends -->

</main>

@include('includes.footer')
@endsection