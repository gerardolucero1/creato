@extends('layouts.backend')

@section('content')
    <div class="bg-image" style="background-image: url('{{ $project->banner }}');">
        <div class="bg-black-op-75">
            <div class="content content-top text-center">
                <div class="py-100">
                    <h1 class="font-w700 text-white mb-10">{{ $project->title }}</h1>
                    <h2 class="h4 font-w400 text-white-op">Explore the world and provide value at the same time.</h2>
                    <div class="font-size-md text-muted">
                        <a class="text-body-bg-dark" href="be_pages_generic_profile.php">{{ $project->user->name }}</a> • <span id="projectDate"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        @if (session('info'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('info') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    
        @if (count($errors))
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
        @endif

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Planos de la boda</h3>
                        <div class="block-options">
                            <button type="button" class="btn btn-circle btn-outline-primary mr-5 mb-5" data-toggle="modal" data-target="#agregarImagen">
                                <i class="fa fa-image"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        @if ($project->plans)
                            <img src="{{ $project->plans }}" width="100%">
                        @else
                            <img src="http://localhost:3000/images/creato.jpg" width="100%">                        
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="block">
                    <div class="block-header block-header-default block-header-rtl">
                        <h3 class="block-title">Title</h3>
                        <div class="block-options">
                            <button type="button" class="btn btn-sm btn-secondary">Edit</button>
                            <button type="button" class="btn btn-sm btn-secondary">Settings</button>
                        </div>
                    </div>
                    <div class="block-content">
                        <p>With Bootstrap buttons to the left..</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <companion-component></companion-component>
            </div>
        </div>
    </div>

    @include('system.projects.modals.image')
@endsection

@section('scripts')
    <script>
        $(function() {
            Codebase.layout('header_style_glass');
        });

        let date = "@php echo $project->date @endphp"

        let relativeDate = moment(date).format("MMM Do YY");

        console.log(relativeDate);

        document.getElementById('projectDate').innerHTML = relativeDate;

    </script>
@endsection