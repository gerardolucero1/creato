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
                    <h1 class="font-w700 text-white mb-10">Clientes</h1>
                    <h2 class="h4 font-w400 text-white-op">Creato studio, hacemos tu boda realidad.</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Listado de clientes</h3>
                <div class="block-options">
                    <a href="{{ route('users.create') }}" class="btn btn-sm btn-secondary">Añadir cliente</a>
                </div>
            </div>
            <div class="block-content block-content-full">
                <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full dataTable no-footer" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
                                <thead>
                                    <tr role="row">
                                        <th class="text-center sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label=": activate to sort column descending"></th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Nombre</th>
                                        <th class="d-none d-sm-table-cell sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Email</th>
                                        <th class="d-none d-sm-table-cell sorting" style="width: 15%;" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Access: activate to sort column ascending">Acceso</th>
                                        <th class="text-center sorting_disabled" style="width: 15%;" rowspan="1" colspan="1" aria-label="Profile">Opciones</th></tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        @if ($user->hasRole('cliente'))
                                            <tr role="row" class="odd">
                                                <td class="text-center sorting_1">{{ $user->id }}</td>
                                                <td class="font-w600">{{ $user->name }}</td>
                                                <td class="d-none d-sm-table-cell">{{ $user->email }}</td>
                                                <td class="d-none d-sm-table-cell">
                                                    <span class="badge badge-danger">Cliente</span>
                                                </td>
                                                <td class="text-center">
                                                    <a type="button" href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="Editar cliente" data-original-title="View Customer">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <button onclick="event.preventDefault();
                                                        Swal.fire({
                                                            title: '¿Estas seguro?',
                                                            text: '¡No podras revertir esto!',
                                                            type: 'warning',
                                                            showCancelButton: true,
                                                            confirmButtonColor: '#3085d6',
                                                            cancelButtonColor: '#d33',
                                                            confirmButtonText: 'Eliminar'
                                                            }).then((result) => {
                                                            if (result.value) {
                                                                document.getElementById('delete-project-{{ $user->id }}').submit();
                                                                Swal.fire(
                                                                '¡Eliminado!',
                                                                'El cliente ha sido eliminado',
                                                                'success'
                                                                )
                                                            }
                                                        });
                                                    "
                                                    type="submit" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="Eliminar cliente" data-original-title="Delete Customer">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                    <form id="delete-project-{{ $user->id }}" action="{{ route('users.delete', $user->id) }}" method="POST" class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--  <div class="content content-full">
        <div class="row gutters-tiny py-20">
            @foreach ($users as $user)
                @if ($user->hasRole('cliente'))
                    <div class="col-md-6 col-xl-4">
                        <div class="block text-center">
                            <div class="block-content">
                                <img class="img-avatar img-avatar96" src="https://hallyumusic.com/wp-content/uploads/2018/01/APRIL-Chaewon-The-Ruby-Cover.jpg" alt="">
                            </div>
                            <div class="block-content block-content-full">
                                <div class="font-size-h4 font-w600 mb-0">{{ $user->name }}</div>
                                <div class="font-size-h5 text-muted">{{ $user->email }}</div>
                            </div>
                            <div class="block-content block-content-full bg-body-light">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-circle btn-alt-warning mr-5 mb-5 js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-circle btn-alt-success mr-5 mb-5 js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Profile">
                                    <i class="fa fa-user"></i>
                                </button>
                                <button onclick="event.preventDefault();
                                    Swal.fire({
                                        title: '¿Estas seguro?',
                                        text: '¡No podras revertir esto!',
                                        type: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Eliminar'
                                        }).then((result) => {
                                        if (result.value) {
                                            document.getElementById('delete-project-{{ $user->id }}').submit();
                                            Swal.fire(
                                            '¡Eliminado!',
                                            'El cliente ha sido eliminado',
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
            <div class="col-md-6 col-xl-4">
                <div class="block text-center">
                    <div class="block-content">
                        <img class="img-avatar img-avatar96" src="https://images.ctfassets.net/oxjq45e8ilak/2TGv5KhlzHxWNVtNyseaEY/f4f2108d1340fbeb2a57cf3c2d363bf0/MicrosoftTeams-image__1_.png" alt="Your photo">
                    </div>
                    <div class="block-content block-content-full">
                        <div class="font-size-h4 font-w600 mb-0">El</div>
                        <div class="font-size-h5 text-muted">Añadir nuevo cliente</div>
                    </div>
                    <div class="block-content block-content-full bg-body-light">
                        <a class="btn btn-rounded btn-alt-primary d-inline-block" href="{{ route('users.create') }}">
                            <i class="fa fa-pencil mr-5"></i>Registrar cliente
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>  --}}
@endsection

@section('scripts')
    <script>
        $(function() {
            Codebase.layout('header_style_glass');
        });
    </script>
@endsection