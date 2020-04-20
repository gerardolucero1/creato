@extends('layouts.backend')

@section('content')
<messenger-component :user-id="{{ Auth::user()->id }}"/>
@endsection