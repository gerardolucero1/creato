<!-- Modal agregar invitado -->
<div class="modal fade show" id="seleccionarListaInvitados" tabindex="-1" role="dialog" aria-labelledby="modal-slideleft" aria-modal="true">
    <div class="modal-dialog modal-dialog-slideleft" role="document">
        <div class="modal-content">
            {!! Form::open(['route' => 'projects.copyList']) !!}
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title text-center">
                            Listas de invitados
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <p>Estos son los usuarios registrados hasta el momento, puedes seleccionar cualquiera y su lista de invitados se copiara de inmediato al proyecto actual.</p>
                    <div class="form-group row">
                            <div class="col-md-12">
                                <div class="">
                                    {{ Form::label('client_id', 'Cliente') }}
                                    {{ Form::select('client_id', $users, null, ['class' => 'form-control', 'form-control-lg']) }}
                                
                                    <input type="hidden" value="{{ $project->id }}" name="project_id">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-alt-success">
                        <i class="fa fa-check"></i> Copiar lista
                    </button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

