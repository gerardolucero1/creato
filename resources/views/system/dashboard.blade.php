@extends('layouts.backend')

@section('content')
<main id="main-container" style="min-height: 389px;">
    <div class="container mt-4">
        <div class="row js-appear-enabled animated fadeIn" data-toggle="appear">
            <div class="col-6 col-xl-3">
                <a class="block block-link-shadow text-right" href="/dashboard/proyectos">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-left mt-10 d-none d-sm-block">
                            <i class="si si-briefcase fa-3x text-body-bg-dark"></i>
                        </div>
                        <div class="font-size-h3 font-w600 js-count-to-enabled" data-toggle="countTo" data-speed="1000" data-to="1500">{{ count(App\Project::all()) }}</div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Proyectos</div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-xl-3">
                <a class="block block-link-shadow text-right" href="/dashboard/portafolio">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-left mt-10 d-none d-sm-block">
                            <i class="si si-folder fa-3x text-body-bg-dark"></i>
                        </div>
                        <div class="font-size-h3 font-w600 js-count-to-enabled" data-toggle="countTo" data-speed="1000" data-to="1500">{{ count(App\Portfolio::all()) }}</div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Portafolios</div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-xl-3">
                <a class="block block-link-shadow text-right" href="/dashboard/block">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-left mt-10 d-none d-sm-block">
                            <i class="si si-notebook fa-3x text-body-bg-dark"></i>
                        </div>
                        <div class="font-size-h3 font-w600 js-count-to-enabled" data-toggle="countTo" data-speed="1000" data-to="15">{{ count(App\BlockList::all()) }}</div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Bloques</div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-xl-3">
                <a class="block block-link-shadow text-right" href="/dashboard/clientes">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-left mt-10 d-none d-sm-block">
                            <i class="si si-users fa-3x text-body-bg-dark"></i>
                        </div>
                        @php
                            $users = App\User::all();
                            $clients = [];
                            foreach ($users as $user) {
                                if($user->hasRole('cliente')){
                                    array_push($clients, $user);
                                }
                            }
                        @endphp
                        <div class="font-size-h3 font-w600 js-count-to-enabled" data-toggle="countTo" data-speed="1000" data-to="4252">{{ count($clients) }}</div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Clientes</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Action buttons-->
    <div class="bg-body-dark mb-4">
        <div class="container pt-4">
            <div class="row">
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded text-center" href="{{ route('conversation.index') }}">
                        <div class="block-content">
                            <p class="mt-5 mb-10">
                                <i class="fa fa-envelope-o text-gray fa-2x d-xl-none"></i>
                                <i class="fa fa-envelope-o text-gray fa-3x d-none d-xl-inline-block"></i>
                            </p>
                            <p class="font-w600 font-size-sm text-uppercase"><span class="badge badge-primary badge-pill"><inbox-component :user-id="{{ Auth::user()->id }}"></inbox-component></span> Mensajes</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded text-center" href="{{route('users.edit', Auth::user()->id)}}">
                        <div class="block-content">
                            <p class="mt-5 mb-10">
                                <i class="fa fa-pencil text-gray fa-2x d-xl-none"></i>
                                <i class="fa fa-pencil text-gray fa-3x d-none d-xl-inline-block"></i>
                            </p>
                            <p class="font-w600 font-size-sm text-uppercase">Perfil</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded text-center" href="{{ route('estadisticas.index') }}">
                        <div class="block-content">
                            <p class="mt-5 mb-10">
                                <i class="fa fa-bar-chart text-gray fa-2x d-xl-none"></i>
                                <i class="fa fa-bar-chart text-gray fa-3x d-none d-xl-inline-block"></i>
                            </p>
                            <p class="font-w600 font-size-sm text-uppercase">Estadisticas</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded text-center" href="{{route('projects.create')}}">
                        <div class="block-content">
                            <p class="mt-5 mb-10">
                                <i class="fa fa-plus-square-o text-gray fa-2x d-xl-none"></i>
                                <i class="fa fa-plus-square-o text-gray fa-3x d-none d-xl-inline-block"></i>
                            </p>
                            <p class="font-w600 font-size-sm text-uppercase">Proyecto +</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded text-center" href="{{route('users.create')}}">
                        <div class="block-content">
                            <p class="mt-5 mb-10">
                                <i class="fa fa-plus-square-o text-gray fa-2x d-xl-none"></i>
                                <i class="fa fa-plus-square-o text-gray fa-3x d-none d-xl-inline-block"></i>
                            </p>
                            <p class="font-w600 font-size-sm text-uppercase">Cliente +</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded text-center" href="{{route('block.index')}}">
                        <div class="block-content">
                            <p class="mt-5 mb-10">
                                <i class="fa fa-plus-square-o text-gray fa-2x d-xl-none"></i>
                                <i class="fa fa-plus-square-o text-gray fa-3x d-none d-xl-inline-block"></i>
                            </p>
                            <p class="font-w600 font-size-sm text-uppercase">Bloque +</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <calendar-component></calendar-component>
    </div>

    <div class="container">
        <div class="row js-appear-enabled animated fadeIn" data-toggle="appear">
            <div class="col-md-12">
                
            </div>
        </div>
        <div class="row js-appear-enabled animated fadeIn" data-toggle="appear">
            <div class="col-md-12">
                <a class="block block-link-shadow overflow-hidden" href="javascript:void(0)">
                    <div class="block-content block-content-full">
                        <i class="si si-briefcase fa-2x text-body-bg-dark"></i>
                        <div class="row py-20">
                            <div class="col-6 text-right border-r">
                                <div class="js-appear-enabled animated fadeInLeft" data-toggle="appear" data-class="animated fadeInLeft">
                                    <div class="font-size-h3 font-w600">{{ count(App\Portfolio::all()) }}</div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Portafolios</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="js-appear-enabled animated fadeInRight" data-toggle="appear" data-class="animated fadeInRight">
                                    <div class="font-size-h3 font-w600">{{ count(App\Project::all()) }}</div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Proyectos</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            {{-- <div class="col-md-6">
                <a class="block block-link-shadow overflow-hidden" href="javascript:void(0)">
                    <div class="block-content block-content-full">
                        <div class="text-right">
                            <i class="si si-users fa-2x text-body-bg-dark"></i>
                        </div>
                        <div class="row py-20">
                            <div class="col-6 text-right border-r">
                                <div class="js-appear-enabled animated fadeInLeft" data-toggle="appear" data-class="animated fadeInLeft">
                                    <div class="font-size-h3 font-w600 text-info">63250</div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Accounts</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="js-appear-enabled animated fadeInRight" data-toggle="appear" data-class="animated fadeInRight">
                                    <div class="font-size-h3 font-w600 text-success">97%</div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Active</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div> --}}
        </div>
        </div>
    </div>
</main>
@endsection

@section('scripts')
   
@endsection
