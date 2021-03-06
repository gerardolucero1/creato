@extends('layouts.backend')

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
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Crear nuevo portafolio</h3>
                        <div class="block-options">
                            <a href="{{ route('portfolio.create') }}" class="btn btn-sm btn-secondary">Añadir portafolio</a>
                        </div>
                    </div>
                    {{-- <div class="block-header bg-gd-sea">
                        <h3 class="block-title">Portafolio</h3>
                        <div class="block-options">
                            <a href="{{ route('portfolio.create') }}" class="btn-block-option">
                                <i class="si si-plus"></i>
                            </a>
                        </div>
                    </div> --}}
                    <div class="block-content pb-4">
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::open(['route' => 'portfolio.store', 'files' => 'true']) !!}
            
                                    @include('system.portfolio.partial.form')
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    
@endsection