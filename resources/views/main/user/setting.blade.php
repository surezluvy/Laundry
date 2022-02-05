@extends('layout.main')

@section('title', 'Setting')
@section('data-page', '')
@section('content')	
@include('includes.sidebar')
<main class="h-100 has-header has-footer">

    <!-- Header -->
    @include('includes.header')
    <!-- Header ends -->

    <!-- main page content -->
    <div class="main-container container">

        <!-- profile picture -->
        <div class="row  mb-4">
            <div class="col-auto">
                <figure class="avatar avatar-100 rounded mx-auto">
                    <img src="{{ asset('assets/img/user2.jpg') }}" alt="">
                </figure>
            </div>
            <div class="col align-self-center">
                <h5 class="">{{ ucfirst(trans(auth()->user()->full_name)) }}</h5>
                <p class="text-opac">{{ ucfirst(trans(auth()->user()->address)) }}</p>
            </div>
        </div>

        <!-- profile information -->
        <div class="row mb-3">
            <div class="col">
                <h5 class="mb-0">Basic Information</h5>
            </div>
        </div>

        <form action="" method="post">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card card-light shadow-sm mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group form-floating  mb-3">
                                        <input type="text" class="form-control" value="{{ auth()->user()->full_name }}" placeholder="Nama lengkap" id="names">
                                        <label for="names">Nama lengkap</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group form-floating  mb-3">
                                        <input type="email" class="form-control" value="{{ auth()->user()->email }}" placeholder="Email" id="email">
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group form-floating  mb-3">
                                        <input type="text" class="form-control" value="{{ auth()->user()->address }}" placeholder="Alamat" id="address">
                                        <label for="address">Alamat</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group form-floating  mb-3">
                                        <input type="number" class="form-control" value="{{ auth()->user()->phone }}" placeholder="No Hp" id="phone">
                                        <label for="phone">No Hp</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- change password -->
            <div class="row mb-3">
                <div class="col">
                    <h5 class="mb-0">Change Password</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-light shadow-sm mb-4">
                        <div class="card-body">
                            <div class="row h-100">
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-floating  mb-3">
                                        <input type="password" class="form-control" placeholder="Password"
                                            id="password">
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row h-100 mb-4">
                <div class="col-12 d-grid"><a href="settings.html" target="_self" class="btn btn-lg btn-default shadow-sm">Update</a></div>
            </div>
        
        </form>

    </div>
    <!-- main page content ends -->


</main>
@include('includes.footer')
@endsection