@extends('layouts.client')

@section('styles')
    <style>
        .container-gallery{
            background-color: red;
            width: 100%;
            padding-top: 100%; /* 1:1 Aspect Ratio */
            position: relative; /* If you want text inside of it */
        }

        /* If you want text inside of the container */
        .container-gallery img{
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            object-fit: cover;
            object-position: center;
            -webkit-filter: grayscale(100%);
            -moz-filter: grayscale(100%);
            filter: grayscale(100%);
            transition: all 0.5s ease;
        }

        .container-gallery:hover img{
            -webkit-filter: grayscale(0%);
            -moz-filter: grayscale(0%);
            filter: grayscale(0%);
        }

        .bg-image{
            position: relative;
        }

        .btn-modal{
            position: absolute;
            top: 0;
            left: 0;
            margin-top: 5px;
            margin-left: 5px;
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
<section class="content">
    <div class="bg-image" style="background-image: url('{{ Auth::user()->profile->banner }}');">
        <div class="bg-black-op-75">
            <div class="content content-top text-center">
                <div class="py-100">
                    <button type="button" class="btn btn-circle btn-alt-secondary mr-5 mb-5 btn-modal" data-toggle="modal" data-target="#obtenerFotosBanner">
                        <i class="fa fa-pencil"></i>
                    </button>
                
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="block">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="m-5">
                                    <a class="img-link" href="#" data-toggle="modal" data-target="#obtenerFotosPerfil">
                                        <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{ Auth::user()->profile->photo }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-10 d-flex align-items-center">
                                <div class="ml-5">
                                    <h1 class="h3 font-w700 mb-10">
                                        {{ Auth::user()->name }}
                                    </h1>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-6" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                        <h4 style="margin-bottom: -5px;">FALTAN PARA MI BODA...</h4>
                        <client-profile-component :user-id="{{ auth()->id() }}"></client-profile-component>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('gallery.store', Auth::user()->id) }}"
                        class="dropzone"
                        id="my-awesome-dropzone">

                        @csrf
                    </form>
                </div>
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <p>Sube tus fotos y guardalas como un hermoso recuerdo.</p>
                </div>
            </div>
        </div>
        <div class="col-md-12" style="margin-bottom: 20px">
            <div class="row">
                @foreach ( Auth::user()->gallery as $photo)
                    <div class="col-4 col-md-2" style="margin-top: 20px">
                        <div class="container-gallery">
                            <a data-fancybox="gallery" href="{{ $photo->image }}"><img src="{{ $photo->image }}" width="100%"></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @include('system.client.profile.modals.profilePicture')
    @include('system.client.profile.modals.bannerPicture')
</section>

@endsection

@section('scripts')
    <script>
        Dropzone.options.myAwesomeDropzone = {
            paramName: "file", 
            maxFilesize: 5 
        };

        $(function() {
        $('#file-input').change(function(e) {
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