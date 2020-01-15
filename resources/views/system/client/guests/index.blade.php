@extends('layouts.client')

@section('content')
    <main id="main-container" style="min-height: 288px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <guests-component></guests-component>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script>
        jQuery(function(){ Codebase.helpers('table-tools'); });
    </script>
@endsection