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

    <div class="bg-image bg-image-bottom" style="background-image: url('{{ $user->profile->banner }}');">
        <div class="bg-black-op-75 py-30">
            <div class="content content-full text-center">
                <div class="mb-15">
                    <a class="img-link" href="#">
                        <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{ $user->profile->photo }}" alt="">
                    </a>
                </div>
                <h1 class="h3 text-white font-w700 mb-10">{{ $user->name }}</h1>
                <h2 class="h5 text-white-op">
                    {{ $user->email }}
                </h2>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    <i class="fa fa-user-circle mr-5 text-muted"></i> Editar usuario
                </h3>
            </div>
            <div class="block-content">
                {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT', 'files' => 'true']) !!}

                    @include('system.users.partial.form')
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(function() {
            Codebase.layout('header_style_glass');
        });
    </script>
    
@endsection