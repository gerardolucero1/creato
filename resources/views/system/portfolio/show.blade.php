@extends('layouts.backend')

@section('styles')
    <style>
        .bg-image{
            background-size: cover;
            background-position: center;
        }

        .image-portfolio{
            width: 100%;
            padding-top: 15%; /* 1:1 Aspect Ratio */
            position: relative; /* If you want text inside of it */
            background-size: cover;
            background-position: center;
        }

        .image-portfolio:hover .layer{
            opacity: 1;
        }

        .layer{
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.5);
            opacity: 0;
            transition: all 0.4s;
        }
    </style>
@endsection

@section('content')
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block block-themed pb-4">
                    <div class="block-header bg-success">
                    <h3 class="block-title">{{ $portfolio->title }}</h3>
                        <div class="block-options">
                            <a href="{{ route('portfolio.edit', $portfolio->id) }}" class="btn-block-option">
                                <i class="si si-pencil"></i>
                            </a>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="col-md-12">
                            <div class="block">
                                <div class="bg-image" style="background-image: url('{{ $portfolio->banner }}');">
                                    <div class="block-content block-content-full bg-black-op ribbon ribbon-bottom ribbon-crystal">
                                        <div class="ribbon-box">
                                            <i class="fa fa-check"></i> {{ $portfolio->date }}
                                        </div>
                                        <div class="text-center py-50">
                                            <h4 class="font-w700 text-white text-uppercase mb-0">{{ $portfolio->title }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <h2>{{ $portfolio->place }}</h2>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row p-4">
                            <div class="col-md-12">
                                <div class="block">
                                    <div class="block-content block-content-full d-flex align-items-center justify-content-between bg-primary">
                                        <div class="mr-5">
                                            <p class="font-size-lg font-w600 text-white mb-0">
                                                Galeria de {{ $portfolio->title }}
                                            </p>
                                            <p class="font-size-sm text-uppercase font-w600 text-white-op mb-0">
                                                {{ count($portfolio->images) }} Fotos
                                            </p>
                                        </div>
                                        <div class="p-20">
                                            <i class="fa fa-2x fa-image text-white-op"></i>
                                        </div>
                                    </div>
                                    <div class="block-content block-content-full">
                                        <div class="row js-gallery img-fluid-100 gutters-tiny js-gallery-enabled">
                                            @foreach ($portfolio->images as $image)
                                                <div class="col-md-4 image-portfolio" style="background-image: url('{{ $image->file_name }}'); margin: 0;">
                                                    <div class="layer d-flex justify-content-center align-items-center">
                                                        <button onclick="event.preventDefault();
                                                            Swal.fire({
                                                                title: 'Are you sure?',
                                                                text: 'You wont be able to revert this!',
                                                                type: 'warning',
                                                                showCancelButton: true,
                                                                confirmButtonColor: '#3085d6',
                                                                cancelButtonColor: '#d33',
                                                                confirmButtonText: 'Yes, delete it!'
                                                                }).then((result) => {
                                                                if (result.value) {
                                                                    document.getElementById('delete-project-image-{{ $image->id }}').submit();
                                                                    Swal.fire(
                                                                    'Deleted!',
                                                                    'Your file has been deleted.',
                                                                    'success'
                                                                    )
                                                                }
                                                            });
                                                        "
                                                        style="submit" class="btn btn-sm btn-rounded btn-alt-danger min-width-75">
                                                            <i class="fa fa-times"></i> Delete
                                                        </button>
                
                                                        <form id="delete-project-image-{{ $image->id }}" action="{{ route('portfolio.delete.image', $image->id) }}" method="POST" class="d-inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            @foreach ($portfolio->images as $image)
                                
                            @endforeach
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-8 offset-md-2">
                            <form action="{{ asset('/dashboard/portafolio/'.$portfolio->id.'/imagenes') }}"
                                    class="dropzone"
                                    id="my-awesome-dropzone">

                                    @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        // "myAwesomeDropzone" es el ID de nuestro formulario usando la notación camelCase
        Dropzone.options.myAwesomeDropzone = {
            paramName: "file", // Las imágenes se van a usar bajo este nombre de parámetro
            maxFilesize: 2 // Tamaño máximo en MB
        };
    </script>
@endsection