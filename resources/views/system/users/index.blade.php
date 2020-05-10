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
    <div class="bg-primary">
        <div class="bg-pattern bg-black-op-25">
            <div class="content content-top text-center">
                <div class="py-50">
                    <h1 class="font-w700 text-white mb-10">Equipo</h1>
                    <h2 class="h4 font-w400 text-white-op">Creato studio, event design.</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="content content-full">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Administradores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Editores</a>
                    </li>
                    <li class="nav-item ml-auto">
                        <a class="btn btn-sm btn-secondary" href="{{ route('users.create') }}">
                            Añadir usuario
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="mt-3">
                            <section class="row">
                                @foreach ($users as $user)
                                    @if ($user->hasRole('super-admin'))
                                        <div class="col-md-6 col-xl-4" style="margin: 0; padding: 10px;">
                                            <div class="block text-center">
                                                <div class="block-content">
                                                    <img class="img-avatar img-avatar96" src="https://hallyumusic.com/wp-content/uploads/2018/01/APRIL-Chaewon-The-Ruby-Cover.jpg" alt="">
                                                </div>
                                                <div class="block-content block-content-full">
                                                    <div class="font-size-h4 font-w600 mb-0">{{ $user->name }}</div>
                                                    <div class="font-size-h5 text-muted">Administrador</div>
                                                </div>
                                                <div class="block-content block-content-full bg-body-light">
                                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-circle btn-alt-warning mr-5 mb-5 js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    {{-- <button type="button" class="btn btn-circle btn-alt-success mr-5 mb-5 js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Profile">
                                                        <i class="fa fa-user"></i>
                                                    </button> --}}
                                                    <button onclick="event.preventDefault();
                                                        Swal.fire({
                                                            title: '¿Estas seguro?',
                                                            text: '¡No podras revertir esto!',
                                                            type: 'warning',
                                                            showCancelButton: true,
                                                            confirmButtonColor: '#3085d6',
                                                            cancelButtonColor: '#d33',
                                                            confirmButtonText: 'Archivar'
                                                            }).then((result) => {
                                                            if (result.value) {
                                                                document.getElementById('delete-project-{{ $user->id }}').submit();
                                                                Swal.fire(
                                                                'Eliminar',
                                                                'El usuario ha sido eliminado',
                                                                'success'
                                                                )
                                                            }
                                                        });
                                                    "
                                                    style="submit" class="btn btn-circle btn-alt-danger mr-5 mb-5 js-tooltip-enabled">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                    <form id="delete-project-{{ $user->id }}" action="{{ route('users.delete', $user->id) }}" method="POST" class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </section>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="mt-3">
                            <section class="row">
                                @foreach ($users as $user)
                                    @if ($user->hasRole('editor'))
                                        <div class="col-md-6 col-xl-4" style="margin: 0; padding: 10px;">
                                            <div class="block text-center">
                                                <div class="block-content">
                                                    <img class="img-avatar img-avatar96" src="https://hallyumusic.com/wp-content/uploads/2018/01/APRIL-Chaewon-The-Ruby-Cover.jpg" alt="">
                                                </div>
                                                <div class="block-content block-content-full">
                                                    <div class="font-size-h4 font-w600 mb-0">{{ $user->name }}</div>
                                                    <div class="font-size-h5 text-muted">Editor</div>
                                                </div>
                                                <div class="block-content block-content-full bg-body-light">
                                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-circle btn-alt-warning mr-5 mb-5 js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    {{-- <button type="button" class="btn btn-circle btn-alt-success mr-5 mb-5 js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Profile">
                                                        <i class="fa fa-user"></i>
                                                    </button> --}}
                                                    <button onclick="event.preventDefault();
                                                        Swal.fire({
                                                            title: '¿Estas seguro?',
                                                            text: '¡No podras revertir esto!',
                                                            type: 'warning',
                                                            showCancelButton: true,
                                                            confirmButtonColor: '#3085d6',
                                                            cancelButtonColor: '#d33',
                                                            confirmButtonText: 'Archivar'
                                                            }).then((result) => {
                                                            if (result.value) {
                                                                document.getElementById('delete-project-{{ $user->id }}').submit();
                                                                Swal.fire(
                                                                'Eliminar',
                                                                'El usuario ha sido eliminado',
                                                                'success'
                                                                )
                                                            }
                                                        });
                                                    "
                                                    style="submit" class="btn btn-circle btn-alt-danger mr-5 mb-5 js-tooltip-enabled">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                    <form id="delete-project-{{ $user->id }}" action="{{ route('users.delete', $user->id) }}" method="POST" class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(function() {
            Codebase.layout('header_style_glass');
        });
    </script>
    
@endsection