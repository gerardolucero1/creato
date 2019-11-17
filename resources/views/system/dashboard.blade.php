@extends('layouts.backend')

@section('content')
<main id="main-container" style="min-height: 389px;">
    <div class="container mt-4">
        <div class="row js-appear-enabled animated fadeIn" data-toggle="appear">
            <div class="col-6 col-xl-3">
                <a class="block block-link-shadow text-right" href="javascript:void(0)">
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
                <a class="block block-link-shadow text-right" href="javascript:void(0)">
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
                <a class="block block-link-shadow text-right" href="{{route('block.index')}}">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-left mt-10 d-none d-sm-block">
                            <i class="si si-notebook fa-3x text-body-bg-dark"></i>
                        </div>
                        <div class="font-size-h3 font-w600 js-count-to-enabled" data-toggle="countTo" data-speed="1000" data-to="15">15</div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Tareas</div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-xl-3">
                <a class="block block-link-shadow text-right" href="javascript:void(0)">
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
                    <a class="block block-rounded text-center" href="javascript:void(0)">
                        <div class="block-content">
                            <p class="mt-5 mb-10">
                                <i class="fa fa-envelope-o text-gray fa-2x d-xl-none"></i>
                                <i class="fa fa-envelope-o text-gray fa-3x d-none d-xl-inline-block"></i>
                            </p>
                            <p class="font-w600 font-size-sm text-uppercase">Mensajes</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-rounded text-center" href="javascript:void(0)">
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
                    <a class="block block-rounded text-center" href="javascript:void(0)">
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
                    <a class="block block-rounded text-center" href="javascript:void(0)">
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
                    <a class="block block-rounded text-center" href="javascript:void(0)">
                        <div class="block-content">
                            <p class="mt-5 mb-10">
                                <i class="fa fa-plus-square-o text-gray fa-2x d-xl-none"></i>
                                <i class="fa fa-plus-square-o text-gray fa-3x d-none d-xl-inline-block"></i>
                            </p>
                            <p class="font-w600 font-size-sm text-uppercase">Lista +</p>
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
        <!--
        <div class="row js-appear-enabled animated fadeIn" data-toggle="appear">
            <div class="col-md-6">
                <div class="block">
                    <div class="block-header">
                        <h3 class="block-title">
                            Sales <small>This week</small>
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option">
                                <i class="si si-wrench"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="pull-all"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            <canvas class="js-chartjs-dashboard-lines chartjs-render-monitor" style="display: block; width: 526px; height: 263px;" width="526" height="263"></canvas>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="row items-push">
                            <div class="col-6 col-sm-4 text-center text-sm-left">
                                <div class="font-size-sm font-w600 text-uppercase text-muted">This Month</div>
                                <div class="font-size-h4 font-w600">720</div>
                                <div class="font-w600 text-success">
                                    <i class="fa fa-caret-up"></i> +16%
                                </div>
                            </div>
                            <div class="col-6 col-sm-4 text-center text-sm-left">
                                <div class="font-size-sm font-w600 text-uppercase text-muted">This Week</div>
                                <div class="font-size-h4 font-w600">160</div>
                                <div class="font-w600 text-danger">
                                    <i class="fa fa-caret-down"></i> -3%
                                </div>
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-left">
                                <div class="font-size-sm font-w600 text-uppercase text-muted">Average</div>
                                <div class="font-size-h4 font-w600">24.3</div>
                                <div class="font-w600 text-success">
                                    <i class="fa fa-caret-up"></i> +9%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="block">
                    <div class="block-header">
                        <h3 class="block-title">
                            Earnings <small>This week</small>
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option">
                                <i class="si si-wrench"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="pull-all"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            <canvas class="js-chartjs-dashboard-lines2 chartjs-render-monitor" width="526" height="263" style="display: block; width: 526px; height: 263px;"></canvas>
                        </div>
                    </div>
                    <div class="block-content bg-white">
                        <div class="row items-push">
                            <div class="col-6 col-sm-4 text-center text-sm-left">
                                <div class="font-size-sm font-w600 text-uppercase text-muted">This Month</div>
                                <div class="font-size-h4 font-w600">$ 6,540</div>
                                <div class="font-w600 text-success">
                                    <i class="fa fa-caret-up"></i> +4%
                                </div>
                            </div>
                            <div class="col-6 col-sm-4 text-center text-sm-left">
                                <div class="font-size-sm font-w600 text-uppercase text-muted">This Week</div>
                                <div class="font-size-h4 font-w600">$ 1,525</div>
                                <div class="font-w600 text-danger">
                                    <i class="fa fa-caret-down"></i> -7%
                                </div>
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-left">
                                <div class="font-size-sm font-w600 text-uppercase text-muted">Balance</div>
                                <div class="font-size-h4 font-w600">$ 9,352</div>
                                <div class="font-w600 text-success">
                                    <i class="fa fa-caret-up"></i> +35%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row js-appear-enabled animated fadeIn" data-toggle="appear">
            <div class="col-md-4">
                <div class="block">
                    <div class="block-content block-content-full">
                        <div class="py-20 text-center">
                            <div class="mb-20">
                                <i class="fa fa-envelope-open fa-4x text-primary"></i>
                            </div>
                            <div class="font-size-h4 font-w600">9.25k Subscribers</div>
                            <div class="text-muted">Your main list is growing!</div>
                            <div class="pt-20">
                                <a class="btn btn-rounded btn-alt-primary" href="javascript:void(0)">
                                    <i class="fa fa-cog mr-5"></i> Manage list
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="block">
                    <div class="block-content block-content-full">
                        <div class="py-20 text-center">
                            <div class="mb-20">
                                <i class="fa fa-twitter fa-4x text-info"></i>
                            </div>
                            <div class="font-size-h4 font-w600">+36 followers</div>
                            <div class="text-muted">You are doing great!</div>
                            <div class="pt-20">
                                <a class="btn btn-rounded btn-alt-info" href="javascript:void(0)">
                                    <i class="fa fa-users mr-5"></i> Check them out
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="block">
                    <div class="block-content block-content-full">
                        <div class="py-20 text-center">
                            <div class="mb-20">
                                <i class="fa fa-check fa-4x text-success"></i>
                            </div>
                            <div class="font-size-h4 font-w600">Business Plan</div>
                            <div class="text-muted">This is your current active plan</div>
                            <div class="pt-20">
                                <a class="btn btn-rounded btn-alt-success" href="javascript:void(0)">
                                    <i class="fa fa-arrow-up mr-5"></i> Upgrade to VIP
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        -->
        <div class="row js-appear-enabled animated fadeIn" data-toggle="appear">
            <div class="col-md-12">
                
            </div>
        </div>
        <div class="row js-appear-enabled animated fadeIn" data-toggle="appear">
            <div class="col-md-6">
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
            <div class="col-md-6">
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
            </div>
        </div>
        </div>
    </div>
</main>
@endsection

@section('scripts')
   
@endsection
