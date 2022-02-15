@extends('layout.admin')
@section('role', 'Mitra')
@section('title', 'Dashboard')
@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">

            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget-one widget">
                    <div class="widget-content">
                        <div class="w-numeric-value">
                            <div class="w-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                            </div>
                            <div class="w-content">
                                <span class="w-value">3,192</span>
                                <span class="w-numeric-title">Total Orders</span>
                            </div>
                        </div>
                        <div class="w-chart">
                            <div id="total-orders"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-table-two">

                    <div class="widget-heading">
                        <h5 class="">Recent Orders</h5>
                    </div>

                    <div class="widget-content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><div class="th-content">Customer</div></th>
                                        <th><div class="th-content">Metode</div></th>
                                        <th><div class="th-content">Dibuat</div></th>
                                        <th><div class="th-content th-heading">Sub Total</div></th>
                                        <th><div class="th-content">Status</div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $d)
                                    <tr>
                                        <td><div class="td-content customer-name"><img src="{{ asset('admin_assets/assets/img/profile-13.jpeg') }}" alt="avatar"><span>Luke Ivory</span></div></td>
                                        <td><div class="td-content product-brand text-primary">{{ $d->metode }}</div></td>
                                        <td><div class="td-content product-invoice">{{ $d->created_at }}</div></td>
                                        <td><div class="td-content pricing"><span class="">Rp. {{ number_format($d->subtotal,2,',','.'); }}</span></div></td>
                                        <td><div class="td-content">
                                            <span class="badge 
                                                @if($d->status == 'menunggu') badge-info 
                                                @elseif($d->status == 'diproses') badge-primary
                                                @elseif($d->status == 'selesai') badge-success
                                                @endif
                                                badge-pills">
                                                @if($d->status == 'menunggu') <a href="{{ route('change-status', [$d->booking_id, '2']) }}" style="text-decoration:none; color: white"> {{ $d->status }} </a>
                                                @elseif($d->status == 'diproses') <a href="{{ route('change-status', [$d->booking_id, '3']) }}" style="text-decoration:none; color: white"> {{ $d->status }} </a>
                                                @elseif($d->status == 'selesai') <a href="{{ route('change-status', [$d->booking_id, '1']) }}" style="text-decoration:none; color: white"> {{ $d->status }} </a>
                                                @endif
                                            </span>
                                        </div></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="footer-wrapper">
        <div class="footer-section f-section-1">
            <p class="">Copyright © 2021 <a target="_blank" href="https://designreset.com">DesignReset</a>, All rights reserved.</p>
        </div>
        <div class="footer-section f-section-2">
            <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
        </div>
    </div>
</div>
@endsection