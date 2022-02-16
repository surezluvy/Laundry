@extends('layout.admin')
@section('role', ucfirst(trans(auth()->user()->level)))
@section('title', 'Ubah data laundry')
@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">                
            
        <div class="account-settings-container layout-top-spacing">

            <div class="account-content">
                <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <form method="post" action="{{ route('admin-laundry-change-process', $data->laundry_id) }}" id="general-info" class="registerForm section general-info">
                                @csrf
                                <div class="info">
                                    <h6 class="">General Information</h6>
                                    <div class="row">
                                        <div class="col-lg-11 mx-auto">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                    <div class="form">
                                                        <div class="form-group row  mb-4">
                                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nama laundry</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="laundry_name" class="form-control form-control-sm @error('laundry_name') is-invalid @enderror" id="colFormLabelSm" placeholder="Berkah jaya" value="{{ $data->laundry_name }}">
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
                                                                <input type="text" name="laundry_description" class="form-control @error('laundry_description') is-invalid @enderror" id="colFormLabel" placeholder="Merupakan laundry terbaik" value="{{ $data->laundry_description }}">
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
                                                                <input type="text" name="laundry_address" class="form-control form-control-sm @error('laundry_address') is-invalid @enderror" id="colFormLabelLg" placeholder="Jl. gunung slamet no 3" value="{{ $data->laundry_address }}">
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
                                                                <input type="text" name="laundry_address_detail" class="form-control form-control-sm @error('laundry_address_detail') is-invalid @enderror" id="colFormLabelLg" placeholder="Dekat alfamart" value="{{ $data->laundry_address_detail }}">
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
                                                                <input type="number" name="laundry_price" class="form-control form-control-sm @error('laundry_price') is-invalid @enderror" id="colFormLabelLg" placeholder="3000" value="{{ $data->laundry_price }}">
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
                                                                <input id="alternate-masks2" type="text" name="laundry_open" class="form-control @error('laundry_open') is-invalid @enderror" placeholder="07.00 - 19.00" value="{{ $data->laundry_open }}">
                                                                @error('laundry_open')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-4">
                                                            <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-sm">Maps</label>
                                                            <div class="col-sm-10">
                                                                <h6 class="text-danger">Jika tampilan tidak berubah ke lokasi anda, mohon refresh atau aktifkan fitur lokasi pada browser/hp anda!</h6>
                                                                <input type="hidden" name="laundry_lat" class="form-control" placeholder="07.00 - 19.00" readonly="">
                                                                <input type="hidden" name="laundry_long" class="form-control" placeholder="07.00 - 19.00" readonly="">
                                                                <iframe id="maps" src="https://www.google.com/maps?q=,&hl=es;z=14&output=embed" class="maps rounded col-12 mb-3" style="height: 400px; width: 1250px" allowfullscreen="" loading="lazy"></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-settings-footer">
                                
                                    <div class="as-footer-container">
            
                                        <a href="{{ route('admin-profile') }}" id="multiple-reset" class="btn btn-primary">Kembali</a>
                                        <div class="blockui-growl-message">
                                            <i class="flaticon-double-check"></i>&nbsp; Settings Saved Successfully
                                        </div>
                                        <button type="submit" id="multiple-messages" class="btn btn-success">Save Changes</button>
            
                                    </div>
            
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>

        </div>
</div>
@endsection
@section('onload', 'getLocation()')
@section('javascript')
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
        document.querySelector('.registerForm input[name = "laundry_lat"]').value = lat;
        document.querySelector('.registerForm input[name = "laundry_long"]').value = long;
        document.querySelector('.registerForm iframe[id = "maps"]').src = 'https://www.google.com/maps?q='+lat+','+long+'&hl=es;z=14&output=embed';
        // var logo = document.getElementById('maps');
        // logo.src = 'https://www.google.com/maps?q='.lat.','.long.'&hl=es;z=14&output=embed';
        // document.getElementById("maps").src = 'https://www.google.com/maps?q='.lat.','.long.'&hl=es;z=14&output=embed';
        // document.querySelector('.maps').src = 'https://www.google.com/maps?q='.lat.','.long.'&hl=es;z=14&output=embed';
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