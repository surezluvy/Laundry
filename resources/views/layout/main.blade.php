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
  @include('includes.top-nav')
  @include('includes.sidebar')

  @yield('content')

  @include('includes.bottom-nav')

  <!-- pwa install app popup start -->
  <div class="offcanvas offcanvas-bottom addtohome-popup" tabindex="-1" id="offcanvas">
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    <div class="offcanvas-body small">
      <div class="app-info">
        <img src="assets/images/logo/logo48.png" class="img-fluid" alt="">
        <div class="content">
          <h3>Multikart App</h3>
          <a href="#">www.multikart-app.com</a>
        </div>
      </div>
      <a href="javascript:void(0)" class="btn btn-solid install-app" id="installApp">add to home screen</a>
    </div>
  </div>
  <!-- pwa install app popup end -->

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
      console.log("Latitude: " + lat + 
      " Longitude: " + long);
        '<?php $_SESSION["lat"] = "' + lat + '"; ?>';
        '<?php $_SESSION["long"] = "' + long + '"; ?>';
          // alert('<?php echo $_SESSION["long"] ?>');
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

  <!-- Slick js-->
  <script src="{{ asset('assets/js/homescreen-popup.js') }}"></script>

  <!-- timer js-->
  <script src="{{ asset('assets/js/timer.js') }}"></script>

  <!-- offcanvas modal js -->
  <script src="{{ asset('assets/js/offcanvas-popup.js') }}"></script>

  <!-- script js -->
  <script src="{{ asset('assets/js/script.js') }}"></script>

  <script src="https://kit.fontawesome.com/bd8cae4807.js" crossorigin="anonymous"></script>

</body>

</html>