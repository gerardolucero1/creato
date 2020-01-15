<template>
    <section class="content" v-if="bloque.length != 0">
        <div class="row">
            <div class="col-md-12">
                <div class="block block-rounded">
                    <button type="button" class="btn btn-square btn-secondary mr-5 mb-5" onClick="history.back()">
                        <i class="fa fa-arrow-circle-left mr-5"></i>Regresar
                    </button>
                    <div class="block-content bg-pattern">
                        <div class="py-20 text-center">
                            <h1 class="h3 mb-5">{{ bloque.name }}</h1>
                            <p class="mb-10 text-muted">
                                <em>{{ bloque.created_at | formatoFecha }}</em>
                            </p>
                            <p>
                                Bloque asignado a: {{ bloque.user.name }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Lista de tareas actuales</h3>
                        <div class="block-options">
                            <div class="block-options-item">
                                <button type="button" class="btn btn-sm btn-alt-primary mr-5 mb-5" @click="agregarLista()">
                                    <i class="fa fa-plus mr-5"></i>Agregar Lista
                                </button>
                            </div>
                        </div>
                    </div>
                    <div v-if="listas.length != 0" class="block-content">
                        <table class="table table-striped table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 50px;">#</th>
                                    <th>Nombre</th>
                                    <th>Categoria</th>
                                    <th># Tareas</th>
                                    <th class="d-none d-sm-table-cell" style="width: 15%;">Estado</th>
                                    <th class="text-center" style="width: 100px;">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="lista in listas" :key="lista.index">
                                    <th class="text-center" scope="row">{{ lista.id }}</th>
                                    <td>{{ lista.name }}</td>
                                    <td>{{ lista.slug }}</td>
                                    <td>{{ lista.tasks.length }}</td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="badge badge-info">Completada</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit" @click="iniciaEdicionLista(lista)">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            <a :href="'tarea/' + lista.id" type="button" class="btn btn-sm btn-secondary js-tooltip-enabled">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete" @click="eliminarLista(lista)">
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

        <!-- Modal agregar lista -->
        <div class="modal fade show" id="agregarLista" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-slideleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-center">
                                Nueva Lista
                            </h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <input v-model="lista.name" type="text" class="form-control" name="material-text" placeholder="">
                                        <label for="material-text">Nombre</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <select v-model="lista.slug" class="form-control" id="lista">
                                            <option value="">Elige una categoria</option>
                                            <option value="Planificacion">Planificacion</option>
                                            <option value="Tramites Matrimonio">Tramites Matrimonio</option>
                                            <option value="Ceremonia">Ceremonia</option>
                                            <option value="Salon y Catering">Salon y Catering</option>
                                            <option value="Musica">Musica</option>
                                            <option value="Recuerdos de Boda">Recuerdos de Boda</option>
                                            <option value="Flores y Decoracion">Flores y Decoracion</option>
                                            <option value="Fotografia y Video">Fotografia y Video</option>
                                            <option value="Transportes">Transportes</option>
                                            <option value="Joyeria">Joyeria</option>
                                            <option value="Novia y Complementos">Novia y Complementos</option>
                                            <option value="Novio y Accesorios">Novio y Accesorios</option>
                                            <option value="Belleza y Salud">Belleza y Salud</option>
                                            <option value="Luna de Miel">Luna de Miel</option>
                                            <option value="Mesa de Regalos">Mesa de Regalos</option>
                                            <option value="Otro">Otro</option>
                                        </select>
                                        <label for="material-text">Categoria</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" @click="guardarLista()" >Save changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> 

        <!-- Modal editar lista -->
        <div class="modal fade show" id="editarLista" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-slideleft" role="document">
                <div class="modal-content">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title text-center">
                            Editar Lista
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="form-material">
                                    <input v-model="actualizarLista.name" type="text" class="form-control" name="material-text" placeholder="">
                                    <label for="material-text">Nombre</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-material">
                                    <select v-model="actualizarLista.slug" class="form-control" id="lista">
                                        <option value="">Elige una categoria</option>
                                        <option value="Planificacion">Planificacion</option>
                                        <option value="Tramites Matrimonio">Tramites Matrimonio</option>
                                        <option value="Ceremonia">Ceremonia</option>
                                        <option value="Salon y Catering">Salon y Catering</option>
                                        <option value="Musica">Musica</option>
                                        <option value="Recuerdos de Boda">Recuerdos de Boda</option>
                                        <option value="Flores y Decoracion">Flores y Decoracion</option>
                                        <option value="Fotografia y Video">Fotografia y Video</option>
                                        <option value="Transportes">Transportes</option>
                                        <option value="Joyeria">Joyeria</option>
                                        <option value="Novia y Complementos">Novia y Complementos</option>
                                        <option value="Novio y Accesorios">Novio y Accesorios</option>
                                        <option value="Belleza y Salud">Belleza y Salud</option>
                                        <option value="Luna de Miel">Luna de Miel</option>
                                        <option value="Mesa de Regalos">Mesa de Regalos</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                    <label for="material-text">Categoria</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click="editarLista(actualizarLista)" >Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            /* Objetos para obtener los datos */
                lista:{
                    'name': '',
                    'slug': '',
                    'blockList_id': '',
                },

                actualizarLista:{
                    'name': '',
                    'slug': '',
                    'blockList_id': '',
                },

                bloque: '',

            /* Arreglo vacio para almacenar los datos a mostrar */    
                listas:[],
  
            }
        },

        created(){
            this.obtenerBloque()
            this.obtenerListas()
        },

        filters: {
            formatoFecha: function(data){
                return moment(data).format('LL')
            }
        },

        methods: {
            obtenerBloque: function(){
                let path = window.location.pathname.split('/');
                let URL = '/dashboard/obtener-bloque/'+ path[3];

                axios.get(URL).then((response) => {
                    this.bloque = response.data
                }).catch((error) => {
                    console.log(error.data)
                })
            },
    /* C-rear listas */
            agregarLista: function(){
                    $('#agregarLista').modal('show');
               
            },

            guardarLista: function(){
                this.lista.blockList_id = this.bloque.id
                let URL = 'store';

                axios.post(URL, 
                    this.lista
                ).then((response) => {
                    $('#agregarLista').modal('hide');
                    this.obtenerListas();
                    })

            },

    /* R-Obtener datos */   

            obtenerListas: function(){
                let path = window.location.pathname.split('/');
                let URL = '/dashboard/list/get/'+ path[3];
                axios.get(URL).then((response)=>{
                    this.listas = response.data;
                    console.log(this.listas);
                }).catch((error)=>{
                    console.log(error.data);
                });
                
            },
    /* U-Actualizar datos*/

            editarLista: function(actualizarLista){
                let URL = '/dashboard/list/update/'+ actualizarLista.id;
                axios.put(URL,this.actualizarLista).then((response)=>{
                     $('#editarLista').modal('hide');
                })
                
            }, 

            iniciaEdicionLista: function(lista){
                this.actualizarLista = lista;
                    $('#editarLista').modal('show');
            },



    /* D-Eliminar datos */
        eliminarLista: function(lista){
                let URL = 'delete/' + lista.id;
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'You wont be able to revert this!',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.value) {
                                axios.delete(URL).then((response) => {
                                    this.obtenerListas();
                                });
                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                            }
                        });       
            },  
        }

    };
</script>

<style>

</style>
