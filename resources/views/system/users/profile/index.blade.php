@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
        
<!-- si el usuario tiene perfil-->
@if (is_null(Auth::user()->profile))

        <h2>El usuario {{ Auth::user()->name }} no tiene un perfil, desea crear uno?</h2>
       <a href="{{ route('profile.create') }}" class="btn btn-primary">Crear</a>

<!-- termina -->
<!-- perfil de usuario-->
@else



           <h2>el usuario {{ Auth::user()->name }} tiene perfil</h2>

               
                {{ Auth::user()->profile->last_name }} <br>
                {{ Auth::user()->profile->phone }}

                <a href="{{ route('profile.edit', Auth::user()->profile->id) }}" class="btn btn-primary" >mco</a>
       
  </div>
                   
        
    </div>
</div>
@endif
<!-- end perfil usuario -->

@endsection
