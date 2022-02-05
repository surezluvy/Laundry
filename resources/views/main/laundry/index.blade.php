@extends('layout.main')

@section('title', 'Home')
@section('data-page', 'home')

@section('content')	
@include('includes.loader')
@include('includes.sidebar')
<main class="h-100 has-header has-footer">

  <!-- Header -->
  @include('includes.header')
  <!-- Header ends -->

  <!-- main page content -->
  <div class="main-container container">

      <!-- search -->
      <div class="row mb-4">
          <div class="col">
            <form action="{{ route('home') }}" method="post">
                @csrf
                <div class="form-floating">
                    <input type="text" class="form-control is-valid" id="search" placeholder="Search" name="search">
                    <label for="search">Search</label>
                    <button type="submit" class="btn btn-link tooltip-btn d-block text-color-theme">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
          </div>
      </div>

      <!-- offerslides -->
      <div class="swiper-container offerslides mb-3">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper">
              <!-- Slides -->
              <div class="swiper-slide">
                  <div class="card shadow-sm card-theme">
                      <div class="card-body py-1">
                          <div class="row">
                              <div class="col-6">
                                  <img src="{{ asset('assets/img/Banner.png') }}" alt="" class="mw-100">
                              </div>
                              <div class="col text-start align-self-center ps-0">
                                  <h6 class="fw-normal mb-0">Season Discount</h6>
                                  <h2>50% OFF</h2>
                                  <p>Use Code<br><strong>"SEASON01"</strong></p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="swiper-slide">
                  <div class="card shadow-sm card-theme">
                      <div class="card-body py-1">
                          <div class="row">
                              <div class="col-6">
                                  <img src="{{ asset('assets/img/Banner3.png') }}" alt="" class="mw-100">
                              </div>
                              <div class="col text-start align-self-center ps-0">
                                  <h6 class="fw-normal mb-0">Special Discount</h6>
                                  <h2>65% OFF</h2>
                                  <p>Use Code<br><strong>"NEW004"</strong></p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="swiper-slide">
                  <div class="card shadow-sm card-theme">
                      <div class="card-body py-1">
                          <div class="row">
                              <div class="col-6">
                                  <img src="{{ asset('assets/img/Banner2.png') }}" alt="" class="mw-100">
                              </div>
                              <div class="col text-start align-self-center ps-0">
                                  <h6 class="fw-normal mb-0">Protein Discount</h6>
                                  <h2>20% OFF</h2>
                                  <p>Use Code<br><strong>"REAL20BK"</strong></p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="swiper-pagination pagination-offerslides"></div>
      </div>

      <!--News and announcements -->
      <div class="row mb-3">
          <div class="col">
              <h5 class="mb-0">Laundry terdekat</h5>
          </div>
          <div class="col">
              <a href="{{ route('all-laundry') }}" class="mb-0 float-end" style="text-decoration: none; color: grey">Lihat semua <i class="bi bi-arrow-right"></i></a>
          </div>
      </div>
      <div class="row mb-2">
        
        @if($data->count() == 0)
            <h5 class="mx-auto" style="color: red; text-align: center; margin-top: 50px;"><b>Data pencarian anda tidak ditemukan</b></h5>
        @endif

        @foreach ($data as $d)
          <div class="col-12 col-md-6 col-lg-3">
              <div class="card shadow-sm mb-3">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-auto">
                              <figure class="text-center mb-0 avatar avatar-90 coverimg page-bg rounded">
                                  <img src="{{ asset('assets/img/news1.jpg') }}" alt="">
                              </figure>
                          </div>
                          <div class="col ps-0">
                              <p class="small d-block mb-2">
                                  <span class="text-opac"><i class="bi bi-cash"></i> Rp. {{ number_format($d->laundry_price,2,',','.') }}</span>
                                  <span class="float-end"><span class="text-opac">{{ round($d->distance, 2); }} km</span> <i class="bi bi-truck"></i></span>
                              </p>
                              <a href="{{ route('detail', $d->laundry_id) }}" class="text-normal text-color-theme">
                                  <h6>{{ $d->laundry_name }}</h6>
                              </a>
                              <div class="mb-1">
                                <i class="bi bi-geo-alt"></i> {{ $d->laundry_address }}
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