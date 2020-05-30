@extends('layouts.backend')

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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="block block-rounded">
                    <button type="button" class="btn btn-square btn-secondary mr-5 mb-5" onClick="history.back()">
                        <i class="fa fa-arrow-circle-left mr-5"></i>Regresar
                    </button>
                    <div class="block-content bg-pattern">
                        <div class="py-20 text-center">
                            <h1 class="h3 mb-5">{{ $task->name }}</h1>
                            <p class="mb-10 text-muted">
                                <em>{{ $task->list->name }}</em>
                            </p>
                            <p>
                                
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (session('info'))
            <div class="mt-4 alert alert-success alert-dismissible fade show" role="alert">
                {{ session('info') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('error'))
            <div class="mt-4 alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    
        @if (count($errors))
            <div class="mt-4 alert alert-danger alert-dismissible fade show" role="alert">
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

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('adminList.taskGalleryStore', $task->id) }}"
                            class="dropzone"
                            id="my-awesome-dropzone">
    
                            @csrf
                        </form>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center align-items-center">
                        <p>Cargar fotos como evidencia de progreso</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="margin-bottom: 20px">
                <div class="row">
                    @foreach ( $task->evidence as $photo)
                        <div class="col-4 col-md-2" style="margin-top: 20px">
                            <div class="container-gallery">
                                <a data-fancybox="gallery" href="{{ $photo->image }}"><img src="{{ $photo->image }}" width="100%"></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        
    </div>

    
@endsection

@section('scripts')
    <script>
        Dropzone.options.myAwesomeDropzone = {
            paramName: "file", 
            maxFilesize: 5 
        };
    </script>
@endsection
