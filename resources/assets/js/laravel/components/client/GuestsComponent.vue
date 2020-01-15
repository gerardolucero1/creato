<template>
    <section class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="block">
                    <div class="block-content" style="margin: 0; padding: 10px 0 0 10px;">
                        <button type="button" class="btn btn-rounded btn-outline-primary min-width-125 mb-10" data-toggle="modal" data-target="#agregarInvitado">
                            <i class="fa fa-plus mr-5"></i>Invitado
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-12">
                <div class="block block-themed block-rounded">
                    <div class="block-header bg-info">
                        <h3 class="block-title">Lista de invitados</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <i class="si si-plus"></i>
                            </button>
                        </div>
                    </div>
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
                                                        <span v-if="guest.status == 'CONFIRMADO'" class="badge badge-success">Confirmado</span>
                                                        <span v-if="guest.status == 'PENDIENTE'" class="badge badge-warning">Pendiente</span>
                                                        <span v-if="guest.status == 'CANCELADO'" class="badge badge-danger">Cancelado</span>
                                                    </td>
                                                    <td>{{ guest.guests }}</td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit" @click="iniciarEdicion(guest)">
                                                                <i class="fa fa-pencil"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete" @click="eliminarInvitado(guest)">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" data-original-title="Add">
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

        <!-- Modal agregar invitado -->
        <div class="modal fade show" id="agregarInvitado" tabindex="-1" role="dialog" aria-labelledby="modal-slideleft" aria-modal="true">
            <div class="modal-dialog modal-dialog-slideleft modal-xl" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-center">
                                Lista de Inivitados
                            </h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="row">
                                <div class="col-md-3 text-center">
                                    <label for="">Numero de Invitados</label><br>
                                    <input type="text" v-model="numeroInvitados" style="width: 100%;"><br>
                                    <button class="btn btn-sm btn-info btn-block mt-2" @click="anadirNumeroInvitados()">Añadir numero de invitados</button>
                                </div>
                            </div>
                            
                            <div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-vcenter">
                                                    <thead>
                                                        <tr>
                                                            <th>Nombre</th>
                                                            <th>Apellido Paterno</th>
                                                            <th>Apellido Materno</th>
                                                            <th>Email</th>
                                                            <th>Telefono</th>
                                                            <th>Invitados</th>
                                                            <th>Genero</th>
                                                            <th>Origen</th>
                                                            <th class="text-center" style="width: 100px;">Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="(item, index) in guests" :key="index">
                                                            <td>
                                                                <input type="text" v-model="item.name" style="width: 100%;">
                                                            </td>
                                                            <td>
                                                                <input type="text" v-model="item.lastName" style="width: 100%;">
                                                            </td>
                                                            <td>
                                                                <input type="text" v-model="item.secondLastName" style="width: 100%;">
                                                            </td>
                                                            <td>
                                                                <input type="text" v-model="item.email" style="width: 100%;">
                                                            </td>
                                                            <td>
                                                                <input type="text" v-model="item.phone" style="width: 100%;">
                                                            </td>
                                                            <td>
                                                                <input type="number" v-model="item.guests" style="width: 100%;">
                                                            </td>
                                                            <td>
                                                                <select name="" id="" v-model="item.genere" style="width: 110%;">
                                                                    <option value="MALE">Hombre</option>
                                                                    <option value="FEMALE">Mujer</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select name="" id="" v-model="item.origin" style="width: 110%;">
                                                                    <option value="NOVIA">Novia</option>
                                                                    <option value="NOVIO">Novio</option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete" @click="eliminarInvitadoArray(index)">
                                                                        <i class="fa fa-times"></i>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-alt-success" @click="agregarInvitados()">
                            <i class="fa fa-check"></i> Agregar
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal editar invitado -->
        <div class="modal fade show" id="editarInvitado" tabindex="-1" role="dialog" aria-labelledby="modal-slideleft" aria-modal="true">
            <div class="modal-dialog modal-dialog-slideleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-center">
                                Nuevo invitado
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
                                                <input type="text" class="form-control" name="name" placeholder="Ingresa el nombre" v-model="invitadoEdicion.name">
                                                <label for="material-text">Nombre</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="form-material">
                                                <input type="text" class="form-control" name="lastName" placeholder="Ingresa su apellido" v-model="invitadoEdicion.lastName">
                                                <label for="material-text">Apellido Paterno</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="form-material">
                                                <input type="text" class="form-control" name="secondLastName" placeholder="Ingresa su apellido" v-model="invitadoEdicion.secondLastName">
                                                <label for="material-text">Apellido Materno</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="form-material">
                                                <input type="email" class="form-control" name="email" placeholder="Ingresa su email" v-model="invitadoEdicion.email">
                                                <label for="material-text">Email</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="form-material">
                                                <input type="number" class="form-control" name="phone" placeholder="Ingresa su numero de telefono" v-model="invitadoEdicion.phone">
                                                <label for="material-text">Numero de Telefono</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="form-material">
                                                <select class="form-control" name="genere" v-model="invitadoEdicion.genere">
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
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="form-material">
                                                <input type="number" class="form-control" name="guests" placeholder="Numero de invitados" v-model="invitadoEdicion.guests">
                                                <label for="material-text">Numero de Invitados</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <select class="form-control" name="status" v-model="invitadoEdicion.status">
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
                        <button type="button" class="btn btn-alt-success" @click="actualizarInvitado()">
                            <i class="fa fa-pencil"></i> Actualizar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import auth from "../../mixins/auth";

