@extends('layouts.simple')

@section('styles')
    <style>
        #background-image-register:before{
            content:"";
            width:100vw;
            height:100vh;
            background-image: url('http://www.losestelares.com.mx/wp-content/uploads/2016/07/Organizacion-de-boda-3-2.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            position: absolute;
            top: 0;
            left: 0;
            transform: scaleX(-1);
        }
    </style>
@endsection

@section('content')
<div class="bg-image" id="background-image-register">
    <div class="row mx-0 bg-earth-op">
        <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
            <div class="p-30 invisible" data-toggle="appear">
                <p class="font-size-h3 font-w600 text-white mb-5">
                    We're very happy you are joining our community!
                </p>
                <p class="font-size-h5 text-white">
                    <i class="fa fa-angles-right"></i> Create your account today and receive 50% off.
                </p>
                <p class="font-italic text-white-op">
                    Copyright &copy; <span class="js-year-copy">2019</span>
                </p>
            </div>
        </div>
        <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white">
            <div class="content content-full">
                <div class="px-30 py-10">
                    <a class="link-effect font-w700" href="index.php">
                        <i class="si si-fire"></i>
                        <span class="font-size-xl text-primary-dark">code</span><span class="font-size-xl">base</span>
                    </a>
                    <h1 class="h3 font-w700 mt-30 mb-10">Create New Account</h1>
                    <h2 class="h5 font-w400 text-muted mb-0">Please add your details</h2>
                </div>
                <form class="js-validation-signup px-30" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                <label for="signup-username">Username</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                <label for="signup-email">Email</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                <label for="signup-password">Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                <label for="signup-password-confirm">Password Confirmation</label>
                            </div>
                        </div>
                    </div>
                    <!--
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="signup-terms" name="signup-terms">
                                <label class="custom-control-label" for="signup-terms">I agree to Terms &amp; Conditions</label>
                            </div>
                        </div>
                    </div>
                    -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-hero btn-alt-success">
                            <i class="fa fa-plus mr-10"></i> Create Account
                        </button>
                        <div class="mt-30">
                            <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="#" data-toggle="modal" data-target="#modal-terms">
                                <i class="fa fa-book text-muted mr-5"></i> Read Terms
                            </a>
                            <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{ route('login') }}">
                                <i class="fa fa-user text-muted mr-5"></i> Sign In
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
