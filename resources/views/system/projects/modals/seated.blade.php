<!-- Modal agregar invitado -->
<div class="modal fade show" id="obtenerListaInvitados" tabindex="-1" role="dialog" aria-labelledby="modal-slideleft" aria-modal="true">
    <div class="modal-dialog modal-dialog-slideleft" role="document">
        <div class="modal-content">
            {!! Form::open(['route' => 'projects.pdf', 'target' => '_blank']) !!}
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title text-center">
                        Lista de invitados
                    </h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    @php
                        $guests = [];
                        foreach($project->list->guests as $guest){
                            if($guest->status == 'CONFIRMADO'){
                                if($guest->seated == true && $guest->tableName == null || $guest->seated == false){
                                    array_push($guests, $guest);
                                }
                            }
                            foreach ($guest->companions as $companion) {
                                if($companion->status == 'CONFIRMADO'){
                                    if($companion->seated == true && $companion->tableName == null || $companion->seated == false){
                                        array_push($guests, $companion);
                                    }
                                }
                            }
                        }
                    @endphp
                    @if(count($guests) != 0)
                        <p>Estos invitados se encuentran confirmados pero no han sido asignados a una mesa.</p>

                        <table class="table table-bordered table-vcenter">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th class="d-none d-sm-table-cell" style="width: 15%;">Telefono</th>
                                    <th class="text-center" style="width: 100px;">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($guests as $guest)
                                    <tr>
                                        <td>{{ $guest->name }} {{ $guest->lastName }} {{ $guest->secondLastName }}</td>
                                        <td class="d-none d-sm-table-cell">
                                            {{ $guest->phone }}
                                        </td>
                                        <td class="text-center">
                                            {{ $guest->email }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Todos los invitados confirmados se encuentran sentados y con una mesa asignada</p>
                    @endif

                    <div class="row">
                        <div class="col-12">
                            <p>Selecciona las opciones que quieras imprimir en el PDF.</p>
                            <input type="checkbox" name="options[]" value="name" id="name">
                            <label for="name">Nombre</label>
                            <br>
                            <input type="checkbox" name="options[]" value="email" id="email">
                            <label for="email">Email</label>
                            <br>
                            <input type="checkbox" name="options[]" value="telephone" id="telephone">
                            <label for="telephone">Telefono</label>
                            <br>
                            <input type="checkbox" name="options[]" value="table" id="table">
                            <label for="table">Mesa</label>
                            <br>
                            <input type="checkbox" name="options[]" value="origin" id="origin">
                            <label for="origin">Parte de...</label>
                            <br>
                            <input type="checkbox" name="options[]" value="genere" id="genere">
                            <label for="genere">Sexo</label>
                            <br>
                            <input type="checkbox" name="options[]" value="check" id="check">
                            <label for="check">Checked</label>

                            <input type="hidden" value="{{ $project->id }}" name="project_id">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" target="_blank" class="btn btn-alt-success">
                    <i class="fa fa-check"></i> Imprimir lista
                </button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

