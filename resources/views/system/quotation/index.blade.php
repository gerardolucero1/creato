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


<!-- Tabla de cotizaciones -->

<div class="col-md-9">
            <div class="block">
            <table class="table table-striped table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 100px;"><i class="si si-user"></i></th>
                        <th>Nombre</th>
                        <th class="d-none d-sm-table-cell" style="width: 20%;">Email</th>
                        <th class="d-none d-md-table-cell" style="width: 20%;">Fecha</th>
                        <th class="d-none d-md-table-cell" style="width: 30%;">Lugar</th>
                        <th class="text-center" style="width: 100px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                @foreach ($quotations as $quotation)
                                        <tr>
                        <td class="text-center">
                            <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar12.jpg" alt="">
                        </td>
                        <td class="font-w600">{{ $quotation->name }}</td>
                        <td class="d-none d-sm-table-cell">{{ $quotation->email }}</td>
                        <td class="d-none d-md-table-cell">
                            <span class="badge badge-info">{{ $quotation->date }}</span>
                        </td>
                        <td class="d-none d-sm-table-cell">{{ $quotation->place }}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                    <i class="fa fa-pencil"></i>
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
                                                                document.getElementById('delete-project-{{ $quotation->id }}').submit();
                                                                Swal.fire(
                                                                'Deleted!',
                                                                'Your file has been deleted.',
                                                                'success'
                                                                )
                                                            }
                                                        });
                                                    "
                                                    style="submit" class="btn btn-sm btn-secondary js-tooltip-enabled">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                                <form id="delete-project-{{ $quotation->id }}" action="{{ route('quotation.delete', $quotation->id) }}" method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                <!-- <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete">
                                    <i class="fa fa-times"></i>
                                </button> -->
                            </div>
                        </td>
                    </tr>


                @endforeach
                                    </tbody>
            </table>

            </div>
        </div>

<!-- Termina tabla cotizaciones -->

@endsection
