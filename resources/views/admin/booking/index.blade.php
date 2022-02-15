@extends('layout.admin')
@section('role', 'Booking')
@section('title', 'Dashboard')
@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing" id="cancel-row">
        
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                
                @if(session()->has('success'))
                    <div class="alert alert-success mb-4" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> {{ session('success') }} </div>
                @elseif(session()->has('error'))
                    <div class="alert alert-danger mb-4" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> {{ session('error') }} </div>
                @endif
                <div class="widget-content widget-content-area br-6" style="padding-top: 5px">
                    <div class="table-form">
                        {{-- <div class="form-group row mr-3">
                            <label for="min" class="col-sm-5 col-form-label col-form-label-sm">Minimum age:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form-control-sm" name="min" id="min" placeholder="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="max" class="col-sm-5 col-form-label col-form-label-sm">Maximum age:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form-control-sm" name="max" id="max" placeholder="">
                            </div>
                        </div> --}}

                    </div>
                    <table id="range-search" class="display table" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama <small>*Click pada nama untuk info lengkap</small></th>
                                <th>Metode</th>
                                <th>Subtotal</th>
                                <th>Berat</th>
                                <th>Dibuat</th>
                                <th>Status</th>
                                <th class="text-center dt-no-sorting">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                            <tr id="toggleAccordion">
                                <td>{{ $no++ }}</td>
                                <td class="collapsed " data-toggle="collapse" data-target="#defaultAccordion{{ $d->booking_id }}" aria-expanded="true" aria-controls="defaultAccordion{{ $d->booking_id }}">
                                    {{ $d->user->full_name }}
                                    <div id="defaultAccordion{{ $d->booking_id }}" class="collapse" aria-labelledby="headingOne1" data-parent="#toggleAccordion">
                                        <div class="card-body">
                                              <p class="">
                                                <ol>
                                                    <li>Nama lengkap : {{ $d->user->full_name }}</li>
                                                    <li>Email        : {{ $d->user->email }}</li>
                                                    <li>No Hp        : {{ $d->user->phone }}</li>
                                                    <li>Alamat       : {{ $d->user->address }}</li>
                                                    <li>Detail alamat: {{ $d->user->address_detail }}</li>
                                                </ol>
                                                <iframe src="https://www.google.com/maps?q={{ $d->user->user_lat }},{{ $d->user->user_long }}&hl=es;z=14&output=embed"
                                                    class="h-190 w-100 rounded mb-3" allowfullscreen="" loading="lazy"></iframe>
                                              </p>
                                        </div>
                                      </div>
                                </td>
                                <td>{{ $d->metode }}</td>
                                <td>Rp. {{ number_format($d->subtotal,2,',','.'); }}</td>
                                <td>
                                    @if($d->weight != NULL)
                                        {{ $d->weight }} Kg
                                    @else
                                        Belum di input
                                    @endif
                                </td>
                                <td>{{ $d->created_at }}</td>
                                <td>
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
                                </td>
                                <td class="text-center">
                                    <a href="#" data-toggle="modal" data-target="#modal{{ $d->booking_id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                    </a>
                                    <div id="modal{{ $d->booking_id }}" class="modal text-left" tabindex="-1" role="dialog" aria-labelledby="exampleModalPopoversLabel">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header" id="exampleModalPopoversLabel">
                                              <h5 class="modal-title" id="exampleModalRemoveAnimationLabel1">Edit</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                              </button>
                                            </div>
                                            <form method="post" action="{{ route('booking-update', $d->booking_id) }}">
                                                @csrf
                                                <div class="modal-body">
                                                    <h5 class="modal-text text-center">Masukan berat pakaian</h5>
                                                    <div class="form-group mb-3">
                                                        <input type="number" name="booking_id" value={{ $d->booking_id }}>
                                                        <input type="number" class="form-control" name="weight" aria-describedby="emailHelp1" placeholder="....">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                          </div>
                                         </div>
                                      </div>
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 table-cancel"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Metode</th>
                                <th>Subtotal</th>
                                <th>Berat</th>
                                <th>Dibuat</th>
                                <th>Status</th>
                                <th class="text-center dt-no-sorting">Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
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