@extends('layouts.simple')

@section('styles')
    <style>
        #background-image-login:before{
            content:"";
            width:100vw;
            height:100vh;
            background-image: url({{ $config->dashboard }});
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-color: url({{ $config->color }});
            position: absolute;
            top: 0;
            left: 0;
        }
    </style>
@endsection

@section('content')
<div class="bg-image" id="background-image-login">
    <div class="row mx-0 bg-black-op">
        <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end"> 
            <div class="p-30 invisible" data-toggle="appear">
                <p class="font-size-h3 font-w600 text-white">
                    Event design.
                </p>
                <p class="font-italic text-white-op">
                    Copyright &copy; <span class="js-year-copy">2020</span> Creato Studio - Todos los derechos reservados.
                </p>
            </div>
        </div>
        <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white invisible" data-toggle="appear" data-class="animated fadeInRight">
            <div class="content content-full">
                <div class="px-30 py-10">
                    <a class="font-w700" href="/">
                        <img class="creato-logo" src="{{ $config->index }}" width="300px" alt="Creato-studio-logo">
                    </a>
                    <h1 class="h3 font-w700 mt-30 mb-10">Bienvenido a Creato</h1>
                    <h2 class="h5 font-w400 text-muted mb-0">Por favor has login</h2>
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
                                <label for="email">Email</label>
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
                                <label for="password">Password</label>
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
                            <i class="si si-login mr-10"></i> Entrar
                        </button>
                        {{-- <div class="mt-30">
                            <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{ route('register') }}">
                                <i class="fa fa-plus mr-5"></i> Create Account
                            </a>
                            <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{ route('password.request') }}">
                                <i class="fa fa-warning mr-5"></i> Forgot Password
                            </a>
                        </div> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
