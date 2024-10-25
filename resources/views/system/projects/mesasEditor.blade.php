@extends('layouts.backend')

@section('styles')
    <style>
        .list-group-item a{
            color: black;
            font-size: 19px;
        }
    </style>
@endsection

@section('content')
    <tables-editor-component :project="{{ $project }}"></tables-editor-component>
@endsection

@section('scripts')
    <script>
        $(function() {
            Codebase.layout('header_style_glass');
        });
    </script>
@endsection
