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
                        <h3 class="block-title">Portafolio</h3>
                        <div class="block-options">
                            <a href="{{ route('portfolio.create') }}" class="btn-block-option">
                                <i class="si si-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="block-content pb-4">
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
            </div>
        </div>
    </section>
@endsection
