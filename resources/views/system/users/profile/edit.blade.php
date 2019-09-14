@extends('layouts.backend')

@section('content')
<!-- Crear perfil de usuario-->
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
        <h2>crear perfil de {{ Auth::user()->name }}</h2>

        {!! Form::model($profile, ['route' => ['profile.update', $profile->id], 'method' => 'PUT', 'files' => 'true']) !!}
            
                                    @include('system.users.profile.partial.form')
                                {!! Form::close() !!}

        </div>
           
        
    </div>
</div>
<!-- end Crear perfil usuario -->

@endsection
