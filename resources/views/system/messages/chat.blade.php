@extends('layouts.backend')

@section('content')
<messenger-component :user-id="{{ auth()->id() }}"/>
@endsection