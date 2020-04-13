@extends('layouts.client')

@section('content')
    <main id="main-container" style="min-height: 288px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <guests-component></guests-component>
                </div>
                <div class="col-md-12">
                    <div class="block">
                        <div class="block-content" style="margin: 0; padding: 10px 0 0 10px; text-align: center;">
                            <p>Sube tu lista desde Excel.</p>
                            <form action="{{ route('guests.import.excel') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="excel" id="">
                                <br>
                                <button type="submit" class="btn btn-rounded btn-outline-primary min-width-125 mb-10 mt-3">
                                    Subir
                                </button>
                            </form>
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