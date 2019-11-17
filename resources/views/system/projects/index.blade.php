@extends('layouts.backend')

@section('styles')
    <style>
        .project-banner{
            width: 100%;
            padding-top: 50%; /* 1:1 Aspect Ratio */
            background-size: cover;
            background-position: center;
            position: relative; /* If you want text inside of it */
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
                    @foreach ($projects as $project)
                        <div class="col-md-6 col-xl-4 js-appear-enabled animated fadeIn" data-toggle="appear">
                            <div class="block block-rounded">
                                <div class="block-content p-0 overflow-hidden">
                                    <div class="project-banner" style="background-image: url('{{ $project->banner }}');">

                                    </div>
                                </div>
                                <div class="block-content border-bottom">
                                    <h4 class="font-size-h5 mb-10">{{ $project->title }}</h4>
                                    <h5 class="font-size-h3 font-w300 mb-5">{{ $project->user->name }}</h5>
                                    <p class="text-muted">
                                        <i class="fa fa-map-pin mr-5"></i> {{ $project->place }}
                                    </p>
                                </div>
                                <div class="block-content border-bottom">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <p>
                                                @php
                                                    $totalGuests = 0;
                                                    $totalCompanions = 0;

                                                    foreach ($project->list->guests as $guest) {
                                                        $companions = count($guest->companions);
                                                        $totalCompanions = $totalCompanions + $companions;
                                                    }
                                                    
                                                    $totalGuests = count($project->list->guests) + $totalCompanions;
                                                @endphp
                                                <i class="fa fa-fw fa-users text-muted mr-5"></i> <strong>{{ $totalGuests }}</strong> Invitados
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-content block-content-full">
                                    <div class="row">
                                        <div class="col-6">
                                            <a class="btn btn-sm btn-hero btn-noborder btn-secondary btn-block" href="{{ route('projects.show', $project->id) }}">
                                                Detalles
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <a class="btn btn-sm btn-hero btn-noborder btn-primary btn-block" href="{{ route('projects.edit', $project->id) }}">
                                                Editar
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection