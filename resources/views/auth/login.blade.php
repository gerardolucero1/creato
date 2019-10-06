@extends('layouts.simple')

@section('styles')
    <style>
        #background-image-login:before{
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
<div class="bg-image" id="background-image-login">
    <div class="row mx-0 bg-black-op">
        <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
            <div class="p-30 invisible" data-toggle="appear">
                <p class="font-size-h3 font-w600 text-white">
                    Get Inspired and Create.
                </p>
                <p class="font-italic text-white-op">
                    Copyright &copy; <span class="js-year-copy">2019</span> Creato Studio - Todos los derechos reservados.
                </p>
            </div>
        </div>
        <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white invisible" data-toggle="appear" data-class="animated fadeInRight">
            <div class="content content-full">
                <div class="px-30 py-10">
                    <a class="font-w700" href="index.php">
                        <img class="creato-logo" src="https://img1.wsimg.com/isteam/ip/c61c6bbe-8c4b-487a-8931-330fb513cba4/logo/cf928107-e87c-4e5b-b2a9-50d94529bfbe.png" width="190px" alt="Creato-studio-logo">
                    </a>
                    <h1 class="h3 font-w700 mt-30 mb-10">Welcome to Creato</h1>
                    <h2 class="h5 font-w400 text-muted mb-0">Please sign</h2>
                </div>
                <form class="js-validation-signin px-30" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                <label for="login-username">Email</label>
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
                                <label for="login-password">Password</label>
                            </div>
                        </div>
                    </div>
                    <!--
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="login-remember-me" name="login-remember-me">
                                    <label class="custom-control-label" for="login-remember-me">Recordar usuario</label>    
                            </div>
                        </div>
                    </div>
                    -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-hero btn-alt-primary">
                            <i class="si si-login mr-10"></i> Sign in
                        </button>
                        <div class="mt-30">
                            <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{ route('register') }}">
                                <i class="fa fa-plus mr-5"></i> Create Account
                            </a>
                            <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{ route('password.request') }}">
                                <i class="fa fa-warning mr-5"></i> Forgot Password
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
