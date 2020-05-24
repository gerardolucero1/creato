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
    <div class="bg-image" style="background-image: url('{{ $project->banner }}');">
        <div class="bg-black-op-75">
            <div class="content content-top text-center">
                <div class="py-100">
                    <h1 class="font-w700 text-white mb-10">{{ $project->title }}</h1>
                    <h2 class="h4 font-w400 text-white-op">Andábamos sin buscarnos, pero sabiendo que andábamos para encontrarnos.</h2>
                    <div class="font-size-md text-muted">
                        <a class="text-body-bg-dark" href="be_pages_generic_profile.php">{{ $project->user->name }}</a> • <span id="projectDate"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
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
    
        @if (count($errors))
            <div class="mt-4 alert alert-danger alert-dismissible fade show" role="alert">
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
            <div class="col-md-12">
                <div class="block">
                    <div class="block-header block-header-default">
                        <button type="button" class="btn btn-primary mr-5 mb-5" data-toggle="modal" data-target="#obtenerListaInvitados">
                            Obtener lista de invitados
                        </button>
                        <button type="button" class="btn btn-secondary mr-5 mb-5" data-toggle="modal" data-target="#seleccionarListaInvitados">
                            Seleccionar lista de invitados
                        </button>
                    </div>
                </div>
            </div>
        </div>

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
                            <img src="/images/creato.jpg" width="100%">                        
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <admin-list-component :project="{{ $project }}"></admin-list-component>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <companion-component :project="{{ $project }}"></companion-component>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    @if ($project->finished == 0 || is_null($project->finished))
                        <div class="block-header block-header-default">
                            <form action="{{ route('projects.destroy', $project->id ) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="type" value="1">
                                <button type="submit" class="btn btn-danger mr-5 mb-5">
                                    Finalizar proyecto
                                </button>
                            </form>
                        </div>
                    @else
                        <div class="block-header block-header-default">
                            <form action="{{ route('projects.destroy', $project->id ) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="type" value="0">
                                <button type="submit" class="btn btn-success mr-5 mb-5">
                                    Activar proyecto
                                </button>
                            </form>
                        </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>

    @include('system.projects.modals.image')
    @include('system.projects.modals.seated')
    @include('system.projects.modals.listGuests')
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

        $(function() {
        $('#file-input-image').change(function(e) {
            addImage(e); 
            });

            function addImage(e){
            var file = e.target.files[0],
            imageType = /image.*/;
        
            if (!file.type.match(imageType))
            return;
        
            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
            }
        
            function fileOnload(e) {
            var result=e.target.result;
            $('#imgSalida').attr("src",result);
            }
        });
    </script>
@endsection
