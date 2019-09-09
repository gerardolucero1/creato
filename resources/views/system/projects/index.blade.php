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
                            <a href="{{ route('portfolio.create') }}" class="btn-block-option">
                                <i class="si si-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="block-content pb-4">
                        <div class="row">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection