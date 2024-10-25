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

        .project{
            width: 100%;
            height: 300px;
            position: relative;
        }

        .project img{
            width: 100%;
            height: 300px;
            object-fit: cover;
            object-position: center;
        }
    </style>
@endsection

@section('content')
    <div class="bg-primary">
        <div class="bg-pattern bg-black-op-25">
            <div class="content content-top text-center">
                <div class="py-50">
                    <h1 class="font-w700 text-white mb-10">Portafolio</h1>
                    <h2 class="h4 font-w400 text-white-op">Creato studio, event design.</h2>
                </div>
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

    <div class="content content-full">
        <div class="block-header block-header-default">
            <h3 class="block-title">Listado de portafolios</h3>
            <div class="block-options">
                <a href="{{ route('portfolio.create') }}" class="btn btn-sm btn-secondary">Añadir portafolio</a>
            </div>
        </div>
        <div class="js-filter js-filter-enabled">
            <div class="row items-push img-fluid-100 mt-4">
                @foreach ($portfolios as $portfolio)
                    <div class="col-sm-6 col-md-3 project" data-category="logo">
                        <a class="img-link" href="{{ route('portfolio.show', $portfolio->id) }}">
                            <img class="img-fluid img-thumb" src="{{ $portfolio->banner }}" alt="{{ $portfolio->title }}">
                        </a>
                        <p class="text-center">{{ $portfolio->title }}</p>
                    </div>
                @endforeach
            </div>
            <div class="bg-white push mt-4">
                <div class="row text-center">
                    <div class="col-sm-12 py-30">
                        <div class="font-size-h1 font-w700 text-black js-count-to-enabled" data-toggle="countTo" data-to="3">{{ count($portfolios) }}</div>
                        <div class="font-w600 text-muted text-uppercase">Proyectos</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="content content-full">
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Listado de clientes</h3>
                <div class="block-options">
                    <a href="{{ route('users.create') }}" class="btn btn-sm btn-secondary">Añadir cliente</a>
                </div>
            </div>
            
            <div class="block-content">
                <div class="row">
                    @foreach ($portfolios as $portfolio)
                        <div class="col-md-4 animated fadeIn portfolio" style="background-image: url('{{ $portfolio->banner }}');">
                            <div class="options-container fx-item-zoom-in fx-overlay-zoom-out">
                                <div class="options-overlay bg-black-op">
                                    <div class="options-overlay-content">
                                        <h3 class="h4 text-white mb-5">{{ $portfolio->title }}</h3>
                                        <h4 class="h6 text-white-op mb-15">{{ $portfolio->date }}</h4>
                                        <a class="btn btn-sm btn-rounded btn-alt-primary min-width-75" href="{{ route('portfolio.edit', $portfolio->id) }}">
                                            <i class="fa fa-pencil"></i> Edit
                                        </a>
                                        <a class="btn btn-sm btn-rounded btn-alt-primary min-width-75" href="{{ route('portfolio.show', $portfolio->id) }}">
                                            <i class="fa fa-eye"></i> Show
                                        </a>
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
                                                        document.getElementById('delete-project-{{ $portfolio->id }}').submit();
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
                                        <form id="delete-project-{{ $portfolio->id }}" action="{{ route('portfolio.delete', $portfolio->id) }}" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div> --}}
@endsection

@section('scripts')
    <script>
        $(function() {
            Codebase.layout('header_style_glass');
        });
    </script>
    
@endsection
