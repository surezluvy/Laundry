<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>My Laundry - @yield('title')</title>

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    {{-- <link rel="manifest" href="{{ asset('assets/manifest.json') }}" /> --}}

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('assets/img/favicon180.png') }}" sizes="180x180">
    <link rel="icon" href="{{ asset('assets/img/favicon32.png') }}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{ asset('assets/img/favicon16.png') }}" sizes="16x16" type="image/png">

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- nouislider CSS -->
    <link href="{{ asset('assets/vendor/nouislider/nouislider.min.css') }}" rel="stylesheet">

    <!-- swiper css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/swiperjs-6.6.2/swiper-bundle.min.css') }}">

    <!-- style css for this template -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" id="style">
</head>

<body class="body-scroll @yield('body-class')" data-page="@yield('data-page')" onload="getLocation()">
{{-- <body class="body-scroll @yield('body-class')" data-page="@yield('data-page')" onload="getReverseGeocodingData('-7.362690', '109.265381')"> --}}

    <!-- loader section -->
    {{-- @include('includes.loader') --}}
    <!-- loader section ends -->

    <!-- Sidebar main menu -->
    {{-- @include('includes.sidebar') --}}
    <!-- Sidebar main menu ends -->

    <!-- Begin page -->
    @yield('content')	
    <!-- Page ends-->

    <!-- Footer -->
    {{-- @include('includes.footer') --}}
    <!-- Footer ends-->

    <!-- filter menu -->
    {{-- @include('includes.filter') --}}
    <!-- filter menu ends-->

    <!-- add cart modal -->
    {{-- <div class="modal fade" id="addproductcart" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content product border-0 shadow-sm">
                <figure class="text-center mb-0 px-5 py-3">
                    <img src="{{ asset('assets/img/apple.png') }}" alt="" class="mw-100">
                </figure>
                <div class="modal-body">
                    <p class="mb-1">
                        <small class="text-opac">Fresh</small>
                        <small class="float-end"><span class="text-opac">4.5</span> <i class="bi bi-star-fill text-warning"></i></small>
                    </p>
                    <a href="product.html" class="text-normal">
                        <h6 class="text-color-theme">Red Apple</h6>
                    </a>
                    <div class="row">
                        <div class="col">
                            <p class="mb-0">$12.00<br><small class="text-opac">per 1 kg</small></p>
                        </div>
                        <div class="col-auto">
                            <!-- button counter increamenter-->
                            <div class="counter-number">
                                <button class="btn btn-sm avatar avatar-30 p-0 rounded-circle">
                                    <i class="bi bi-dash size-22"></i>
                                </button>
                                <span>1</span>
                                <button class="btn btn-sm avatar avatar-30 p-0 rounded-circle">
                                    <i class="bi bi-plus size-22"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-link text-color-theme" data-bs-dismiss="modal">Done</button>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- add cart modal ends -->

    <!-- PWA app install toast message -->
    {{-- <div class="position-fixed bottom-0 start-50 translate-middle-x  z-index-9">
        <div class="toast mb-3" role="alert" aria-live="assertive" aria-atomic="true" id="toastinstall"
            data-bs-animation="true">
            <div class="toast-header">
                <img src="{{ asset('assets/img/favicon32.png') }}" class="rounded me-2" alt="...">
                <strong class="me-auto">Install PWA App</strong>
                <small>now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <div class="row">
                    <div class="col">
                        Click "Install" to install PWA app and experience as indepedent app.
                    </div>
                    <div class="col-auto align-self-center">
                        <button class="btn-default btn btn-sm" id="addtohome">Install</button>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else { 
                console.log("Geolocation is not supported by this browser.");
            }
        }
        function showPosition(position) {
            var lat = position.coords.latitude;
            var long = position.coords.longitude;
            document.querySelector('.registerForm input[name = "user_lat"]').value = lat;
            document.querySelector('.registerForm input[name = "user_long"]').value = long;
        }
        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                alert("Mohon nyalakan GPS anda");
                location.reload();
                break; 
            }
        }
        // function getReverseGeocodingData(lat, long) {
        //     var latlng = new google.maps.LatLng(lat, long);
        //     // This is making the Geocode request
        //     var geocoder = new google.maps.Geocoder();
        //     geocoder.geocode({ 'latLng': latlng }, function (results, status) {
        //         if (status !== google.maps.GeocoderStatus.OK) {
        //             alert(status);
        //         }
        //         // This is checking to see if the Geoeode Status is OK before proceeding
        //         if (status == google.maps.GeocoderStatus.OK) {
        //             console.log(results);
        //             var address = (results[0].formatted_address);
        //         }
        //     });
        // }
        
    </script>

    <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
    <!-- Required jquery and libraries -->
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-5/js/bootstrap.bundle.min.js') }}"></script>

    <!-- cookie js -->
    <script src="{{ asset('assets/js/jquery.cookie.js') }}"></script>

    <!-- PWA app service registration and works -->
    <script src="{{ asset('assets/js/pwa-services.js') }}"></script>

    <!-- swiper script -->
    <script src="{{ asset('assets/vendor/swiperjs-6.6.2/swiper-bundle.min.js') }}"></script>

    <!-- Progress circle js script -->
    <script src="{{ asset('assets/vendor/progressbar-js/progressbar.min.js') }}"></script>

    <!-- nouislider js -->
    <script src="{{ asset('assets/vendor/nouislider/nouislider.min.js') }}"></script>

    <!-- Customized jquery file  -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/color-scheme.js') }}"></script>

    <!-- page level custom script -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

</body>

</html>