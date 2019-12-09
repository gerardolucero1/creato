@section('styles')
    <style>
        input[type=”file”] #file-input {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        label[for="file-input"] {
            font-size: 14px;
            font-weight: 600;
            color: #fff;
            background-color: #106BA0;
            display: inline-block;
            transition: all .5s;
            cursor: pointer;
            padding: 15px 40px !important;
            text-transform: uppercase;
            width: fit-content;
            text-align: center;
        }
    </style>
@endsection

<!-- Modal agregar invitado -->
<div class="modal fade show" id="agregarImagen" tabindex="-1" role="dialog" aria-labelledby="modal-slideleft" aria-modal="true">
    <div class="modal-dialog modal-dialog-slideleft" role="document">
        <div class="modal-content">
            <form action="{{ route('projects.plans', $project->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title text-center">
                            Agregar planos
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="form-material">
                                            <input type="file" name="plans" id="file-input">
                                            <label for="file-input">
                                                <i class="fa fa-upload"></i> <span id="name-file">Planos de boda</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <img id="imgSalida" width="100%" src="" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-alt-success">
                        <i class="fa fa-check"></i> Agregar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

