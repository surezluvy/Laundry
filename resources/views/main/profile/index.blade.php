@extends('layout.main')
@section('title', 'Profile')
@section('content')
    <!-- header start -->
    <header>
        <div class="back-links">
            <a href="{{ route('home') }}">
                <i class="iconly-Arrow-Left icli"></i>
                <div class="content">
                    <h2>Profile</h2>
                </div>
            </a>
        </div>
    </header>
    <!-- header end -->

    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- profile section start -->
    <section class="top-space pt-0">
        <div class="profile-detail">
            <div class="media">
                <img src="assets/images/user/1.png" class="img-fluid" alt="">
                <div class="media-body">
                    <h2>{{ $session->full_name }}</h2>
                    <h6>{{ $session->email }}</h6>
                    <a href="{{ route('profile-edit') }}" class="edit-btn">Edit</a>
                </div>
            </div>
        </div>
    </section>
    <!-- profile section end -->


    <!-- link section start -->
    <div class="sidebar-content">
        <ul class="link-section">
            <li>
                <a href="order-history.html">
                    <i class="iconly-Document icli"></i>
                    <div class="content">
                        <h4>Orders</h4>
                        <h6>Ongoing Orders, Recent Orders..</h6>
                    </div>
                </a>
            </li>
            <li>
                <a href="saved-cards.html">
                    <i class="iconly-Wallet icli"></i>
                    <div class="content">
                        <h4>Payment</h4>
                        <h6>Saved Cards, Wallets</h6>
                    </div>
                </a>
            </li>
            <li>
                <a href="saved-address.html">
                    <i class="iconly-Location icli"></i>
                    <div class="content">
                        <h4>Saved Address</h4>
                        <h6>Home, office.. </h6>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('profile-edit') }}">
                    <i class="iconly-Password icli"></i>
                    <div class="content">
                        <h4>Profile setting</h4>
                        <h6>Full Name, Password..</h6>
                    </div>
                </a>
            </li>
        </ul>
        <div class="divider"></div>
        <ul class="link-section">
            <li>
                <a href="terms-condition.html">
                    <i class="iconly-Info-Square icli"></i>
                    <div class="content">
                        <h4>Terms & Conditions</h4>
                        <h6>T&C for use of Platform</h6>
                    </div>
                </a>
            </li>
            <li>
                <a href="help.html">
                    <i class="iconly-Call icli"></i>
                    <div class="content">
                        <h4>Help/Customer Care</h4>
                        <h6>Customer Support, FAQs</h6>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <div class="px-15">
        @if(session()->has('user'))
            <a href="{{ route('logout') }}" class="btn btn-outline w-100 content-color">KELUAR</a>
        @else
            <a href="{{ route('login') }}" class="btn btn-outline w-100 content-color">MASUK</a>
        @endif
    </div>
    <!-- link section end -->



    <!-- panel space start -->
    <section class="panel-space"></section>
    <!-- panel space end -->
@endsection