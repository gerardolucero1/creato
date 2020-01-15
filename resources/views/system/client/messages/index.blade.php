@extends('layouts.client')

@section('content')
<messenger-component :user-id="{{ auth()->id() }}"/>
@endsection