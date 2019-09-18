@extends('layouts.client')

@section('content')
    <tables-component :invitados="{{ $guests }}"></tables-component>
@endsection