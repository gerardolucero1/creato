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


<!-- muestra del perfil de usuario -->

<div class="col-md-9">
            <div class="block">
                {{ $quotations->name }} <br>
                {{ $quotations->email}} <br>
                {{ $quotations->phone }}
             
            </div>
            <a href="dashboard/cotizaciones" class="btn btn-primary">Regresar</a>
            
        </div>

<!-- muestra del perfil usuario -->

@endsection
