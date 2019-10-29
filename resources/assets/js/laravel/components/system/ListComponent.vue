<template>
   <div id="crud" class="row">
       <div class="col-sm-12">
           <h1>Listas de Tareas</h1>
       </div>
            <div class="col-sm-10">
                <!-- Boton para agregar una lista -->
            <button type="button" class="btn btn-primary float-right" @click="agregarLista()">
                            <i class=""></i> Lista nueva
            </button>
                <!-- termina boton para agregar lista -->
            </div>

        <!-- lista de  listas tareas -->
<div class="col-md-2">
                    
                        </div>
                        <div class="col-md-1">
                    
                        </div>
                            <div class="col-md-8 col-center">
                                <table class="table table-hover table-sprite">
                                    <thead class="table table-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Lista</th>
                                            <th colspan="2">
                                                &nbsp;
                                            </th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                            <tr v-for="lista in listas" :key="lista.index">
                                                <td width="10px">{{lista.id}}</td>
                                                <td>{{lista.name}}</td>
                                                <td width="10px">
                                                    <button type="button" class="btn btn-outline-primary waves-effect btn-sm" @click="iniciaEdicionLista(lista)">
                                                    <i class="fa fa-edit"></i>
                                                    </button>
                                                </td>
                                                <td width="10px">
                                                    <a :href="'tarea/' + lista.id" class="btn btn-outline-primary waves-effect btn-sm"><i class="si si-eye"></i></a>
                                                </td>
                                                <td width="10px">
                                                    <button @click="eliminarLista(lista)" class="btn btn-outline-danger waves-effect btn-sm">
                                                        <i class="si si-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                </table>
                            </div>

        <!-- Termina sección para mostrar los datos -->
                <!-- Modal agregar lista -->
        
       <div class="modal fade" id="agregarLista" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar lista nueva</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                            <div class="modal-body">
                            <div class="form-group">
                                <label for="nombre">nombre de lista</label>
                                <input v-model="lista.name" type="text" class="form-control" id="nombre" name="name" placeholder="nombre">
                            </div>
                            <div class="form-group">
                                <label for="otro">slug</label>
                                <input v-model="lista.slug" type="text" class="form-control" id="otro" name="slug" placeholder="slug">
                            </div>
                            <input type="hidden" :value="URL"/>
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" @click="guardarLista()" >Save changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                    </div>
                </div>
            </div> 

        <!-- Modal editar lista -->

            <div class="modal fade" id="editarLista" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Editar lista</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nombre">nombre de lista</label>
                                <input v-model="actualizarLista.name" type="text" class="form-control" id="nombre" name="name" placeholder="nombre">
                            </div>
                            <div class="form-group">
                                <label for="otro">slug</label>
                                <input v-model="actualizarLista.slug" type="text" class="form-control" id="otro" name="slug" placeholder="slug">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" @click="editarLista(actualizarLista)" >Save changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div> 

        <!-- termina modal para editar lista -->      
   </div>
</template>

<script>
    export default {
        
        data(){
            return{
            /* Objetos para obtener los datos */
                lista:{
                    'name': '',
                    'slug': '',
                    'blockList_id': '1',
                },

                actualizarLista:{
                    'name': '',
                    'slug': '',
                    'blockList_id': '',
                },

                bloque:{
                    'id':'',
                },

            /* Arreglo vacio para almacenar los datos a mostrar */    
                listas:[],
  
            }
        },

        created(){
            this.obtenerListas()
        },

        methods: {
    /* C-rear listas */
            agregarLista: function(){
                    $('#agregarLista').modal('show');
               
            },

            guardarLista: function(){
                console.log(this.lista)
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
