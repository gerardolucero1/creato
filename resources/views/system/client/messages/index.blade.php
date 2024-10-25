@extends('layouts.client')

@section('content')
<section class="content">
    <messenger-component :user-id="{{ auth()->id() }}"/>
<section>
@endsection