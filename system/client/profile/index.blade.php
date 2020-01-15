@extends('layouts.client')

@section('content')
<client-profile-component :user-id="{{ auth()->id() }}"></client-profile-component>
@endsection