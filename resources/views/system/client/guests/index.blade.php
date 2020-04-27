@extends('layouts.client')

@section('content')
    <main id="main-container" style="min-height: 288px;">
        <div class="container">
            @if (session('info'))
                <div class="mt-4 alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('info') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session('error'))
                <div class="mt-4 alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            {{-- @if (count($errors))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif --}}

            <div class="row">
                <div class="col-md-12">
                    <guests-component></guests-component>
                </div>
                <div class="col-md-12">
                    <div class="block">
                        <div class="block-content" style="margin: 0; padding: 10px 0 0 10px; text-align: center;">
                            <h5>Sube tu lista desde Excel.</h5>
                            <form action="{{ route('guests.import.excel') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="excel" id="">
                                <br>
                                <button type="submit" class="btn btn-rounded btn-outline-primary min-width-125 mb-10 mt-3">
                                    Subir
                                </button>
                            </form>
                            <a href="/documents/lista-demo.xlsx" download>Descargar lista demo</a>
                        </div>
                    </div>
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