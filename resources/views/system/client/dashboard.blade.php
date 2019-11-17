@extends('layouts.client')

@section('styles')
    <style>
        .banner-inicio{
            width: 100%;
            height: 40vh;
            position: relative;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .banner-inicio-layer{
            width: 100%;
            height: 40vh;
            position: absolute;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .banner-inicio-layer h2, .banner-inicio-layer h4{
            color: white;
        }
    </style>
@endsection

@section('content')
    <main id="main-container" style="min-height: 288px;">
        <div class="banner-inicio" style="background-image: url('https://www.alcaidesaeventos.com/images/cabecera/slide/alcaidesa-eventos-terraza-bodas-04.jpg');">
            <div class="banner-inicio-layer">
                <h2>Bienvenido(a)</h2>
                <h4>{{ Auth::user()->name }}</h4>
            </div>
        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <a class="block block-link-shadow" href="{{ route('guests.index') }}">
                        <div class="block-content block-content-full text-center">
                            <div class="p-20 mb-5">
                                <i class="fa fa-3x fa-users text-primary"></i>
                            </div>
                            <p class="font-size-lg font-w600 mb-0">
                                2 Invitados
                            </p>
                            <p class="font-size-sm text-uppercase font-w600 text-muted mb-0">
                                Invitados
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-3">
                    <a class="block block-link-shadow" href="javascript:void(0)">
                        <div class="block-content block-content-full text-center">
                            <div class="p-20 mb-5">
                                <i class="fa fa-3x fa-list-ul text-elegance"></i>
                            </div>
                            <p class="font-size-lg font-w600 mb-0">
                                1 Lista
                            </p>
                            <p class="font-size-sm text-uppercase font-w600 text-muted mb-0">
                                Mi Lista
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-3">
                    <a class="block block-link-shadow" href="javascript:void(0)">
                        <div class="block-content block-content-full text-center">
                            <div class="p-20 mb-5">
                                <i class="fa fa-3x fa-envelope-open text-pulse"></i>
                            </div>
                            <p class="font-size-lg font-w600 mb-0">
                                Mensajes
                            </p>
                            <p class="font-size-sm text-uppercase font-w600 text-muted mb-0">
                                <span class="badge badge-pill badge-danger">2</span> Mensajes
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-3">
                    <a class="block block-link-shadow" href="{{ route('tables.index') }}">
                        <div class="block-content block-content-full text-center">
                            <div class="p-20 mb-5">
                                <i class="fas fa-3x fa-chair text-gray-dark"></i>
                            </div>
                            <p class="font-size-lg font-w600 mb-0">
                                2 Sentados
                            </p>
                            <p class="font-size-sm text-uppercase font-w600 text-muted mb-0">
                                Mesas
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <my-block-list-component></my-block-list-component>
            <div class="row">
                <div class="col-md-6">
                    <a class="block block-rounded" href="javascript:void(0)">
                        <div class="block-content block-content-full">
                            <i class="si si-graph fa-2x text-body-bg-dark"></i>
                            <div class="row pt-10 pb-30 text-center">
                                <div class="col-6 border-r">
                                    <div class="font-size-h3 font-w600">5</div>
                                    <div class="font-w600 text-primary-light">Plans</div>
                                </div>
                                <div class="col-6">
                                    <div class="font-size-h3 font-w600">17,890</div>
                                    <div class="font-w600 text-primary-light">Subscriptions</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a class="block block-rounded" href="javascript:void(0)">
                        <div class="block-content block-content-full">
                            <div class="text-right">
                                <i class="si si-wallet fa-2x text-body-bg-dark"></i>
                            </div>
                            <div class="row pt-10 pb-30 text-center font-w600">
                                <div class="col-6 border-r">
                                    <div class="font-size-h3">$1,360</div>
                                    <div class="font-size-sm text-primary-light">Today</div>
                                </div>
                                <div class="col-6">
                                    <div class="font-size-h3">$5,680</div>
                                    <div class="font-size-sm text-primary-light">Last Week</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script>
        
    </script>
@endsection