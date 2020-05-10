@extends('layouts.backend')

@section('content')
<section class="content content-full">
    <messenger-component :user-id="{{ Auth::user()->id }}"/>
</section>
@endsection