@extends('layouts.backend')

@section('content')
    <section class="main-container">
        <admin-task-component :list="{{ $listTask }}"></admin-task-component>
    </section>
@endsection