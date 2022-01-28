@extends('layout.main')
@section('content')
  <div class="divider t-12 b-20"></div>
  <!-- category end -->

  <!-- home slider start -->
  <section class="pt-0 home-section ratio_55">
    <div class="home-slider slick-default theme-dots">
      <div>
        <div class="slider-box">
          <img src="assets/images/home-slider/1.jpg" class="img-fluid bg-img" alt="">
          <div class="slider-content">
            <div>
              <h2>Welcome To Multikart</h2>
              <h1>Flat 50% OFF</h1>
              <h6>Free Shipping Till Mid Night</h6>
              <a href="shop.html" class="btn btn-solid">SHOP NOW</a>
            </div>
          </div>
        </div>
      </div>
      <div>
        <div class="slider-box">
          <img src="assets/images/home-slider/2.jpg" class="img-fluid bg-img" alt="">
          <div class="slider-content">
            <div>
              <h2>Welcome To Multikart</h2>
              <h1>Flat 50% OFF</h1>
              <h6>Free Shipping Till Mid Night</h6>
              <a href="shop.html" class="btn btn-solid">SHOP NOW</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- home slider end -->
  
  <iframe src="https://www.google.com/maps?q=-7.4161,109.2899&hl=es;z=14&output=embed" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

  <!-- deals section start -->
  <section class="deals-section px-15 pt-0">
    <div class="title-part">
      <h2>Laundry terdekat</h2>
      <a href="shop.html">Lihat semua</a>
    </div>
    <div class="product-section">
      <div class="row gy-3">

        @foreach ($data as $d)
        <div class="col-12">
          <div class="product-inline">
            <a href="product.html">
              <img src="assets/images/products/1.jpg" class="img-fluid" alt="">
            </a>
            <div class="product-inline-content">
              <div>
                <a href="product.html">
                  <h4>{{ $d->laundry_name }}</h4>
                </a>
                <h5><i class="fas fa-map-marker-alt"></i> 1.2 km 
                  <label style="margin-left: 15px"><i class="fas fa-truck-pickup"></i> Rp. 7.000</label> 
                  <label style="margin-left: 15px"><i class="fas fa-map-marked-alt"></i> {{ $d->laundry_address }}</label>
                </h5>
                <div class="price">
                  <h4>Rp. {{ $d->laundry_price }} <del>Rp. 8.000</del><span>20%</span></h4>
                </div>
              </div>
            </div>
            <div class="wishlist-btn">
              <i class="iconly-Heart icli"></i>
              <i class="iconly-Heart icbo"></i>
              <div class="effect-group">
                <span class="effect"></span>
                <span class="effect"></span>
                <span class="effect"></span>
                <span class="effect"></span>
                <span class="effect"></span>
              </div>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </section>
  <div class="divider"></div>
  <!-- deals section end --

  <!-- panel space start -->
  <section class="panel-space"></section>
  <!-- panel space end -->
  
@endsection