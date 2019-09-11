@extends('layouts.backend')

@section('content')
<!-- perfil de usuario-->
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
        <h2>Perfil</h2>
        {{ Auth::user()->name }}
  </div>
                   
        </form>
        </div>
    </div>
</div>
<!-- end perfil usuario -->

@endsection
