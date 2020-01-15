<style>

</style>

<template>
   <section class="content">
        <div class="row" v-if="lista.length != 0">
            <div class="col-md-12">
                <div class="block block-rounded">
                    <button type="button" class="btn btn-square btn-secondary mr-5 mb-5" onClick="history.back()">
                        <i class="fa fa-arrow-circle-left mr-5"></i>Regresar
                    </button>
                    <div class="block-content bg-pattern">
                        <div class="py-20 text-center">
                            <h1 class="h3 mb-5">{{ lista.name }}</h1>
                            <p class="mb-10 text-muted">
                                <em>{{ lista.created_at | formatoFecha }}</em>
                            </p>
                            <p>
                                Lista asignado a: {{ lista.block_list.name }}
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
                                <button type="button" class="btn btn-sm btn-alt-primary mr-5 mb-5" @click="agregarTarea()">
                                    <i class="fa fa-plus mr-5"></i>Agregar tarea
                                </button>
                            </div>
                        </div>
                    </div>
                    <div v-if="tareas.length != 0" class="block-content">
                        <table class="table table-striped table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 50px;">#</th>
                                    <th style="width: 100px;">Nombre</th>
                                    <th>Categoria</th>
                                    <th>Descripcion</th>
                                    <th class="d-none d-sm-table-cell" style="width: 15%;">Estado</th>
                                    <th class="text-center" style="width: 100px;">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="tarea in tareas" :key="tarea.index">
                                    <th class="text-center" scope="row">{{ tarea.id }}</th>
                                    <td>{{ tarea.name }}</td>
                                    <td>{{ tarea.category }}</td>
                                    <td>{{ tarea.slug }}</td>
                                    <td class="d-none d-sm-table-cell">
                                        <span v-if="tarea.complete" class="badge badge-success">Completada</span>
                                        <span v-else class="badge badge-info">Pendiente</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit" @click="iniciaEdicionTarea(tarea)">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete" @click="eliminarTarea(tarea)">
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

        <!-- Modal para agregar tareas --> 
        <div class="modal fade show" id="agregarTarea" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-slideleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-center">
                                Crear Tarea
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
                                        <input v-model="tarea.name" type="text" class="form-control" name="material-text" placeholder="">
                                        <label for="material-text">Titulo</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <select v-model="tarea.category" class="form-control" id="lista">
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
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material">
                                        <textarea v-model="tarea.slug" type="text" class="form-control" name="material-text" placeholder=""></textarea>
                                        <label for="material-text">Descripcion</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" @click="guardarTarea()" >Guardar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal editar tareas -->
        <div class="modal fade show" id="editarTarea" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-slideleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-center">
                                Editar Tarea
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
                                        <input v-model="actualizarTarea.name" type="text" class="form-control" name="material-text" placeholder="">
                                        <label for="material-text">Titulo</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <select v-model="actualizarTarea.category" class="form-control" id="lista">
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
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-material">
                                        <textarea v-model="actualizarTarea.slug" type="text" class="form-control" name="material-text" placeholder=""></textarea>
                                        <label for="material-text">Descripcion</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" @click="editarTarea(actualizarTarea)" >Save changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
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
                tarea:{
                    'listTask_id': '',
                    'name': '',
                    'slug': '',
                    'category': '',
                    'complete': false,
                },

                lista:{
                    'id':'',
                },

                actualizarTarea:{
                    'listTask_id': '',
                    'name': '',
                    'slug': '',
                    'category': '',
                    'complete': false,
                },
            /* Arreglo vacio para almacenar los datos a mostrar */
                tareas:[], 
                lista:'',
            }
        },
        created(){
            this.obtenerLista()
            this.obtenerTareas()
        },

        filters: {
            formatoFecha: function(data){
                return moment(data).format('LL')
            }
        },

        methods: {
            obtenerLista: function(){
                let path = window.location.pathname.split('/')
                let URL = '/dashboard/obtener-lista/'+ path[4];

                axios.get(URL).then((response) => {
                    this.lista = response.data
                }).catch((error) => {
                    console.log(error.data)
                })
            },
    /* C-rear Tareas */
            agregarTarea: function(){
                $('#agregarTarea').modal('show');
               
            },

            guardarTarea: function(){
                let path = window.location.pathname.split('/')
                let URL = 'store';


                this.tarea.listTask_id = path[4]
                axios.post(URL, 
                    this.tarea
                ).then((response) => {
                    $('#agregarTarea').modal('hide');
                    this.obtenerTareas();
                })

            },

    /* R-Obtener datos */
            obtenerTareas: function(){
                let path = window.location.pathname.split('/');
                var id_tarea = path[4];
                let URL = '/dashboard/tareas/'+ path[4];
                axios.get(URL).then((response)=>{
                    this.tareas = response.data;
                    console.log(this.tareas);
                }).catch((error)=>{
                    console.log(error.data);
                });
                
            },

    /* U-Actualizar datos */

            editarTarea: function(actualizarTarea){
                let URL = '/dashboard/lista/tarea/'+ actualizarTarea.id;
                axios.put(URL,this.actualizarTarea).then((response)=>{
                    $('#editarTarea').modal('hide');
                    this.obtenerTareas();
                })
                
            },
            
            iniciaEdicionTarea: function(tarea){
                this.actualizarTarea = tarea;
                    $('#editarTarea').modal('show');
            },

            completarTarea:function(tarea){
                
                let URL = '/dashboard/lista/tarea/' + tarea.id;
                axios.put(URL,tarea).then((response) =>{
                    /* this.obtenerTareas(); */
                })

            },

    /* D-Eliminar datos */ 
            eliminarTarea: function(tarea){
                let URL = 'tarea/' + tarea.id;
                    Swal.fire({
                        title: 'Estas seguro?',
                        text: 'No podras revertir esto!',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, Eliminar!'
                        }).then((result) => {
                            if (result.value) {
                                axios.delete(URL).then((response) => {
                                    this.obtenerTareas();
                                });
                        Swal.fire(
                        'Eliminado!',
                        'La tarea se a eliminado',
                        'success'
                        )
                            }
            });       
            },
        }

    };
</script>