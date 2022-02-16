@extends('layout.admin')
@section('role', ucfirst(trans(auth()->user()->level)))
@section('title', 'Profile')
@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">                
            
        <div class="account-settings-container layout-top-spacing">

            <div class="account-content">
                <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <form method="post" action="{{ route('admin-profile-change-process', $data->user_id) }}" id="general-info" class="section general-info">
                                @csrf
                                <div class="info">
                                    <h6 class="">General Information</h6>
                                    <div class="row">
                                        <div class="col-lg-11 mx-auto">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-12 col-md-4">
                                                    <div class="upload mt-4 pr-md-4">
                                                        <input type="file" id="input-file-max-fs" class="dropify" data-default-file="assets/img/user-profile.jpeg" data-max-file-size="2M" />
                                                        <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Picture</p>
                                                    </div>
                                                </div>
                                                <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                    <div class="form">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="fullName">Nama lengkap</label>
                                                                    <input name="full_name" type="text" class="form-control mb-4" id="fullName" placeholder="Masukan nama lengkap" value="{{ $data->full_name }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="profession">Email</label>
                                                            <input name="email" type="email" class="form-control mb-4" id="profession" placeholder="Masukan email" value="{{ $data->email }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="profession">No Hp</label>
                                                            <input name="phone" type="phone" class="form-control mb-4" id="profession" placeholder="Masukan no hp" value="{{ $data->phone }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="profession">Password</label>
                                                            <input name="password" type="password" class="form-control mb-4" id="profession" placeholder="Masukan password">
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