@extends('layout.main')
@section('title', 'Home')
@section('content')

    <!-- search panel start -->
    <div class="search-panel top-space xl-space px-15">
        <div class="search-bar">
            <input class="form-control form-theme" placeholder="Search">
            <i class="iconly-Search icli search-icon"></i>
            <i class="iconly-Camera icli camera-icon"></i>
        </div>
        <div class="filter-btn" data-bs-toggle="modal" data-bs-target="#filterModal">
            <i class="iconly-Filter icli"></i>
        </div>
    </div>
    <!-- search panel end -->
    
  <!-- deals section start -->
  <section class="deals-section px-15 pt-0">
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
                <h5><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;{{ round($d->distance, 2); }} km 
                  <label style="margin-left: 15px"><i class="fas fa-truck-pickup"></i>&nbsp;&nbsp;Rp. 7.000</label> 
                  <label style="margin-left: 15px"><i class="fas fa-map-marked-alt"></i>&nbsp;&nbsp;{{ $d->laundry_address }}</label>
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
  {{-- <div class="divider"></div> --}}
  <!-- deals section end --

    <!--  filter modal start  -->
  <div class="modal filter-modal" id="filterModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h2>Filters</h2>
          <a href="javascript:void(0)" data-bs-dismiss="modal"><img src="assets/svg/x-dark.svg" class="img-fluid" alt=""></a>
        </div>
        <div class="modal-body">
          <div class="filter-box">
            <h2 class="filter-title">Sort By:</h2>
            <div class="filter-content">
              <select class="form-select form-control form-theme" aria-label="Default select example">
                <option selected>Recommended</option>
                <option value="1">Popularity</option>
                <option value="2">What's New</option>
                <option value="3">Price: High to Low</option>
                <option value="4">Price: Low to High</option>
                <option value="5">Customer rating</option>
              </select>
            </div>
          </div>
          <div class="filter-box">
            <h2 class="filter-title">Brand:</h2>
            <div class="filter-content">
              <ul class="row filter-row g-3">
                <li class="col-6">
                  <div class="filter-col">Here & Now</div>
                </li>
                <li class="col-6">
                  <div class="filter-col">Zara</div>
                </li>
                <li class="col-6 active">
                  <div class="filter-col">Mast & harbour</div>
                </li>
                <li class="col-6">
                  <div class="filter-col">Tokyo talkies</div>
                </li>
                <li class="col-6">
                  <div class="filter-col">Vogue</div>
                </li>
                <li class="col-6">
                  <div class="filter-col">gucci</div>
                </li>
              </ul>
            </div>
          </div>
          <div class="filter-box">
            <h2 class="filter-title">Size:</h2>
            <div class="filter-content">
              <ul class="row filter-row g-3">
                <li class="col-4">
                  <div class="filter-col">small</div>
                </li>
                <li class="col-4">
                  <div class="filter-col">Medium</div>
                </li>
                <li class="col-4">
                  <div class="filter-col">large</div>
                </li>
                <li class="col-4">
                  <div class="filter-col">XL</div>
                </li>
                <li class="col-4">
                  <div class="filter-col">2XL</div>
                </li>
              </ul>
            </div>
          </div>
          <div class="filter-box">
            <h2 class="filter-title">Price:</h2>
            <div class="filter-content">
              <div class="range-slider pricing-slider">
                <input type="text" class="js-range-slider" value="" />
              </div>
            </div>
          </div>
          <div class="filter-box">
            <h2 class="filter-title">Occasion:</h2>
            <div class="filter-content">
              <ul class="row filter-row g-3">
                <li class="col-6">
                  <div class="filter-col">Casual</div>
                </li>
                <li class="col-6">
                  <div class="filter-col">sports</div>
                </li>
                <li class="col-6">
                  <div class="filter-col">beach wear</div>
                </li>
                <li class="col-6">
                  <div class="filter-col">lounge wear</div>
                </li>
                <li class="col-6">
                  <div class="filter-col">formal</div>
                </li>
                <li class="col-6">
                  <div class="filter-col">party</div>
                </li>
              </ul>
            </div>
          </div>
          <div class="filter-box">
            <h2 class="filter-title">Colors:</h2>
            <div class="filter-content">
              <ul class="filter-color">
                <li>
                  <div class="color-box light-purple"></div>
                </li>
                <li class="active">
                  <div class="color-box light-grey"></div>
                </li>
                <li>
                  <div class="color-box blue-purple"></div>
                </li>
                <li>
                  <div class="color-box light-orange"></div>
                </li>
                <li>
                  <div class="color-box dark-pink"></div>
                </li>
                <li>
                  <div class="color-box green-blue"></div>
                </li>
                <li>
                  <div class="color-box green"></div>
                </li>
                <li>
                  <div class="color-box blue"></div>
                </li>
                <li>
                  <div class="color-box yellow"></div>
                </li>
                <li>
                  <div class="color-box light-red"></div>
                </li>
                <li>
                  <div class="color-box light-purple2"></div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <a href="javascript:void(0)" class="reset-link" data-bs-dismiss="modal">RESET</a>
          <a href="javascript:void(0)" class="btn btn-solid" data-bs-dismiss="modal">apply filters</a>
        </div>
      </div>
    </div>
  </div>
  <!-- filter modal end -->

  <!-- panel space start -->
  <section class="panel-space"></section>
  <!-- panel space end -->
  
@endsection