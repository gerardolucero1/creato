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
                        <div class="block-content block-content-full text-center" style="background-color: #E7D5CD">
                            <div class="p-20 mb-5">
                                <i class="fa fa-3x fa-users" style="color: white;"></i>
                            </div>
                            <p class="font-size-lg font-w600 mb-0" style="color: white; text-shadow: 1px 1px 10px #707070;">
                                Invitados
                            </p>
                            {{-- <p class="font-size-sm text-uppercase font-w600 text-muted mb-0">
                                Invitados
                            </p> --}}
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-3">
                    <a class="block block-link-shadow" href="{{ route('evidence.indexEvidence') }}">
                        <div class="block-content block-content-full text-center" style="background-color: #E7D5CD">
                            <div class="p-20 mb-5">
                                <i class="fa fa-3x fa-list-ul" style="color: white;"></i>
                            </div>
                            <p class="font-size-lg font-w600 mb-0" style="color: white; text-shadow: 1px 1px 10px #707070;">
                                Listas
                            </p>
                            {{-- <p class="font-size-sm text-uppercase font-w600 text-muted mb-0">
                                Mi Lista
                            </p> --}}
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-3">
                    <a class="block block-link-shadow" href="{{ route('messages.client') }}">
                        <div class="block-content block-content-full text-center" style="background-color: #E7D5CD">
                            <div class="p-20 mb-5">
                                <i class="fa fa-3x fa-envelope-open" style="color: white;"></i>
                            </div>
                            <p class="font-size-lg font-w600 mb-0" style="color: white; text-shadow: 1px 1px 10px #707070;">
                                <span class="badge badge-pill badge-danger"><inbox-component :user-id="{{ Auth::user()->id }}"></inbox-component></span> Mensajes
                            </p>
                            {{-- <p class="font-size-sm text-uppercase font-w600 text-muted mb-0">
                                <span class="badge badge-pill badge-danger"><inbox-component :user-id="{{ Auth::user()->id }}"></inbox-component></span> Mensajes
                            </p> --}}
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-3">
                    <a class="block block-link-shadow" href="{{ route('tables.index') }}">
                        <div class="block-content block-content-full text-center" style="background-color: #E7D5CD">
                            <div class="p-20 mb-5">
                            <i class="fa fa-3x fa-pencil-square" style="color: white;"></i>
                            </div>
                            <p class="font-size-lg font-w600 mb-0" style="color: white; text-shadow: 1px 1px 10px #707070;">
                                Organizador
                            </p>
                            {{-- <p class="font-size-sm text-uppercase font-w600 text-muted mb-0">
                                Mesas
                            </p> --}}
                        </div>
                    </a>
                </div>
            </div>

            <my-block-list-component></my-block-list-component>
            
        </div>
    </main>
@endsection

@section('scripts')
    <script>
        
    </script>
@endsection