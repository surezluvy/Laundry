@extends('layout.admin')

@if(auth()->user()->level == 'mitra' && auth()->user()->hasLaundry() == false)
    @section('onload', 'modal()')
@elseif(auth()->user()->level == 'admin' && $ongkir->count() == 0)
    @section('onload', 'modalAdmin()')
@endif

@section('role',  ucfirst(trans(auth()->user()->level)))
@section('title', 'Dashboard')
@section('content')

<div id="content" class="main-content">

    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">

            @if(auth()->user()->level != 'admin')	
            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 layout-spacing">

                <div class="widget widget-account-invoice-three">

                    <div class="widget-heading">
                        <div class="wallet-usr-info">
                            <div class="usr-name">
                                <span><img src="{{ asset('admin_assets/assets/img/profile-32.jpeg') }}" alt="admin-profile" class="img-fluid"> {{ ucfirst(trans(auth()->user()->full_name)) }}</span>
                            </div>
                        </div>
                        <div class="wallet-balance">
                            <p>Pendapatan</p>
                            <h5 class=""><span class="w-currency">Rp. {{ number_format($total->total,2,',','.'); }}</h5>
                        </div>
                    </div>

                    {{-- <div class="widget-amount">

                        <div class="w-a-info funds-received">
                            <span>Received <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up"><polyline points="18 15 12 9 6 15"></polyline></svg></span>
                            <p>$97.99</p>
                        </div>

                        <div class="w-a-info funds-spent">
                            <span>Spent <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></span>
                            <p>$53.00</p>
                        </div>
                    </div>

                    <div class="widget-content">

                        <div class="bills-stats">
                            <span>Pending</span>
                        </div>

                        <div class="invoice-list">

                            <div class="inv-detail">
                                <div class="info-detail-1">
                                    <p>Netflix</p>
                                    <p><span class="w-currency">$</span> <span class="bill-amount">13.85</span></p>
                                </div>
                                <div class="info-detail-2">
                                    <p>BlueHost VPN</p>
                                    <p><span class="w-currency">$</span> <span class="bill-amount">15.66</span></p>
                                </div>
                            </div>

                            <div class="inv-action">
                                <a href="javascript:void(0);" class="btn btn-outline-primary view-details">View Details</a>
                                <a href="javascript:void(0);" class="btn btn-outline-primary pay-now">Pay Now $29.51</a>
                            </div>
                        </div>
                    </div> --}}

                </div>
            </div>

            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-table-two">

                    <div class="widget-heading">
                        <h5 class="">Pesanan terbaru</h5>
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
                                        <td><div class="td-content customer-name"><img src="{{ asset('admin_assets/assets/img/profile-13.jpeg') }}" alt="avatar"><span>{{ ucfirst(trans(auth()->user()->full_name)) }}</span></div></td>
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
            @endif

            @if(auth()->user()->level == 'admin')
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-table-two">

                    <div class="widget-heading">
                        <h5 class="">Transaksi terbaru</h5>
                    </div>

                    <div class="widget-content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><div class="th-content">Customer</div></th>
                                        <th><div class="th-content">Laundry</div></th>
                                        <th><div class="th-content">Metode</div></th>
                                        <th><div class="th-content th-heading">Status</div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($booking as $b)
                                        <tr>
                                            <td><div class="td-content customer-name"><img src="{{ asset('admin_assets/assets/img/profile-13.jpeg') }}" alt="avatar"><span>{{ $b->user->full_name }}</span></div></td>
                                            <td><div class="td-content product-brand text-primary">{{ $b->laundry->laundry_name }}</div></td>
                                            <td><div class="td-content product-invoice">{{ $b->metode }}</div></td>
                                            <td><div class="td-content"><span class="badge @if($b->status == 'menunggu') badge-secondary @elseif($b->status == 'diproses') badge-info @else badge-success @endif">{{ $b->status }}</span></div></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-table-two">

                    <div class="widget-heading">
                        <h5 class="">User terbaru</h5>
                    </div>

                    <div class="widget-content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><div class="th-content">Nama</div></th>
                                        <th><div class="th-content">Email</div></th>
                                        <th><div class="th-content">No Hp</div></th>
                                        <th><div class="th-content th-heading">Role</div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($user as $u)
                                        <tr>
                                            <td><div class="td-content customer-name"><img src="{{ asset('admin_assets/assets/img/profile-13.jpeg') }}" alt="avatar"><span>{{ $u->full_name }}</span></div></td>
                                            <td><div class="td-content product-brand text-primary">{{ $u->email }}</div></td>
                                            <td><div class="td-content product-invoice">{{ $u->phone }}</div></td>
                                            <td><div class="td-content"><span class="badge @if($u->level == 'mitra') badge-success @else badge-secondary @endif">{{ $u->level }}</span></div></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endif

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