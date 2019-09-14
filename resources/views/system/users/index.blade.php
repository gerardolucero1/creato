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
                <div class="block block-themed bg-gray-light">
                    <div class="block-header bg-gd-sea">
                        <h3 class="block-title">Usuarios</h3>
                        <div class="block-options">
                            <a href="{{ route('users.create') }}" class="btn-block-option">
                                <i class="si si-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="block-content pb-4">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <p class="p-10 bg-info text-center text-capitalize">webmaster</p>
                                <div class="row">
                                    @foreach ($users as $user)
                                        @if ($user->hasRole('super-admin'))
                                            <div class="col-md-4 col-xl-4">
                                                <div class="block text-center">
                                                    <div class="block-content block-content-full block-content-sm">
                                                        <div class="font-w600">{{ $user->name }}</div>
                                                    </div>
                                                    <div class="block-content block-content-full bg-body-light">
                                                        <img class="img-avatar img-avatar-thumb" src="https://i.pinimg.com/originals/19/d1/90/19d1906421efdfc2cb96194c751c0fc2.jpg" alt="">
                                                    </div>
                                                    <div class="block-content block-content-full">
                                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-circle btn-alt-warning mr-5 mb-5 js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <button type="button" class="btn btn-circle btn-alt-success mr-5 mb-5 js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Profile">
                                                            <i class="fa fa-user"></i>
                                                        </button>
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
                                                                    document.getElementById('delete-project-{{ $user->id }}').submit();
                                                                    Swal.fire(
                                                                    'Deleted!',
                                                                    'Your file has been deleted.',
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content pb-4">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="p-10 bg-primary-light text-center text-capitalize">Editores</p>
                                <div class="row">
                                    @foreach ($users as $user)
                                        @if ($user->hasRole('editor'))
                                            <div class="col-md-3 col-xl-3">
                                                <div class="block text-center">
                                                    <div class="block-content block-content-full block-content-sm">
                                                        <div class="font-w600">{{ $user->name }}</div>
                                                    </div>
                                                    <div class="block-content block-content-full bg-body-light">
                                                        <img class="img-avatar img-avatar-thumb" src="https://i.pinimg.com/originals/19/d1/90/19d1906421efdfc2cb96194c751c0fc2.jpg" alt="">
                                                    </div>
                                                    <div class="block-content block-content-full">
                                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-circle btn-alt-warning mr-5 mb-5 js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <button type="button" class="btn btn-circle btn-alt-success mr-5 mb-5 js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Profile">
                                                            <i class="fa fa-user"></i>
                                                        </button>
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
                                                                    document.getElementById('delete-project-{{ $user->id }}').submit();
                                                                    Swal.fire(
                                                                    'Deleted!',
                                                                    'Your file has been deleted.',
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content pb-4">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="p-10 bg-muted text-center text-capitalize" style="color: white;">Clientes</p>
                                <div class="row">
                                    @foreach ($users as $user)
                                        @if ($user->hasRole('cliente'))
                                            <div class="col-md-3 col-xl-3">
                                                <div class="block text-center">
                                                    <div class="block-content block-content-full block-content-sm">
                                                        <div class="font-w600">{{ $user->name }}</div>
                                                    </div>
                                                    <div class="block-content block-content-full bg-body-light">
                                                        <img class="img-avatar img-avatar-thumb" src="https://i.pinimg.com/originals/19/d1/90/19d1906421efdfc2cb96194c751c0fc2.jpg" alt="">
                                                    </div>
                                                    <div class="block-content block-content-full">
                                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-circle btn-alt-warning mr-5 mb-5 js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <button type="button" class="btn btn-circle btn-alt-success mr-5 mb-5 js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Profile">
                                                            <i class="fa fa-user"></i>
                                                        </button>
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
                                                                    document.getElementById('delete-project-{{ $user->id }}').submit();
                                                                    Swal.fire(
                                                                    'Deleted!',
                                                                    'Your file has been deleted.',
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
                                </div>
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