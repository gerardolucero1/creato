@extends('layouts.backend')

@section('styles')
    <style>
        .images-ratio{
            width: 100%;
            padding-top: 0%; /* 1:1 Aspect Ratio */
            position: relative; /* If you want text inside of it */
            background-position: center;
            background-size: cover;
            height: 200px;
            object-fit: cover;
            object-position: center;
        }


        .banner-inicio-layer h2, .banner-inicio-layer h4{
            color: white;
        }
    </style>
@endsection

@section('content')
@if (session('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('info') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (count($errors))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="bg-primary">
        <div class="bg-pattern bg-black-op-25">
            <div class="content content-top text-center">
                <div class="py-50">
                    <h1 class="font-w700 text-white mb-10">Configuracion</h1>
                    <h2 class="h4 font-w400 text-white-op">Creato studio, event design.</h2>
                </div>
            </div>
        </div>
    </div>

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="block">
                <div class="block content">
                    <div class="row items-push js-gallery js-gallery-enabled">
                        <div class="col-md-6 animated fadeIn">
                            <div class="options-container fx-item-zoom-in fx-overlay-slide-down">
                                <img class="img-fluid options-item images-ratio" src="{{ $config->dashboard }}" alt="">
                                <div class="options-overlay bg-black-op-75">
                                    <div class="options-overlay-content">
                                        <h3 class="h4 text-white mb-5">Dashboard</h3>
                                        <h4 class="h6 text-white-op mb-15">More Details</h4>
                                        
                                        <a class="btn btn-sm btn-rounded btn-noborder btn-alt-success min-width-75" href="#" data-toggle="modal" data-target="#centralModalSm"><i class="fa fa-pencil"></i> Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Central Modal Small -->
                        <div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <!-- Change class .modal-sm to change the size of the modal -->
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title w-100" id="myModalLabel">Cambiar imagen dashboard</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    {!! Form::model($config, ['route' => ['config.dashboard', $config->id],'method' => 'PUT', 'files' => 'true']) !!}
                                    <div class="modal-body">
                                            {{ Form::label('dashboard', 'Imagen dashboard')}}
                                                <input type="file" name="dashboard">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                        <!-- Termina imagen dashboard -->

                        <!-- Imagen Bienvenido -->
                        <div class="col-md-6 animated fadeIn">
                            <div class="options-container fx-item-zoom-in fx-overlay-slide-down">
                                <img class="img-fluid options-item images-ratio" src="{{ $config->welcome }}" alt="">
                                <div class="options-overlay bg-black-op-75">
                                    <div class="options-overlay-content">
                                        <h3 class="h4 text-white mb-5">Bienvenido</h3>
                                        <h4 class="h6 text-white-op mb-15">More Details</h4>
                                        
                                        <a class="btn btn-sm btn-rounded btn-noborder btn-alt-success min-width-75" href="#" data-toggle="modal" data-target="#bienvenidoModal"><i class="fa fa-pencil"></i> Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Central Modal Small -->
                        <div class="modal fade" id="bienvenidoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <!-- Change class .modal-sm to change the size of the modal -->
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title w-100" id="myModalLabel">Cambiar imagen bienvenido</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    {!! Form::model($config, ['route' => ['config.bienvenido', $config->id],'method' => 'PUT', 'files' => 'true']) !!}
                                    <div class="modal-body">
                                            {{ Form::label('welcome', 'Imagen bienvenido')}}
                                                <input type="file" name="welcome">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                        <!-- Termina imagen bienvenido -->

                        <!-- Imagen mesas -->
                        <div class="col-md-6 animated fadeIn">
                            <div class="options-container fx-item-zoom-in fx-overlay-slide-down">
                                <img class="img-fluid options-item images-ratio" src="{{ $config->tables }}" alt="">
                                <div class="options-overlay bg-black-op-75">
                                    <div class="options-overlay-content">
                                        <h3 class="h4 text-white mb-5">Mesas</h3>
                                        <h4 class="h6 text-white-op mb-15">More Details</h4>
                                        
                                        <a class="btn btn-sm btn-rounded btn-noborder btn-alt-success min-width-75" href="#" data-toggle="modal" data-target="#mesasModal"><i class="fa fa-pencil"></i> Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Central Modal Small -->
                        <div class="modal fade" id="mesasModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <!-- Change class .modal-sm to change the size of the modal -->
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title w-100" id="myModalLabel">Cambiar imagen mesas</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    {!! Form::model($config, ['route' => ['config.mesas', $config->id],'method' => 'PUT', 'files' => 'true']) !!}
                                    <div class="modal-body">
                                            {{ Form::label('tables', 'Imagen mesas')}}
                                                <input type="file" name="tables">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                        <!-- Termina imagen mesas -->

                        <!-- Imagen index pagina -->
                        <div class="col-md-6 animated fadeIn">
                            <div class="options-container fx-item-zoom-in fx-overlay-slide-down">
                                <img class="img-fluid options-item images-ratio" src="{{ $config->index }}" alt="">
                                <div class="options-overlay bg-black-op-75">
                                    <div class="options-overlay-content">
                                        <h3 class="h4 text-white mb-5">index</h3>
                                        <h4 class="h6 text-white-op mb-15">More Details</h4>
                                        
                                        <a class="btn btn-sm btn-rounded btn-noborder btn-alt-success min-width-75" href="#" data-toggle="modal" data-target="#indexModal"><i class="fa fa-pencil"></i> Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Central Modal Small -->
                        <div class="modal fade" id="indexModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <!-- Change class .modal-sm to change the size of the modal -->
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title w-100" id="myModalLabel">Cambiar imagen index</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    {!! Form::model($config, ['route' => ['config.imgIndex', $config->id],'method' => 'PUT', 'files' => 'true']) !!}
                                    <div class="modal-body">
                                            {{ Form::label('index', 'Imagen index')}}
                                                <input type="file" name="index">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                        <!-- Termina imagen index -->

                        <!-- Imagen nosotros 1 -->
                        <div class="col-md-6 animated fadeIn">
                            <div class="options-container fx-item-zoom-in fx-overlay-slide-down">
                                <img class="img-fluid options-item images-ratio" src="{{ $config->nosotros1 }}" alt="">
                                <div class="options-overlay bg-black-op-75">
                                    <div class="options-overlay-content">
                                        <h3 class="h4 text-white mb-5">Ana Paola</h3>
                                        <h4 class="h6 text-white-op mb-15">More Details</h4>
                                        
                                        <a class="btn btn-sm btn-rounded btn-noborder btn-alt-success min-width-75" href="#" data-toggle="modal" data-target="#nosotros1Modal"><i class="fa fa-pencil"></i> Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Central Modal Small -->
                        <div class="modal fade" id="nosotros1Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <!-- Change class .modal-sm to change the size of the modal -->
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title w-100" id="myModalLabel">Cambiar imagen Ana Paola</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    {!! Form::model($config, ['route' => ['config.nosotros1', $config->id],'method' => 'PUT', 'files' => 'true']) !!}
                                    <div class="modal-body">
                                            {{ Form::label('nosotros1', 'Ana Paola')}}
                                                <input type="file" name="nosotros1">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                        <!-- Termina imagen nosotros1 -->

                        <!-- Imagen nosotros 2 -->
                        <div class="col-md-6 animated fadeIn">
                            <div class="options-container fx-item-zoom-in fx-overlay-slide-down">
                                <img class="img-fluid options-item images-ratio" src="{{ $config->nosotros2 }}" alt="">
                                <div class="options-overlay bg-black-op-75">
                                    <div class="options-overlay-content">
                                        <h3 class="h4 text-white mb-5">Ana Maria</h3>
                                        <h4 class="h6 text-white-op mb-15">More Details</h4>
                                        
                                        <a class="btn btn-sm btn-rounded btn-noborder btn-alt-success min-width-75" href="#" data-toggle="modal" data-target="#nosotros2Modal"><i class="fa fa-pencil"></i> Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Central Modal Small -->
                        <div class="modal fade" id="nosotros2Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <!-- Change class .modal-sm to change the size of the modal -->
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title w-100" id="myModalLabel">Cambiar imagen Ana Maria</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    {!! Form::model($config, ['route' => ['config.nosotros2', $config->id],'method' => 'PUT', 'files' => 'true']) !!}
                                    <div class="modal-body">
                                            {{ Form::label('nosotros2', 'Ana Maria')}}
                                                <input type="file" name="nosotros2">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                        <!-- Termina imagen nosotro2 -->

                        <!-- Imagen nosotros 3 -->
                        <div class="col-md-6 animated fadeIn">
                            <div class="options-container fx-item-zoom-in fx-overlay-slide-down">
                                <img class="img-fluid options-item images-ratio" src="{{ $config->nosotros3 }}" alt="">
                                <div class="options-overlay bg-black-op-75">
                                    <div class="options-overlay-content">
                                        <h3 class="h4 text-white mb-5">Gerardo</h3>
                                        <h4 class="h6 text-white-op mb-15">More Details</h4>
                                        
                                        <a class="btn btn-sm btn-rounded btn-noborder btn-alt-success min-width-75" href="#" data-toggle="modal" data-target="#nosotros3Modal"><i class="fa fa-pencil"></i> Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Central Modal Small -->
                        <div class="modal fade" id="nosotros3Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <!-- Change class .modal-sm to change the size of the modal -->
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title w-100" id="myModalLabel">Cambiar imagen Gerardo</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    {!! Form::model($config, ['route' => ['config.nosotros3', $config->id],'method' => 'PUT', 'files' => 'true']) !!}
                                    <div class="modal-body">
                                            {{ Form::label('nosotros3', 'Gerardo')}}
                                                <input type="file" name="nosotros3">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                        <!-- Termina imagen nosotros3 -->

                        <!-- Imagen nosotros 4 -->
                        <div class="col-md-6 animated fadeIn">
                            <div class="options-container fx-item-zoom-in fx-overlay-slide-down">
                                <img class="img-fluid options-item images-ratio" src="{{ $config->nosotros4 }}" alt="">
                                <div class="options-overlay bg-black-op-75">
                                    <div class="options-overlay-content">
                                        <h3 class="h4 text-white mb-5">Nosotros</h3>
                                        <h4 class="h6 text-white-op mb-15">More Details</h4>
                                        
                                        <a class="btn btn-sm btn-rounded btn-noborder btn-alt-success min-width-75" href="#" data-toggle="modal" data-target="#nosotros4Modal"><i class="fa fa-pencil"></i> Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Central Modal Small -->
                        <div class="modal fade" id="nosotros4Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <!-- Change class .modal-sm to change the size of the modal -->
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title w-100" id="myModalLabel">Cambiar imagen Nosotros</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    {!! Form::model($config, ['route' => ['config.nosotros4', $config->id],'method' => 'PUT', 'files' => 'true']) !!}
                                    <div class="modal-body">
                                            {{ Form::label('nosotros4', 'Nosotros')}}
                                                <input type="file" name="nosotros4">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                        <!-- Termina imagen nosotros4 -->

                        <!-- Imagen contacto-->
                        <div class="col-md-6 animated fadeIn">
                            <div class="options-container fx-item-zoom-in fx-overlay-slide-down">
                                <img class="img-fluid options-item images-ratio" src="{{ $config->contact }}" alt="">
                                <div class="options-overlay bg-black-op-75">
                                    <div class="options-overlay-content">
                                        <h3 class="h4 text-white mb-5">contacto</h3>
                                        <h4 class="h6 text-white-op mb-15">More Details</h4>
                                        
                                        <a class="btn btn-sm btn-rounded btn-noborder btn-alt-success min-width-75" href="#" data-toggle="modal" data-target="#contactModal"><i class="fa fa-pencil"></i> Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Central Modal Small -->
                        <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <!-- Change class .modal-sm to change the size of the modal -->
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title w-100" id="myModalLabel">Cambiar imagen contacto</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    {!! Form::model($config, ['route' => ['config.contacto', $config->id],'method' => 'PUT', 'files' => 'true']) !!}
                                    <div class="modal-body">
                                            {{ Form::label('contact', 'contacto')}}
                                                <input type="file" name="contact">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                        <!-- Termina imagen bienvenido -->
                        <colorpicker-component/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(function() {
            Codebase.layout('header_style_glass');
        });
    </script>
    
@endsection