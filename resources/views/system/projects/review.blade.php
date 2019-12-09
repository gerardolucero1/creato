@extends('layouts.backend')

@section('styles')
    <style>
        .list-group-item a{
            color: black;
            font-size: 19px;
        }
    </style>
@endsection

@section('content')
<div class="content">
    <h2 class="content-heading d-print-none">
        <a href="{{ route('projects.create') }}" class="btn btn-sm btn-rounded btn-success float-right">Nuevo proyecto</a>
        Resumen de evento
    </h2>
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">{{ $project->title }}</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" onclick="Codebase.helpers('print-page');">
                    <i class="si si-printer"></i> Imprimir lista
                </button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                    <i class="si si-refresh"></i>
                </button>
            </div>
        </div>
        <div class="block-content">
            <div class="row my-20">
                <div class="col-6">
                    <p class="h3">Creato Studio</p>
                    <address>
                        {{ \Carbon\Carbon::now()->toFormattedDateString()}}<br>
                        Chihuahua, Chihuahua<br>
                        Chihuahua 2000, 33131<br>
                        creato-studio@gmail.com
                    </address>
                </div>
                <div class="col-6 text-right">
                    <p class="h3">{{ $project->user->name }}</p>
                    <address>
                        {{ \Carbon\Carbon::parse($project->date)->toFormattedDateString()}}<br>
                        {{ $project->place }}<br>
                        Chihuahua 2000, 33131<br>
                        {{ $project->user->email }}
                    </address>
                </div>
            </div>
            <div class="table-responsive push">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 60px;"></th>
                            <th>Nombre</th>
                            <th class="text-center" style="width: 90px;">Invitados</th>
                            <th class="text-right" style="width: 120px;">Telefono</th>
                            <th class="text-right" style="width: 120px;">Email</th>
                            <th class="text-right" style="width: 120px;">Parte de</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($project->list->guests as $guest)
                            <tr class="table-primary">
                                <td class="text-center">
                                    
                                </td>
                                <td>
                                <p class="font-w600 mb-5">{{ $guest->name }} {{ $guest->lastName }} {{ $guest->secondLastName }}</p>
                                    <div class="text-muted">Estatus: {{ $guest->status }}</div>
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-pill badge-primary">{{ $guest->guests }}</span>
                                </td>
                                <td class="text-right">{{ $guest->phone }}</td>
                                <td class="text-right">{{ $guest->email }}</td>
                                <td class="text-right">{{ $guest->origin }}</td>
                                <tbody>
                                    @foreach ($guest->companions as $companion)
                                        <tr>    
                                            <td colspan="1">
                                                
                                            </td>
                                            <td>
                                                <p class="font-w600 mb-5">{{ $companion->name }} {{ $companion->lastName }} {{ $companion->secondLastName }}</p>
                                                <div class="text-muted">Estatus: {{ $companion->status }}</div>
                                            </td>
                                            <td colspan="2">{{ $companion->phone }}</td>
                                            <td colspan="2">{{ $companion->email }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="5" class="font-w600 text-right">Confirmados</td>
                                @php
                                    $confirmados = 0;
                                    foreach($project->list->guests as $guest){
                                        if($guest->status == 'CONFIRMADO'){
                                            $confirmados++;
                                        }
                                        foreach ($guest->companions as $companion) {
                                            if($companion->status == 'CONFIRMADO'){
                                                $confirmados++;
                                            }
                                        }
                                    }
                                @endphp
                            <td class="text-right">{{ $confirmados }}</td>
                        </tr>
                        <tr>
                            <td colspan="5" class="font-w600 text-right">Pendientes</td>
                                @php
                                    $pendientes = 0;
                                    foreach($project->list->guests as $guest){
                                        if($guest->status == 'PENDIENTE'){
                                            $pendientes++;
                                        }
                                        foreach ($guest->companions as $companion) {
                                            if($companion->status == 'PENDIENTE'){
                                                $pendientes++;
                                            }
                                        }
                                    }
                                @endphp
                            <td class="text-right">{{ $pendientes }}</td>
                        </tr>
                        <tr>
                            <td colspan="5" class="font-w600 text-right">Cancelado</td>
                                @php
                                    $cancelado = 0;
                                    foreach($project->list->guests as $guest){
                                        if($guest->status == 'CANCELADO'){
                                            $cancelado++;
                                        }
                                        foreach ($guest->companions as $companion) {
                                            if($companion->status == 'CANCELADO'){
                                                $cancelado++;
                                            }
                                        }
                                    }
                                @endphp
                            <td class="text-right">{{ $cancelado }}</td>
                        </tr>
                        <tr class="table-warning">
                            <td colspan="5" class="font-w700 text-uppercase text-right">Invitados totales</td>
                                @php
                                    $total = 0;
                                    foreach($project->list->guests as $guest){
                                        $total++;
                                        foreach ($guest->companions as $companion) {
                                            $total++;
                                        }
                                    }
                                @endphp
                            <td class="font-w700 text-right">{{ $total }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <p class="text-muted text-center">Lista generada de forma automatica de acuerdo a los invitados registrados por el cliente</p>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
  
    </script>
@endsection
