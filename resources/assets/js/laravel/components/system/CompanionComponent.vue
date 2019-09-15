<template>
    <section class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="block block-themed">
                    <div class="block-header bg-info">
                        <h3 class="block-title">Lista de invitados</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <i class="si si-wrench"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="block-content" v-if="lista.length != 0">
                            <h3 v-if="lista.guests.length == 0" class="text-center">Aun no tienes una lista de invitados</h3>
                            <div v-else class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <!-- TABLE ONE -->
                                        <div class="table-responsive">
                                            <table class="table table-striped table-vcenter">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="width: 100px;"><i class="si si-user"></i></th>
                                                        <th>Nombre</th>
                                                        <th style="width: 30%;">Apellidos</th>
                                                        <th style="width: 30%;">Email</th>
                                                        <th style="width: 15%;">Telefono</th>
                                                        <th style="width: 15%;">Estatus</th>
                                                        <th>Invitados</th>
                                                        <th class="text-center" style="width: 100px;">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="guest in lista.guests" :key="guest.index">
                                                        <td class="text-center">
                                                            <img v-if="guest.genere == 'FEMALE'" class="img-avatar img-avatar48" src="https://image.flaticon.com/icons/png/512/219/219961.png" alt="">
                                                            <img v-else class="img-avatar img-avatar48" src="https://image.flaticon.com/icons/png/512/219/219957.png" alt="">
                                                        </td>
                                                        <td class="font-w600">{{ guest.name }}</td>
                                                        <td class="font-w600">{{ guest.lastName }} {{ guest.secondLastName }}</td>
                                                        <td>{{ guest.email }}</td>
                                                        <td>{{ guest.phone }}</td>
                                                        <td>
                                                            <span class="badge badge-success">Confirmado</span>
                                                        </td>
                                                        <td>{{ guest.guests }}</td>
                                                        <td class="text-center">
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" data-original-title="Add" @click="asignarAcompanante(guest)">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal agregar acompañante -->
        <div class="modal fade show" id="agregarAcompanante" tabindex="-1" role="dialog" aria-labelledby="modal-slideleft" aria-modal="true">
            <div class="modal-dialog modal-dialog-slideleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-center">
                                Nuevo acompañante
                            </h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="form-material">
                                                <input type="text" class="form-control" name="name" placeholder="Ingresa el nombre" v-model="acompanante.name">
                                                <label for="material-text">Nombre</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="form-material">
                                                <input type="text" class="form-control" name="lastName" placeholder="Ingresa su apellido" v-model="acompanante.lastName">
                                                <label for="material-text">Apellido Paterno</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="form-material">
                                                <input type="text" class="form-control" name="secondLastName" placeholder="Ingresa su apellido" v-model="acompanante.secondLastName">
                                                <label for="material-text">Apellido Materno</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="form-material">
                                                <input type="email" class="form-control" name="email" placeholder="Ingresa su email" v-model="acompanante.email">
                                                <label for="material-text">Email</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="form-material">
                                                <input type="number" class="form-control" name="phone" placeholder="Ingresa su numero de telefono" v-model="acompanante.phone">
                                                <label for="material-text">Numero de Telefono</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="form-material">
                                                <select class="form-control" name="genere" v-model="acompanante.genere">
                                                    <option>...</option>
                                                    <option value="MALE">Hombre</option>
                                                    <option value="FEMALE">Mujer</option>
                                                </select>
                                                <label for="material-select">Sexo</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-alt-success" @click="agregarAcompanante()">
                            <i class="fa fa-check"></i> Agregar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        data(){
            return{
                user: '',
                lista: [],
                acompanante: {
                    'guest_id': '',
                    'name': '',
                    'lastName': '',
                    'secondLastName': '',
                    'email': '',
                    'phone': '',
                    'genere': '',
                },
                invitado: '',
                acompanantes: [],
            }
        },
        created(){
            this.obtenerCliente();
            this.obtenerAcompanantes();
        },
        methods: {
            obtenerCliente: function(){
                let path = window.location.pathname.split('/');
                let URL = '/proyecto/cliente/' + path[4];

                axios.get(URL).then((response) => {
                    this.user = response.data;
                    this.obtenerLista();
                }).catch((error) => {
                    console.log(error.data);
                })
            },

            obtenerLista: function(){
                let URL = '/api/lista/' + this.user.id;

                axios.get(URL).then((response) => {
                    this.lista = response.data;
                }).catch((error) => {
                    console.log(error.data);
                })
            },

            asignarAcompanante: function(guest){
                this.invitado = guest;
                $('#agregarAcompanante').modal('show');
            },

            obtenerAcompanantes: function(){
                let URL = '/api/lista/' + this.lista.id,

                axios.get(URL).then((response) => {
                    this.acompanantes = response.data;
                }).catch((error) => {
                    console.log(error.data)
                })
            },

            agregarAcompanante: function(){
                let URL = '/api/acompanante';

                this.acompanante.guest_id = this.invitado.id;

                axios.post(URL, this.acompanante).then((response) => {
                    Swal.fire(
                        'Buen trabajo!',
                        'Acompañante agregado',
                        'success'
                    );
                    $('#agregarAcompanante').modal('hide');
                    this.obtenerLista();
                }).catch((error) => {
                    console.log(error.data);
                })
            },
        }
    }
</script>

<style>

</style>