export default {
    data(){
        return{
            guest: {
                name: '',
                lastName: '',
                secondLastName: '',
                genere: '',
                email: '',
                phone: '',
                guests: '',
                dataX: 0,
                dataY: 0,
                seated: false,
                status: 'PENDIENTE',
                origin: 'NOVIA',
                guestList_id: '',

            },
            guests: [],
            numeroInvitados: '',
            lista: [],
            invitadoEdicion: '',
        }
    },

    mixins: [
        auth
    ],

    created(){
        this.obtenerLista();
    },

    methods: {
        obtenerLista: function(){
            let URL = '/cliente/lista/' + this.user.id;

            axios.get(URL).then((response) => {
                this.lista = response.data;
                console.log('Esta es lista: ', this.lista);
            }).catch((error) => {
                console.log(error.data);
            })
        },

        anadirNumeroInvitados: function(){
            let control = 0;
            while(control < this.numeroInvitados){
                let guest = JSON.parse( JSON.stringify(this.guest) );
                this.guests.push(guest);
                control++;
            }

            this.numeroInvitados = '';
        },

        eliminarInvitadoArray: function(index){
            this.guests.splice(index, 1);
        },

        agregarInvitados: function(){
            let URL = '/cliente/lista';

            this.guests.forEach((element) => {
                element.guestList_id = this.lista.id;
            });

            axios.post(URL, this.guests).then((response) => {
                Swal.fire(
                    'Buen trabajo',
                    'La lista ha sido actualizada',
                    'success'
                );

                $('#agregarInvitado').modal('hide');
                this.guests = [];
                this.obtenerLista();
            }).catch((error) => {
                console.log(error.data);
            })
        },

        iniciarEdicion: function(guest){
            this.invitadoEdicion = guest;
            $('#editarInvitado').modal('show');
        },

        actualizarInvitado: function(){
            let URL = '/cliente/lista/' + this.invitadoEdicion.id;

            axios.put(URL, this.invitadoEdicion).then((response) => {
                Swal.fire(
                    'Buen trabajo!',
                    'Invitado actualizado',
                    'success'
                );
                $('#editarInvitado').modal('hide');
                this.invitadoEdicion = '';
                this.obtenerLista();
            }).catch((error) => {
                console.log(error.data);
            })
        },

        eliminarInvitado: function(guest){
            let URL = '/cliente/lista/' + guest.id;

            Swal.fire({
                title: '¿Quieres eliminar a ' + guest.name + '?',
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
                            'Invitado eliminado',
                            'success'
                        );
                        this.obtenerLista();
                    }).catch((error) => {
                        console.log(error.data);
                    });
                }
            });
        },
    }
}
</script>

<style>

</style>