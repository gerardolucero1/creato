@extends('layouts.client')

@section('content')
{{-- <div class="bg-image bg-image-bottom" style="background-image: url('{{ Auth::user()->profile->banner }}');">
    <div class="bg-primary-dark-op py-30">
        <div class="content content-full text-center">
            <div class="mb-15">
                <a class="img-link" href="#">
                    <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{ Auth::user()->profile->photo }}" alt="">
                </a>
            </div>
            <h1 class="h3 text-white font-w700 mb-10">
              {{ Auth::user()->name }}
            </h1>
            <h2 class="h5 text-white-op">
              {{ Auth::user()->email }}
            </h2>
            <a class="btn btn-rounded btn-hero btn-sm btn-alt-secondary mb-5 px-20" href="{{ route('users.edit', Auth::user()->id) }}">
                <i class="fa fa-pencil"></i>
            </a>
        </div>
    </div>
</div> --}}
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <div class="block-content pb-4">
                            <div class="bg-image bg-image-bottom" style="background-image: url('{{ Auth::user()->profile->banner }}');">
                                <div class="bg-primary-dark-op py-30">
                                    <div class="content content-full text-center">
                                        <div class="mb-15">
                                            <a class="img-link" href="#">
                                                <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{ Auth::user()->profile->photo }}" alt="">
                                            </a>
                                        </div>
                                        <h1 class="h3 text-white font-w700 mb-10">
                                          {{ Auth::user()->name }}
                                        </h1>
                                        <h2 class="h5 text-white-op">
                                          {{ Auth::user()->email }}
                                        </h2>
                                        <a class="btn btn-rounded btn-hero btn-sm btn-alt-secondary mb-5 px-20" href="{{ route('users.edit', Auth::user()->id) }}">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="block">
                        <div class="block-content">
                            <div id="lightgallery" class="row items-push js-gallery img-fluid-100 js-gallery-enabled">
                                <a href="{{ Auth::user()->profile->banner }}">
                                    <img src="{{ Auth::user()->profile->banner }}" width="100%">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="block">
                <div class="block-content pb-4">
                    <client-profile-component :user-id="{{ auth()->id() }}"></client-profile-component>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
    <script>
        lightGallery(document.getElementById('lightgallery'));
    </script>
@endsection