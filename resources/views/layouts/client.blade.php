<!doctype html>
<html lang="{{ config('app.locale') }}" class="no-focus">
    <head>
        <meta charset="utf-8">
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Codebase - Bootstrap 4 Admin Template &amp; UI Framework</title>

        <meta
            name="description"
            content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <meta name="user" content="{{ Auth::user() }}">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Icons -->
        <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
        <link
            rel="icon"
            sizes="192x192"
            type="image/png"
            href="{{ asset('media/favicons/favicon-192x192.png') }}">
        <link
            rel="apple-touch-icon"
            sizes="180x180"
            href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

        <!-- Fonts and Styles -->
        @yield('css_before')
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
        <link rel="stylesheet" id="css-main" href="{{ mix('/css/codebase.css') }}">

        <!-- Drop Zone -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">

        <!-- You can include a specific file from public/css/themes/ folder to alter the
        default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="{{
        mix('/css/themes/corporate.css') }}"> -->

        <!--Animate CSS-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
        @yield('styles')

    </head>
    <body>
        <div
            id="page-container"
            class="sidebar-inverse side-scroll main-content-boxed side-trans-enabled">
            <nav id="sidebar" data-simplebar="init">
                <div class="simplebar-wrapper" style="margin: 0px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                            <div
                                class="simplebar-content-wrapper"
                                style="height: 100%; padding-right: 0px; padding-bottom: 0px; overflow: hidden;">
                                <div class="simplebar-content" style="padding: 0px;">
                                    <div class="sidebar-content">
                                        <div class="content-header content-header-fullrow bg-black-op-10">
                                            <div class="content-header-section text-center align-parent">
                                                <button
                                                    type="button"
                                                    class="btn btn-circle btn-dual-secondary d-lg-none align-v-r"
                                                    data-toggle="layout"
                                                    data-action="sidebar_close">
                                                    <i class="fa fa-times text-danger"></i>
                                                </button>
                                                <div class="content-header-item mr-5" style="margin-top: -10px;">
                                                    <a class="" href="{{ route('dashboard.client') }}">
                                                        <img src="/images/logo-creato.webp" width="170px" alt="" srcset="">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content-side content-side-full">
                                            <ul class="nav-main">
                                                <li>
                                                    <a href="{{ route('dashboard.client') }}">
                                                        <i class="si si-grid"></i>Inicio</a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <i class="si si-user"></i>Perfil</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                      document.getElementById('logout-form').submit();">
                                                            <i class="si si-logout"></i>Salir
                                                    </a>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="simplebar-placeholder" style="width: auto; height: 338px;"></div>
                </div>
                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                    <div
                        class="simplebar-scrollbar"
                        style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
                </div>
                <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                    <div
                        class="simplebar-scrollbar"
                        style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
                </div>
            </nav>
            <header id="page-header">
                <div class="content-header">
                    <div class="content-header-section">
                        <div class="content-header-item mr-5" style="margin-top: -25px;">
                            <a class="" href="{{ route('dashboard.client') }}">
                                <img src="/images/logo-creato.webp" width="170px" alt="" srcset="">
                            </a>
                        </div>
                    </div>
                    <div class="content-header-section">
                        <ul class="nav-main-header">
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#">
                                    <i class="si si-layers"></i>
                                    Menu
                                </a>
                                <ul>
                                    <li>
                                        <a href="{{ route('dashboard.client') }}">
                                            <i class="si si-grid"></i>Inicio</a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <i class="si si-user"></i>Perfil</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">
                                                <i class="si si-logout"></i>
                                                Salir
                                        </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <button
                            type="button"
                            class="btn btn-dual-secondary d-lg-none"
                            data-toggle="layout"
                            data-action="sidebar_toggle">
                            Menu
                            <i class="fa fa-navicon ml-5"></i>
                        </button>
                    </div>
                </div>
                <div id="page-header-search" class="overlay-header">
                    <div class="content-header content-header-fullrow">
                        <form>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button
                                        type="button"
                                        class="btn btn-secondary px-15"
                                        data-toggle="layout"
                                        data-action="header_search_off">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Search or hit ESC.."
                                    id="page-header-search-input"
                                    name="page-header-search-input">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-secondary px-15">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="page-header-loader" class="overlay-header bg-primary">
                    <div class="content-header content-header-fullrow text-center">
                        <div class="content-header-item">
                            <i class="fa fa-sun-o fa-spin text-white"></i>
                        </div>
                    </div>
                </div>
            </header>
            <div id="app">
                <clients-online-component style="display: none;"></clients-online-component>
                @yield('content')
            </div>
            <footer id="page-footer" class="bg-white opacity-0" style="opacity: 1;">
                <div class="content py-20 font-size-xs clearfix">
                    <div class="float-right">
                        Crafted with
                        <i class="fa fa-heart text-pulse"></i>
                        by
                        <a class="font-w600" href="https://www.3dlog.mx" target="_blank">3dlog</a>
                    </div>
                    <div class="float-left">
                        <a class="font-w600" href="#" target="_blank">Creato Studio</a>
                        ©
                        <span class="js-year-copy js-year-copy-enabled">2019</span>
                    </div>
                </div>
            </footer>
        </div>

        <!-- END Page Container -->

        <!-- Codebase Core JS -->
        <script src="{{ mix('js/codebase.app.js') }}"></script>

        <!-- Laravel Scaffolding JS -->
        <script src="{{ mix('js/laravel.app.js') }}"></script>

        <!-- Drop Zone -->
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>

        @yield('scripts')
    </body>
</html>