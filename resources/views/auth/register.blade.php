<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Multikart">
    <meta name="keywords" content="Multikart">
    <meta name="author" content="Multikart">
    <link rel="manifest" href="{{ asset('assets/manifest.json') }}">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon" />
    <title>Multikart PWA App</title>
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{ asset('assets/images/favicon.png') }}">
    <meta name="theme-color" content="#ff4c3b" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="multikart">
    <meta name="msapplication-TileImage" content="{{ asset('assets/images/favicon.png') }}">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

    <!-- bootstrap css -->
    <link rel="stylesheet" id="rtl-link" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">

    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/slick.css') }}">

    <!-- iconly css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/iconly.css') }}">

    <!-- Theme css -->
    <link rel="stylesheet" id="change-link" type="text/css" href="{{ asset('assets/css/style.css') }}">

</head>

<body onload="getLocation();">

    <!-- loader strat -->
    <div class="loader">
        <span></span>
        <span></span>
    </div>
    <!-- loader end -->


    <!-- top design start -->
    <img src="{{ asset('assets/images/design.svg') }}" class="img-fluid design-top" alt="">
    <!-- top design end -->


    <!-- top bar start -->
    <div class="topbar-section">
        <a href="index.html"><img src="{{ asset('assets/images/logo.png') }}" class="img-fluid" alt=""></a>
        {{-- <a class="skip-cls" href="index.html">SKIP</a> --}}
    </div>
    <!-- top bar end -->

    <!-- login section start -->
    <section class="form-section px-15 top-space section-b-space">
        <h1>Hallo, <br>Silahkan isi form dibawah untuk mendaftar</h1>
        <form class="registerForm" method="post" action="{{ route('store') }}">
            @csrf
            <div class="form-floating mb-4">
                <input type="text" name="full_name" class="form-control @error('full_name') is-invalid @enderror" id="full_name" placeholder="Nama lengkap" value="{{ old('full_name') }}" required>
                <label for="full_name">Nama lengkap</label>
                @error('full_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-4">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{ old('email') }}" required>
                <label for="email">Email</label>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-4">
                <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="No. Hp" value="{{ old('phone') }}" required>
                <label for="phone">No. Hp</label>
                @error('phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-4">
                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Alamat" value="{{ old('address') }}" required>
                <label for="address">Alamat</label>
                @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-4">
                <input type="hidden" name="user_lat" class="form-control" value="">
                <label for="user_lat">Latitude</label>
            </div>
            <div class="form-floating mb-4">
                <input type="hidden" name="user_long" class="form-control" value="">
                <label for="user_long">Longitude</label>
            </div>
            <div class="form-floating mb-4">
                <input type="password" name="password" id="txtPassword" class="form-control @error('password') is-invalid @enderror" placeholder="password" value="{{ old('password') }}" required>
                <label>Password</label>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <div id="btnToggle" class="password-hs">
                    <i id="eyeIcon" class="iconly-Hide icli hide"></i>
                </div>
            </div>
            {{-- <a href="#" class="btn btn-solid w-100">Sign UP</a> --}}
            <button type="submit" class="btn btn-solid w-100">Daftar</button>
        </form>
        {{-- <div class="or-divider">
            <span>Or sign in with</span>
        </div>
        <div class="social-auth">
            <ul>
                <li>
                    <a href="#"><img src="{{ asset('assets/images/social/google.png') }}" class="img-fluid" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="{{ asset('assets/images/social/fb.png') }}" class="img-fluid" alt=""></a>
                </li>
                <li>
                    <a href="#"><img src="{{ asset('assets/images/social/apple.png') }}" class="img-fluid" alt=""></a>
                </li>
            </ul>
        </div> --}}
        <div class="bottom-detail text-center mt-3">
            <h4 class="content-color">Sudah mempunyai akun? <a class="title-color text-decoration-underline"
                    href="{{ route('login') }}">Masuk</a></h4>
        </div>
    </section>
    <!-- login section end -->

    <!-- panel space start -->
    <section class="panel-space"></section>
    <!-- panel space end -->

    <script type="text/javascript">
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
    </script>

    <!-- latest jquery-->
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Slick js-->
    <script src="{{ asset('assets/js/slick.js') }}"></script>

    <!-- password hide show js -->
    <script src="{{ asset('assets/js/password-hs.js') }}"></script>

    <!-- Filter js -->
    <script src="{{ asset('assets/js/filter.js') }}"></script>

    <!-- script js -->
    <script src="{{ asset('assets/js/script.js') }}"></script>

</body>

</html>