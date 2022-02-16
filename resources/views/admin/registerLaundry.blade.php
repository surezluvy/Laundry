@extends('layout.admin')
@section('role',  ucfirst(trans(auth()->user()->level)))
@section('title', 'Dashboard')
@section('content')
<div id="content" class="main-content">

    <div class="container">

        <div class="container" style="margin-top: 50px">

            <div class="row">

                <div class="col-lg-12 col-12  layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">                                
                            <div class="row text-center">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h3>Daftarkan laundry</h3>
                                </div>
                            </div>
                        </div><br>
                        <div class="widget-content widget-content-area">
                            <form method="post" action="{{ route('register-laundry') }}">
                                @csrf
                                <div class="form-group row  mb-4">
                                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nama laundry</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="laundry_name" class="form-control form-control-sm @error('laundry_name') is-invalid @enderror" id="colFormLabelSm" placeholder="Berkah jaya" value="{{ old('laundry_name') }}">
                                        @error('laundry_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label col-form-label-sm">Deskripsi laundry</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="laundry_description" class="form-control @error('laundry_description') is-invalid @enderror" id="colFormLabel" placeholder="Merupakan laundry terbaik" value="{{ old('laundry_description') }}">
                                        @error('laundry_description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-sm">Alamat laundry</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="laundry_address" class="form-control form-control-sm @error('laundry_address') is-invalid @enderror" id="colFormLabelLg" placeholder="Jl. gunung slamet no 3" value="{{ old('laundry_address') }}">
                                        @error('laundry_address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-sm">Detail alamat laundry</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="laundry_address_detail" class="form-control form-control-sm @error('laundry_address_detail') is-invalid @enderror" id="colFormLabelLg" placeholder="Dekat alfamart" value="{{ old('laundry_address_detail') }}">
                                        @error('laundry_address_detail')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-sm">Harga laundry<small> /kg</small></label>
                                    <div class="col-sm-10">
                                        <input type="number" name="laundry_price" class="form-control form-control-sm @error('laundry_price') is-invalid @enderror" id="colFormLabelLg" placeholder="3000" value="{{ old('laundry_price') }}">
                                        @error('laundry_price')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-sm">Jam buka laundry</label>
                                    <div class="col-sm-10">
                                        <input id="alternate-masks2" type="text" name="laundry_open" class="form-control @error('laundry_open') is-invalid @enderror" placeholder="07.00 - 19.00" value="{{ old('laundry_open') }}">
                                        @error('laundry_open')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <input type="submit" name="time" class="mb-4 btn btn-primary">
                            </form>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection