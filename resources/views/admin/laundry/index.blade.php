@extends('layout.admin')
@section('role', 'Laundry')
@section('title', 'Dashboard')
@section('content')
<div id="content" class="main-content">
    
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing" id="cancel-row">
        
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">

                <div class="widget-content widget-content-area br-6">
                    <div class="table-form">
                        <button type="button" data-toggle="modal" data-target="#modalAdd" class="btn btn-primary btn-block mt-4 mb-1 me-3">
                            <span>Tambah +</span>
                        </button>

                        <div id="modalAdd" class="modal text-left" tabindex="-1" role="dialog" aria-labelledby="exampleModalPopoversLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" id="exampleModalPopoversLabel">
                                    <h5 class="modal-title" id="exampleModalRemoveAnimationLabel1">Tambah</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                    </button>
                                    </div>
                                    <form method="post" action="{{ route('register-laundry-admin') }}">
                                        @csrf
                                        <div class="modal-body">
                                            <h5 class="modal-text text-center">Tambah data laundry</h5>
                                            <div id="password-field" class="input mb-2">
                                                <div class="d-flex justify-content-between">
                                                    <label for="role">Mitra:</label>
                                                </div>
                                                <select id="role" name="user_id" class="form-control @error('role') is-invalid @enderror" placeholder="Password">
                                                    @foreach($user as $u)
                                                        <option value="{{ $u->user_id }}">{{ ucfirst($u->full_name) }}</option>
                                                    @endforeach
                                                    @if($user->count() == 0)
                                                        <option value="" selected readonly disabled>Tidak ada data</option>
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="control-label">Nama laundry:</label>
                                                <input @if($user->count() == 0) disabled @endif placeholder="Masukan nama laundry" type="text" name="laundry_name" class="form-control @error('laundry_name') is-invalid @enderror">
                                                @error('laundry_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="control-label">Deskripsi laundry:</label>
                                                <div class="input-group">
                                                    <input @if($user->count() == 0) disabled @endif placeholder="Masukan deskripsi laundry" type="text" name="laundry_description" class="form-control @error('laundry_description') is-invalid @enderror"> 
                                                    @error('laundry_description')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div> 
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="control-label">Alamat laundry:</label>
                                                <input @if($user->count() == 0) disabled @endif placeholder="Masukan alamat laundry" type="text" name="laundry_address" class="form-control @error('laundry_address') is-invalid @enderror">
                                                @error('laundry_address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="control-label">Detail alamat laundry:</label>
                                                <input @if($user->count() == 0) disabled @endif placeholder="Masukan detail alamat" type="text" name="laundry_address_detail" class="form-control @error('laundry_address_detail') is-invalid @enderror">
                                                @error('laundry_address_detail')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="control-label">Harga laundry<small> /kg</small>:</label>
                                                <input @if($user->count() == 0) disabled @endif placeholder="Masukan harga laundry" type="number" name="laundry_price" class="form-control @error('laundry_price') is-invalid @enderror">
                                                @error('laundry_price')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="control-label">Jam operasional:</label>
                                                <input @if($user->count() == 0) disabled @endif id="alternate-masks2" type="text" name="laundry_open" class="form-control @error('laundry_open') is-invalid @enderror" placeholder="07.00 - 19.00" value="{{ old('laundry_open') }}">
                                                @error('laundry_open')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                                        <button type="submit" class="btn btn-primary" @if($user->count() == 0) disabled @endif>Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
                                <th>Nama mitra</th>
                                <th>Nama laundry</th>
                                <th>Deskripsi</th>
                                <th>Alamat</th>
                                <th>Alamat Lengkap</th>
                                <th>Harga /kg</th>
                                <th>Jadwal buka</th>
                                <th>Status</th>
                                <th class="text-center dt-no-sorting">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $d->user->full_name }}</td>
                                <td>{{ $d->laundry_name }}</td>
                                <td>{{ $d->laundry_description }}</td>
                                <td>{{ $d->laundry_address }}</td>
                                <td>{{ $d->laundry_address_detail }}</td>
                                <td>Rp. {{ number_format($d->laundry_price,2,',','.'); }}</td>
                                <td>{{ $d->laundry_open }}</td>
                                <td>
                                    <button type="button" data-toggle="modal" data-target="#modalStatus{{ $d->laundry_id }}" class="btn @if($d->status == 'Belum dikonfirmasi') btn-danger @else btn-primary @endif mt-1 mb-1 me-3">
                                        <span>{{ $d->status }}</span>
                                    </button>

                                    <div id="modalStatus{{ $d->laundry_id }}" class="modal text-left" tabindex="-1" role="dialog" aria-labelledby="exampleModalPopoversLabel">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header" id="exampleModalPopoversLabel">
                                              <h5 class="modal-title" id="exampleModalRemoveAnimationLabel1">Ubah status</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                              </button>
                                            </div>
                                            <form method="post" action="{{ route('laundry-update-status', $d->laundry_id) }}">
                                                @csrf
                                                <input type="hidden" name="status" value="{{ $d->status }}">
                                                <div class="modal-body text-center">
                                                    <h5 class="modal-text">Ubah status laundry</h5>
                                                    <h7 class="modal-text">Apakah anda yakin akan mengubah status laundry <br> menjadi <strong>@if($d->status == 'Belum dikonfirmasi') Sudah dikonfirmasi @else Belum dikonfirmasi @endif</strong> <strong><br>{{ $d->laundry_name }}</strong>?</h7>
                                                </div>
                                                <div class="modal-footer">
                                                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                                                <button type="submit" class="btn btn-primary">Ubah</button>
                                                </div>
                                            </form>
                                          </div>
                                         </div>
                                      </div>
                                </td>
                                <td class="text-center">
                                    <a href="#" data-toggle="modal" data-target="#modal{{ $d->laundry_id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                    </a>
                                    <div id="modal{{ $d->laundry_id }}" class="modal text-left" tabindex="-1" role="dialog" aria-labelledby="exampleModalPopoversLabel">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header" id="exampleModalPopoversLabel">
                                              <h5 class="modal-title" id="exampleModalRemoveAnimationLabel1">Edit</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                              </button>
                                            </div>
                                            <form method="post" action="{{ route('laundry-update', $d->laundry_id) }}">
                                                @csrf
                                                <div class="modal-body">
                                                    <h5 class="modal-text text-center">Update data Laundry</h5>
                                                    <div class="form-group mb-4">
                                                        <label class="control-label">Nama laundry:</label>
                                                        <input type="text" name="laundry_name" class="form-control" value="{{ $d->laundry_name }}">
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label class="control-label">Deskripsi:</label>
                                                        <div class="input-group"> 
                                                            <input type="text" name="laundry_description" class="form-control"  value="{{ $d->laundry_description }}"> 
                                                        </div> 
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label class="control-label">Alamat:</label>
                                                        <input type="text" name="laundry_address" class="form-control"  value="{{ $d->laundry_address }}">
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label class="control-label">Detail alamat:</label>
                                                        <input type="text" name="laundry_address_detail" class="form-control"  value="{{ $d->laundry_address_detail }}">
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label class="control-label">Harga:</label>
                                                        <input type="number" name="laundry_price" class="form-control"  value="{{ $d->laundry_price }}">
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label class="control-label">Jadwal buka:</label>
                                                        <input type="text" name="laundry_open" class="form-control"  value="{{ $d->laundry_open }}">
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
                                    <a href="#" data-toggle="modal" data-target="#modal2{{ $d->laundry_id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 table-cancel"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </a>

                                    <div id="modal2{{ $d->laundry_id }}" class="modal text-left" tabindex="-1" role="dialog" aria-labelledby="exampleModalPopoversLabel">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header" id="exampleModalPopoversLabel">
                                              <h5 class="modal-title" id="exampleModalRemoveAnimationLabel1">Delete</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                              </button>
                                            </div>
                                            <form method="post" action="{{ route('laundry-delete', $d->laundry_id) }}">
                                                @csrf
                                                <div class="modal-body text-center">
                                                    <h5 class="modal-text">Delete data laundry</h5>
                                                    <h7 class="modal-text">Apakah anda yakin akan menghapus laundry <strong>{{ $d->laundry_name }}</strong>?</h7>
                                                </div>
                                                <div class="modal-footer">
                                                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                                                <button type="submit" class="btn btn-primary">Hapus</button>
                                                </div>
                                            </form>
                                          </div>
                                         </div>
                                      </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama mitra</th>
                                <th>Nama laundry</th>
                                <th>Deskripsi</th>
                                <th>Alamat</th>
                                <th>Alamat Lengkap</th>
                                <th>Harga /kg</th>
                                <th>Jadwal buka</th>
                                <th class="text-center dt-no-sorting">Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>

        </div>
<!-- <div class="footer-wrapper">
        <div class="footer-section f-section-1">
            <p class="">Copyright © 2021 <a target="_blank" href="https://designreset.com">DesignReset</a>, All rights reserved.</p>
        </div>
        <div class="footer-section f-section-2">
            <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
        </div>
    </div> -->
</div>
@endsection