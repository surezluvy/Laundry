<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Register page</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('admin_assets/assets/img/favicon.ico') }}"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('admin_assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_assets/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_assets/assets/css/authentication/form-2.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/assets/css/forms/switches.css') }}">
</head>
<body class="form">
    

    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">Register</h1>
                        <p class="signup-link register">Sudah mempunyai akun? <a href="{{ route('admin-login') }}">Log in</a></p>
                        <form class="text-left" method="post" action="{{ route('admin-register') }}">
                            @csrf
                            <div class="form">

                                <div class="input">
                                    <label>Nama lengkap</label>
                                    <input name="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" placeholder="Masukan nama lengkap"  value="{{ old('full_name') }}">
                                    @error('full_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div><br>

                                <div class="input">
                                    <label>Email</label>
                                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukan email" value="{{ old('email') }}">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div><br>
                                
                                <div class="input">
                                    <label>No Hp</label>
                                    <input name="phone" type="number" class="form-control @error('phone') is-invalid @enderror" placeholder="Masukan no hp" value="{{ old('phone') }}">
                                    @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div><br>

                                <div id="password-field" class="input mb-2">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">Password</label>
                                    </div>
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                </div>

                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">Daftar</button>
                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>                    
                </div>
            </div>
        </div>
    </div>

    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('admin_assets/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('admin_assets/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin_assets/bootstrap/js/bootstrap.min.js') }}"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('admin_assets/assets/js/authentication/form-2.js') }}"></script>

</body>
</html>