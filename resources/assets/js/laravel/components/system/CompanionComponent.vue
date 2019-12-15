<template>
    <section class=" mt-4">
        <div class="block block-themed">
            <div class="block-header bg-info">
                <h3 class="block-title">Lista de invitados</h3>
                <div class="block-options">
                    <a :href="'/dashboard/proyectos/resumen/' + project.id" class="btn btn-success">
                        <i class="fa fa-print"></i>
                    </a>
                </div>
            </div>
            <div class="block-content">
                <div class="block-content" v-if="invitados.length != 0">
                    <h3 v-if="lista.guests.length == 0" class="text-center">Aun no tienes una lista de invitados</h3>
                    <div v-else class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <!-- TABLE ONE -->
                                <div class="row">
                                    <div class="col-md-1 text-center">
                                        <i class="si si-user"></i>
                                    </div>
                                    <div class="col-md-2 text-center font-weight-bold">
                                        <p>Nombre</p>
                                    </div>
                                    <div class="col-md-2 text-center font-weight-bold">
                                        <p>Apellidos</p>
                                    </div>
                                    <div class="col-md-2 text-center font-weight-bold">
                                        <p>Email</p>
                                    </div>
                                    <div class="col-md-2 text-center font-weight-bold">
                                        <p>Numero</p>
                                    </div>
                                    <div class="col-md-1 text-center font-weight-bold">
                                        <p>Acomp...</p>
                                    </div>
                                    <div class="col-md-1 text-center font-weight-bold">
                                        <p>Estatus</p>
                                    </div>
                                    <div class="col-md-1 text-center font-weight-bold">
                                        <p>Acciones</p>
                                    </div>
                                </div>
                                <div class="accordion" id="accordionExample">
                                    <div class="card mt-2" v-for="(guest, index) in invitados" :key="index">
                                        <div class="row">
                                            <div class="col-md-1 text-center">
                                                <img v-if="guest.genere == 'FEMALE'" class="img-avatar img-avatar48" src="https://image.flaticon.com/icons/png/512/219/219961.png" alt="">
                                                <img v-else class="img-avatar img-avatar48" src="https://image.flaticon.com/icons/png/512/219/219957.png" alt="">
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <p>{{ guest.name }}</p>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <p>{{ guest.lastName }} {{ guest.secondLastName }}</p>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <p>{{ guest.email }}</p>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <p>{{ guest.phone }}</p>
                                            </div>
                                            <div class="col-md-1 text-center">
                                                <p>{{ guest.companions.length }}/{{ guest.guests }}</p>
                                            </div>
                                            <div class="col-md-1 text-center estatus" @click="editarEstatus(guest)">
                                                <span v-if="guest.status == 'CONFIRMADO'" class="badge badge-success">Confirmado</span>
                                                <span v-if="guest.status == 'PENDIENTE'" class="badge badge-warning">Pendiente</span>
                                                <span v-if="guest.status == 'CANCELADO'" class="badge badge-danger">Cancelado</span>
                                            </div>
                                            <div class="col-md-1 text-center">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" @click="asignarAcompanante(guest)">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="collapse" :data-target="'#companions' + guest.id" aria-expanded="false" :aria-controls="'companions' + guest.id">
                                                            <i class="fa fa-eye"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div :id="'companions' + guest.id" class="collapse container bg-gray" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="row" v-for="(companion, index) in guest.companions" :key="index">
                                                    <div class="col-md-1 text-center">
                                                        <img v-if="companion.genere == 'FEMALE'" class="img-avatar img-avatar48" src="https://image.flaticon.com/icons/png/512/219/219961.png" alt="">
                                                        <img v-else class="img-avatar img-avatar48" src="https://image.flaticon.com/icons/png/512/219/219957.png" alt="">
                                                    </div>
                                                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                        <p>{{ companion.name }}</p>
                                                    </div>
                                                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                        <p>{{ companion.lastName }} {{ companion.secondLastName }}</p>
                                                    </div>
                                                    <div class="col-md-3 text-center d-flex justify-content-center align-items-center">
                                                        <p>{{ companion.email }}</p>
                                                    </div>
                                                    <div class="col-md-1 text-center d-flex justify-content-center align-items-center">
                                                        <p>{{ companion.phone }}</p>
                                                    </div>
                                                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center estatus" @click="editarEstatusAcompanante(companion)">
                                                        <span v-if="companion.status == 'CONFIRMADO'" class="badge badge-success">Confirmado</span>
                                                        <span v-if="companion.status == 'PENDIENTE'" class="badge badge-warning">Pendiente</span>
                                                        <span v-if="companion.status == 'CANCELADO'" class="badge badge-danger">Cancelado</span>
                                                    </div>
                                                    <div class="col-md-1 text-center">
                                                        <div class="row">
                                                            <div class="col-md-12 mt-2 d-flex">
                                                                <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" @click="iniciarEdicion(companion)">
                                                                    <i class="fa fa-pencil"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" @click="eliminarAcompanante(companion)">
                                                                    <i class="fa fa-times"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <select class="form-control" name="status" v-model="acompanante.status">
                                            <option value="CONFIRMADO">Confirmado</option>
                                            <option value="PENDIENTE">Pendiente</option>
                                            <option value="CANCELADO">Cancelado</option>
                                        </select>
                                        <label for="material-select">Please Select</label>
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

        <!-- Modal editar acompañante -->
        <div class="modal fade show" id="editarAcompanante" tabindex="-1" role="dialog" aria-labelledby="modal-slideleft" aria-modal="true">
            <div class="modal-dialog modal-dialog-slideleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-center">
                                Editar acompañante
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
                                                <input type="text" class="form-control" name="name" placeholder="Ingresa el nombre" v-model="acompananteEdicion.name">
                                                <label for="material-text">Nombre</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="form-material">
                                                <input type="text" class="form-control" name="lastName" placeholder="Ingresa su apellido" v-model="acompananteEdicion.lastName">
                                                <label for="material-text">Apellido Paterno</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="form-material">
                                                <input type="text" class="form-control" name="secondLastName" placeholder="Ingresa su apellido" v-model="acompananteEdicion.secondLastName">
                                                <label for="material-text">Apellido Materno</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="form-material">
                                                <input type="email" class="form-control" name="email" placeholder="Ingresa su email" v-model="acompananteEdicion.email">
                                                <label for="material-text">Email</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="form-material">
                                                <input type="number" class="form-control" name="phone" placeholder="Ingresa su numero de telefono" v-model="acompananteEdicion.phone">
                                                <label for="material-text">Numero de Telefono</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="form-material">
                                                <select class="form-control" name="genere" v-model="acompananteEdicion.genere">
                                                    <option>...</option>
                                                    <option value="MALE">Hombre</option>
                                                    <option value="FEMALE">Mujer</option>
                                                </select>
                                                <label for="material-select">Sexo</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <select class="form-control" name="status" v-model="acompananteEdicion.status">
                                            <option value="CONFIRMADO">Confirmado</option>
                                            <option value="PENDIENTE">Pendiente</option>
                                            <option value="CANCELADO">Cancelado</option>
                                        </select>
                                        <label for="material-select">Please Select</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-alt-success" @click="actualizarAcompanante()">
                            <i class="fa fa-check"></i> Editar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        props: {
            project: Object,
        },
        data(){
            return{
                user: '',
                lista: [],
                invitados: '',
                acompanante: {
                    'guest_id': '',
                    'name': '',
                    'lastName': '',
                    'secondLastName': '',
                    'email': '',
                    'phone': '',
                    'genere': '',
                    'status': 'CONFIRMADO',
                },
                invitado: '',
                acompanantes: [],
                acompananteEdicion: '',
            }
        },
        created(){
            this.obtenerCliente();
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

            iniciarEdicion: function(companion){
                this.acompananteEdicion = companion;
                $('#editarAcompanante').modal('show');
            },

            actualizarAcompanante: function(){
                let URL = '/cliente/acompanante/' + this.acompananteEdicion.id;

                axios.put(URL, this.acompananteEdicion).then((response) => {
                    Swal.fire(
                        'Buen trabajo!',
                        'Acompañante actualizado',
                        'success'
                    );
                    $('#editarAcompanante').modal('hide');
                    this.obtenerLista();
                }).catch((error) => {
                    console.log(error.data);
                })
            },

            eliminarAcompanante: function(companion){
                let URL = '/cliente/acompanante/' + companion.id;

                Swal.fire({
                    title: '¿Quieres eliminar a ' + companion.name + '?',
                    text: "No podras revertir esta accion",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, ¡eliminalo!',
                    cancelButtonText: '¡No lo elimines!'
                    }).then((result) => {
                    if (result.value) {
                        axios.delete(URL).then((response) => {
                            Swal.fire(
                                'Buen trabajo!',
                                'Acompañante eliminado',
                                'success'
                            );
                            this.obtenerLista();
                        }).catch((error) => {
                            console.log(error.data);
                        });
                    }
                });
            },

            editarEstatus: function(guest){
                let URL = '/actualizar-estatus-invitado/' + guest.id;

                if(guest.status == 'CONFIRMADO'){
                    axios.put(URL, {
                        'status': 'CANCELADO',
                    }).then((response) => {
                        console.log('Estatus actualizado');
                        this.obtenerLista();
                    });
                }else if(guest.status == 'CANCELADO'){
                    axios.put(URL, {
                        'status': 'PENDIENTE',
                    }).then((response) => {
                        console.log('Estatus actualizado');
                        this.obtenerLista();
                    });
                }else{
                    axios.put(URL, {
                        'status': 'CONFIRMADO',
                    }).then((response) => {
                        console.log('Estatus actualizado');
                        this.obtenerLista();
                    });
                }
            },

            editarEstatusAcompanante: function(companion){
                let URL = '/actualizar-estatus-acompanante/' + companion.id;

                if(companion.status == 'CONFIRMADO'){
                    axios.put(URL, {
                        'status': 'CANCELADO',
                    }).then((response) => {
                        console.log('Estatus actualizado');
                        this.obtenerLista();
                    });
                }else if(companion.status == 'CANCELADO'){
                    axios.put(URL, {
                        'status': 'PENDIENTE',
                    }).then((response) => {
                        console.log('Estatus actualizado');
                        this.obtenerLista();
                    });
                }else{
                    axios.put(URL, {
                        'status': 'CONFIRMADO',
                    }).then((response) => {
                        console.log('Estatus actualizado');
                        this.obtenerLista();
                    });
                }
            },

            obtenerLista: function(){
                let URL = '/cliente/lista/' + this.user.id;

                axios.get(URL).then((response) => {
                    this.lista = response.data;
                    this.obtenerAcompanantes();
                }).catch((error) => {
                    console.log(error.data);
                })
            },

            asignarAcompanante: function(guest){
                this.invitado = guest;
                $('#agregarAcompanante').modal('show');
            },

            obtenerAcompanantes: function(){
                let URL = '/lista/acompanantes/' + this.lista.id;

                axios.get(URL).then((response) => {
                    this.invitados = response.data;
                    console.log('Estos son los invitados: ', this.invitados);
                }).catch((error) => {
                    console.log(error.data)
                })
            },

            agregarAcompanante: function(){
                let URL = '/cliente/acompanante';

                this.acompanante.guest_id = this.invitado.id;

                if(this.invitado.companions.length == this.invitado.guests){
                    Swal.fire(
                        'Error!',
                        'El invitado ya alcanzo el maximo de acompañantes permitidos',
                        'error'
                    );
                }else{

                    axios.post(URL, this.acompanante).then((response) => {
                        Swal.fire(
                            'Buen trabajo!',
                            'Acompañante agregado',
                            'success'
                        );
                        $('#agregarAcompanante').modal('hide');
                        this.obtenerAcompanantes();
                    }).catch((error) => {
                        console.log(error.data);
                    })
                }
            },
        }
    }
</script>

<style>
    .estatus{
        cursor: pointer;
    }
</style>
