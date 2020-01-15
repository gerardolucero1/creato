<!-- Modal agregar invitado -->
<div class="modal fade show" id="obtenerListaInvitados" tabindex="-1" role="dialog" aria-labelledby="modal-slideleft" aria-modal="true">
    <div class="modal-dialog modal-dialog-slideleft" role="document">
        <div class="modal-content">
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
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancelar</button>
                <a href="{{ route('projects.pdf', $project->id) }}" target="_blank" class="btn btn-alt-success">
                    <i class="fa fa-check"></i> Imprimir lista
                </a>
            </div>
        </div>
    </div>
</div>

