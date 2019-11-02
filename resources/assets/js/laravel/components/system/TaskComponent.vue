<template>
   <div id="tareas" class="row">
       <div class="col-sm-12">
           <h1>Tareas</h1>
       </div>
       <div class="col-sm-12">
                
                <div class="col-md-6 col-md-offset-5">
                    <button type="button" class="btn btn-primary pull-center" @click="agregarTarea()">
                        <i class=""></i> Tarea nueva
                    </button>
                </div>
            </div>
        <!-- lista de  listas tareas -->
            <div class="col-md-1">
                <!-- Desplazar una columna -->
            </div>
            <div v-if="tarea.listTask_id !== tareas.id" class="col-md-8">
                <table class="table table-hover table-sprite">
                    <thead class="table table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Lista</th>
                            <th colspan="3">
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="tarea in tareas" :key="tarea.index"
                            v-bind:class="[tarea.complete ? 'disabled' : '']"> 
                            <td width="10px">{{tarea.id}}</td>
                            <td>
                                {{tarea.name}}
                            </td>
                            <td width="10px">
                                <button type="button" class="btn btn-outline-primary waves-effect btn-sm" @click="iniciaEdicionTarea(tarea)">
                                        <i class="fa fa-edit"></i>
                                    </button>
                            </td>
                            <td width="10px">
                                <button @click="eliminarTarea(tarea)" class="btn btn-outline-danger waves-effect btn-sm">
                                    <i class="si si-trash"></i>
                                </button>
                            </td>
                            <td width="10px">
                                <div class="form-check">
                                    <input type="checkbox"  class="form-check-input" id="complete" :checked="tarea.complete" v-model="tarea.complete" @change="completarTarea(tarea)">

                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <div v-else>
            <h2>No tienes tareas en esta lista, crea una</h2>
            <button type="button" class="btn btn-primary pull-right" @click="iniciaEdicionTarea(tarea)">
                <i class=""></i> Nueva tarea
            </button>
        </div>

        <!-- Termina lista de tareas -->
                <!-- Modal para agregar tareas --> 
         
            <div class="modal fade" id="agregarTarea" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Agregar tarea nueva</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nombre">nombre de tarea</label>
                                <input v-model="tarea.name" type="text" class="form-control" id="nombre" name="name" placeholder="nombre">
                            </div>

                            <div class="form-group">
                                <label for="otro">slug</label>
                                <input v-model="tarea.slug" type="text" class="form-control" id="otro" name="slug" placeholder="slug">
                            </div>
                                
                            <div class="form-group">
                                <label for="categoria">categoria</label>
                                <input v-model="tarea.category" type="text" class="form-control" id="categoria" name="category" placeholder="categoria">
                            </div>

                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-primary waves-effect btn-sm" @click="guardarTarea()" >
                                    <i class="fa fa-save"> Guardar</i>
                                </button>

                                <button type="button" class="btn btn-outline-danger waves-effect btn-sm" data-dismiss="modal">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                    </div>
                </div>
            </div>
        <!-- Termina modal para agregar tareas -->

        <!-- Modal editar tareas -->

            <div class="modal fade" id="editarTarea" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Editar tarea</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nombre">nombre de tarea</label>
                                <input v-model="actualizarTarea.name" type="text" class="form-control" id="nombre" name="name" placeholder="nombre">
                            </div>
                            <div class="form-group">
                                <label for="otro">slug</label>
                                <input v-model="actualizarTarea.slug" type="text" class="form-control" id="otro" name="slug" placeholder="slug">
                            </div>
                            <div class="form-group">
                                <label for="categoria">categoria</label>
                                <input v-model="actualizarTarea.category" type="text" class="form-control" id="categoria" name="category" placeholder="categoria">
                            </div>
                            <div class="form-group">
                                <label for="lista">lista a la que pertenese</label>
                                <input v-model="actualizarTarea.listTask_id" type="text" class="form-control" id="lista" name="listTask_id" placeholder="lista">
                            </div>
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" @click="editarTarea(actualizarTarea)" >Save changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                    </div>
                </div>
            </div> 

        <!-- Termina modal de editar tareas -->  
    </div>
</template>

<script>
    export default {
    
        data(){
            return{
            /* Objetos para obtener los datos */
                tarea:{
                    'listTask_id': '3',
                    'name': '',
                    'slug': '',
                    'category': '',
                    'complete':'false',
                },

                lista:{
                    'id':'',
                },

                actualizarTarea:{
                    'listTask_id': '',
                    'name': '',
                    'slug': '',
                    'category': '',
                    'complete':'false',
                },
            /* Arreglo vacio para almacenar los datos a mostrar */
                tareas:[], 
                listas:[],
            }
        },
        created(){
            this.obtenerTareas()
        },

        methods: {
    /* C-rear Tareas */
            agregarTarea: function(){
                    $('#agregarTarea').modal('show');
               
            },

            guardarTarea: function(){
                console.log(this.tarea)
                let URL = 'store';

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