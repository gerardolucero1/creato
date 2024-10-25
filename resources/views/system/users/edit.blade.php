@extends('layouts.backend')

@section('styles')
    <style>
        .btn-modal{
            position: absolute;
            bottom: 0;
            left: 0;
            margin-bottom: 5px;
            margin-left: 5px;
        } 
    </style>
@endsection

@section('content')
    <div class="bg-image bg-image-bottom" style="background-image: url('{{ $user->profile->banner }}'); position: relative;">
        <div class="bg-primary-dark-op py-30">
            <div class="content content-full text-center">
                <div class="mb-15">
                    <a class="img-link" href="#">
                        <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{ $user->profile->photo }}" alt="" data-toggle="modal" data-target="#obtenerFotosPerfil">
                    </a>
                </div>
                <h1 class="h3 text-white font-w700 mb-10">{{ $user->name }}</h1>
                <h2 class="h5 text-white-op">
                    {{ $user->email }}
                </h2>

                <button type="button" class="btn btn-circle btn-alt-secondary mr-5 mb-5 btn-modal" data-toggle="modal" data-target="#obtenerFotosBanner">
                    <i class="fa fa-pencil"></i>
                </button>
            </div>
        </div>
    </div>

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

    @include('system.users.modals.profilePicture')
    @include('system.users.modals.bannerPicture')
@endsection

@section('scripts')
    <script>
        $(function() {
            Codebase.layout('header_style_glass');
        });

        $(function() {
        $('#file-input-image').change(function(e) {
            addImage(e); 
            });

            function addImage(e){
            var file = e.target.files[0],
            imageType = /image.*/;
        
            if (!file.type.match(imageType))
            return;
        
            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
            }
        
            function fileOnload(e) {
            var result=e.target.result;
            $('#imgSalida').attr("src",result);
            }
        });

        $(function() {
        $('#file-input-2').change(function(e) {
            addImage(e); 
            });

            function addImage(e){
            var file = e.target.files[0],
            imageType = /image.*/;
        
            if (!file.type.match(imageType))
            return;
        
            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
            }
        
            function fileOnload(e) {
            var result=e.target.result;
            $('#imgSalida2').attr("src",result);
            }
        });
    </script>
    
@endsection