<!doctype html>
<html lang="{{ config('app.locale') }}" class="no-focus">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Codebase - Bootstrap 4 Admin Template &amp; UI Framework</title>

        <meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Icons -->
        <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
        <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

        <!-- Fonts and Styles -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
        <link rel="stylesheet" id="css-main" href="{{ mix('/css/codebase.css') }}">

        <!-- Drop Zone -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">

        <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="{{ mix('/css/themes/corporate.css') }}"> -->
        @yield('styles')

        <!-- Scripts -->
        <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>
    </head>
    <body>
        <!-- Page Container -->
        <!--
            Available classes for #page-container:

        GENERIC

            'enable-cookies'                            Remembers active color theme between pages (when set through color theme helper Template._uiHandleTheme())

        SIDEBAR & SIDE OVERLAY

            'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
            'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
            'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
            'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
            'sidebar-inverse'                           Dark themed sidebar

            'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
            'side-overlay-o'                            Visible Side Overlay by default

            'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

            'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

        HEADER

            ''                                          Static Header if no class is added
            'page-header-fixed'                         Fixed Header

        HEADER STYLE

            ''                                          Classic Header style if no class is added
            'page-header-modern'                        Modern Header style
            'page-header-inverse'                       Dark themed Header (works only with classic Header style)
            'page-header-glass'                         Light themed Header with transparency by default
                                                        (absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
            'page-header-glass page-header-inverse'     Dark themed Header with transparency by default
                                                        (absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

        MAIN CONTENT LAYOUT

            ''                                          Full width Main Content if no class is added
            'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
            'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
        -->
        <div id="app">
            <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-boxed">
                <!-- Side Overlay-->
                <aside id="side-overlay">
                    <!-- Side Header -->
                    <div class="content-header content-header-fullrow">
                        <div class="content-header-section align-parent">
                            <!-- Close Side Overlay -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <button type="button" class="btn btn-circle btn-dual-secondary align-v-r" data-toggle="layout" data-action="side_overlay_close">
                                <i class="fa fa-times text-danger"></i>
                            </button>
                            <!-- END Close Side Overlay -->
    
                            <!-- User Info -->
                            <div class="content-header-item">
                                <a class="img-link mr-5" href="javascript:void(0)">
                                    <img class="img-avatar img-avatar32" src="{{ asset('images/avatars/avatar1.jpg') }}" alt="">
                                </a>
                                <a class="align-middle link-effect text-primary-dark font-w600" href="javascript:void(0)">{{ Auth::user()->name }}</a>
                            </div>
                            <!-- END User Info -->
                        </div>
                    </div>
                    <!-- END Side Header -->
    
                    <!-- Side Content -->
                    <div class="content-side">
                        {{--  <clients-online-component></clients-online-component>  --}}
                    </div>
                    <!-- END Side Content -->
                </aside>
                <!-- END Side Overlay -->
    
                <!-- Sidebar -->
                <!--
                    Helper classes
    
                    Adding .sidebar-mini-hide to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
                    Adding .sidebar-mini-show to an element will make it visible (opacity: 1) when the sidebar is in mini mode
                        If you would like to disable the transition, just add the .sidebar-mini-notrans along with one of the previous 2 classes
    
                    Adding .sidebar-mini-hidden to an element will hide it when the sidebar is in mini mode
                    Adding .sidebar-mini-visible to an element will show it only when the sidebar is in mini mode
                        - use .sidebar-mini-visible-b if you would like to be a block when visible (display: block)
                -->
                <nav id="sidebar">
                    <!-- Sidebar Content -->
                    <div class="sidebar-content">
                        <!-- Side Header -->
                        <div class="content-header content-header-fullrow px-15">
                            <!-- Mini Mode -->
                            <div class="content-header-section sidebar-mini-visible-b">
                                <!-- Logo -->
                                <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                                    <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                                </span>
                                <!-- END Logo -->
                            </div>
                            <!-- END Mini Mode -->
    
                            <!-- Normal Mode -->
                            <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                                <!-- Close Sidebar, Visible only on mobile screens -->
                                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                                    <i class="fa fa-times text-danger"></i>
                                </button>
                                <!-- END Close Sidebar -->
    
                                <!-- Logo -->
                                <div class="content-header-item" style="margin-top: -10px;">
                                    <a class="" href="{{ route('dashboard.admin') }}">
                                        <img src="/images/logo-creato.webp" width="170px" alt="logo-creato" srcset="">
                                    </a>
                                </div>
                                <!-- END Logo -->
                            </div>
                            <!-- END Normal Mode -->
                        </div>
                        <!-- END Side Header -->
    
                        <!-- Side User -->
                        <div class="content-side content-side-full content-side-user px-10 align-parent">
                            <!-- Visible only in mini mode -->
                            <div class="sidebar-mini-visible-b align-v animated fadeIn">
                                <img class="img-avatar img-avatar32" src="{{ asset('images/avatars/avatar1.jpg') }}" alt="">
                            </div>
                            <!-- END Visible only in mini mode -->
    
                            <!-- Visible only in normal mode -->
                            <div class="sidebar-mini-hidden-b text-center">
                                <a class="img-link" href="javascript:void(0)">
                                    <img class="img-avatar" src="{{ asset('images/avatars/avatar1.jpg') }}" alt="">
                                </a>
                                <ul class="list-inline mt-10">
                                    <li class="list-inline-item">
                                        <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase" href="javascript:void(0)">{{ Auth::user()->name }}</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                        <a class="link-effect text-dual-primary-dark" data-toggle="layout" data-action="sidebar_style_inverse_toggle" href="javascript:void(0)">
                                            <i class="si si-drop"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="link-effect text-dual-primary-dark" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">
                                                <i class="si si-logout"></i>
                                        </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                    </li>
                                </ul>
                            </div>
                            <!-- END Visible only in normal mode -->
                        </div>
                        <!-- END Side User -->
    
                        <!-- Side Navigation -->
                        <div class="content-side content-side-full">
                            <ul class="nav-main">
                                <li>
                                    <a class="{{ request()->is('dashboard') ? ' active' : '' }}" href="/dashboard">
                                        <i class="si si-grid"></i><span class="sidebar-mini-hide">Dashboard</span>
                                    </a>
                                </li>
                                <li class="nav-main-heading">
                                    <span class="sidebar-mini-visible">VR</span><span class="sidebar-mini-hidden">Various</span>
                                </li>
                                <li>
                                    <a class="{{ request()->is('dashboard/portafolio') ? ' active' : '' }}" href="/dashboard/portafolio">
                                        <i class="si si-folder"></i><span class="sidebar-mini-hide">Portafolio</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ request()->is('dashboard/usuarios') ? ' active' : '' }}" href="/dashboard/usuarios">
                                        <i class="si si-emoticon-smile"></i><span class="sidebar-mini-hide">Usuarios</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ request()->is('dashboard/clientes') ? ' active' : '' }}" href="/dashboard/clientes">
                                        <i class="si si-users"></i><span class="sidebar-mini-hide">Clientes</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ request()->is('dashboard/proyectos') ? ' active' : '' }}" href="/dashboard/proyectos">
                                        <i class="si si-notebook"></i><span class="sidebar-mini-hide">Proyectos</span>
                                    </a>
                                </li>
                                
                                {{--  <li class="{{ request()->is('examples/*') ? ' open' : '' }}">
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-bulb"></i><span class="sidebar-mini-hide">Examples</span></a>
                                    <ul>
                                        <li>
                                            <a class="{{ request()->is('examples/plugin-helper') ? ' active' : '' }}" href="/examples/plugin-helper">Plugin with JS Helper</a>
                                        </li>
                                        <li>
                                            <a class="{{ request()->is('examples/plugin-init') ? ' active' : '' }}" href="/examples/plugin-init">Plugin with JS Init</a>
                                        </li>
                                        <li>
                                            <a class="{{ request()->is('examples/blank') ? ' active' : '' }}" href="/examples/blank">Blank</a>
                                        </li>
                                    </ul>
                                </li>  --}}
                            
                                <li class="nav-main-heading">
                                    <span class="sidebar-mini-visible">WB</span><span class="sidebar-mini-hidden">Web</span>
                                </li>
                                <li>
                                    <a href="/">
                                        <i class="si si-globe"></i><span class="sidebar-mini-hide">Creato Studio</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- END Side Navigation -->
                    </div>
                    <!-- Sidebar Content -->
                </nav>
                <!-- END Sidebar -->
    
                <!-- Header -->
                <header id="page-header">
                    <!-- Header Content -->
                    <div class="content-header">
                        <!-- Left Section -->
                        <div class="content-header-section">
                            <!-- Toggle Sidebar -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="sidebar_toggle">
                                <i class="fa fa-navicon"></i>
                            </button>
                            <!-- END Toggle Sidebar -->
    
                            <!-- Open Search Section -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            
                            <!-- END Open Search Section -->
    
                            <!-- Layout Options (used just for demonstration) -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            
                            <!-- END Layout Options -->
                        </div>
                        <!-- END Left Section -->
    
                        <!-- Right Section -->
                        <div class="content-header-section">
                            <!-- User Dropdown -->
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user d-sm-none"></i>
                                    <span class="d-none d-sm-inline-block">{{ Auth::user()->name }}</span>
                                    <i class="fa fa-angle-down ml-5"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right min-width-200" aria-labelledby="page-header-user-dropdown">
                                    <h5 class="h6 text-center py-10 mb-5 border-b text-uppercase">User</h5>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="si si-user mr-5"></i> Profile
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                        <span><i class="si si-envelope-open mr-5"></i> Inbox</span>
                                        <span class="badge badge-primary">1</span>
                                    </a>
                                    <div class="dropdown-divider"></div>
    
                                    <!-- Toggle Side Overlay -->
                                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                    <a class="dropdown-item" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                                        <i class="si si-note mr-5"></i> Notes
                                    </a>
                                    <!-- END Side Overlay -->
    
                                    <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">
                                                <i class="si si-logout"></i> Sign Out
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                </div>
                            </div>
                            <!-- END User Dropdown -->
    
                            <!-- Notifications -->
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-flag"></i>
                                    <span class="badge badge-primary badge-pill">1</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right min-width-300" aria-labelledby="page-header-notifications">
                                    <h5 class="h6 text-center py-10 mb-0 border-b text-uppercase">Notifications</h5>
                                    <ul class="list-unstyled my-20">
                                        <li>
                                            <a class="text-body-color-dark media mb-15" href="javascript:void(0)">
                                                <div class="ml-5 mr-15">
                                                    <i class="fa fa-fw fa-check text-success"></i>
                                                </div>
                                                <div class="media-body pr-10">
                                                    <p class="mb-0">A new message from <strong>Monica Perez</strong></p>
                                                    <div class="text-muted font-size-sm font-italic">15 min ago</div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-center mb-0" href="javascript:void(0)">
                                        <i class="fa fa-flag mr-5"></i> View All
                                    </a>
                                </div>
                            </div>
                            <!-- END Notifications -->
    
                            <!-- Toggle Side Overlay -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="side_overlay_toggle">
                                <i class="fa fa-sticky-note"></i>
                            </button>
                            <!-- END Toggle Side Overlay -->
                        </div>
                        <!-- END Right Section -->
                    </div>
                    <!-- END Header Content -->
    
                    <!-- Header Search -->
                    <div id="page-header-search" class="overlay-header">
                        <div class="content-header content-header-fullrow">
                            <form action="/dashboard" method="POST">
                                @csrf
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <!-- Close Search Section -->
                                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                        <button type="button" class="btn btn-secondary" data-toggle="layout" data-action="header_search_off">
                                            <i class="fa fa-times"></i>
                                        </button>
                                        <!-- END Close Search Section -->
                                    </div>
                                    <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-secondary">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                       </div>
                    </div>
                    <!-- END Header Search -->
    
                    <!-- Header Loader -->
                    <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
                    <div id="page-header-loader" class="overlay-header bg-primary">
                        <div class="content-header content-header-fullrow text-center">
                            <div class="content-header-item">
                                <i class="fa fa-sun-o fa-spin text-white"></i>
                            </div>
                        </div>
                    </div>
                    <!-- END Header Loader -->
                </header>
                <!-- END Header -->
    
                <!-- Main Container -->
                <main id="main-container">
                    <div>
                        @yield('content')
                    </div>
                </main>
                <!-- END Main Container -->
    
                <!-- Footer -->
                <footer id="page-footer" class="opacity-0">
                    <div class="content py-20 font-size-xs clearfix">
                        <div class="float-right">
                            Crafted with <i class="fa fa-heart text-pulse"></i> by <a class="font-w600" href="https://www.3dlog.mx" target="_blank">3dlog</a>
                        </div>
                        <div class="float-left">
                            <a class="font-w600" href="https://1.envato.market/95j" target="_blank">Creato Studio</a> &copy; <span class="js-year-copy"></span>
                        </div>
                    </div>
                </footer>
                <!-- END Footer -->
            </div>
        </div>
        <!-- END Page Container -->
        <!-- Codebase Core JS -->
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>
        
        <!-- Codebase Core JS -->
        <script src="{{ mix('js/codebase.app.js') }}"></script>

        <!-- Laravel Scaffolding JS -->
        <script src="{{ mix('js/laravel.app.js') }}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
        <script src="{{ asset('js/otros.app.js') }}"></script>

        <!-- Drop Zone -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>

        @yield('scripts')
    </body>
</html>
