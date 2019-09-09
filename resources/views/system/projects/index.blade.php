@extends('layouts.backend')

@section('styles')
    <style>
        .portfolio{
            width: 100%;
            padding-top: 25%; /* 1:1 Aspect Ratio */
            background-size: cover;
            background-position: center;
            position: relative; /* If you want text inside of it */
        }

        .portfolio .options-container{
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
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

    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block block-themed">
                    <div class="block-header bg-gd-sea">
                        <h3 class="block-title">Proyectos</h3>
                        <div class="block-options">
                            <a href="{{ route('projects.create') }}" class="btn-block-option">
                                <i class="si si-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="block text-center">
                            <div class="block-content block-content-full block-sticky-options pt-30">
                                <div class="block-options">
                                    <div class="dropdown">
                                        <button type="button" class="btn-block-option" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-fw fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(27px, 28px, 0px);">
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="fa fa-fw fa-user mr-5"></i>Check out profile
                                            </a>
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="fa fa-fw fa-folder mr-5"></i>Check out project
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="javascript:void(0)">
                                                <i class="fa fa-fw fa-envelope-o mr-5"></i>Send a message
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <img class="img-avatar" src="https://data.whicdn.com/images/261286359/superthumb.jpg" alt="">
                            </div>
                            <div class="block-content block-content-full block-content-sm bg-body-light">
                                <div class="font-w600 mb-5">Ralph Murray</div>
                                <div class="font-size-sm text-muted">Web Developer</div>
                            </div>
                            <div class="block-content">
                                <div class="row items-push">
                                    <div class="col-6">
                                        <div class="mb-5"><i class="si si-notebook fa-2x"></i></div>
                                        <div class="font-size-sm text-muted">4 Notes</div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-5"><i class="si si-camera fa-2x"></i></div>
                                        <div class="font-size-sm text-muted">14 Photos</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection