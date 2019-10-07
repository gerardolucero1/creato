<template>
   <div id="crud" class="row">
       <div class="col-xs-12">
           <h1>Tareas</h1>
       </div>
       <div class="col-sm-7">
            <button type="button" class="btn btn-primary pull-right" @click="agregarLista()">
                            <i class=""></i> Lista nueva
                        </button>
            <button type="button" class="btn btn-primary pull-right" @click="agregarBloque()">
                            <i class=""></i> Bloque nuevo
                        </button>
            <!-- lista de bloques -->
           <table class="table table-hover table-sprite">
               <thead>
                   <tr>
                       <th>ID</th>
                       <th>Bloque</th>
                       <th colspan="2">
                           &nbsp;
                       </th>
                   </tr>
               </thead>
               <tbody>
                   <tr v-for="bloque in bloques" :key="bloque.index">
                       <td width="10px">{{bloque.id}}</td>
                       <td>{{bloque.name}}</td>
                       <td width="10px">
                           <a :href="'lista/' + bloque.id" class="btn btn-warning btn-sm">Ver</a>
                       </td>
                       <td width="10px">
                           <button @click="eliminarBloque(bloque)" class="btn btn-danger btn-sm">eliminar</button>
                       </td>
                   </tr>
               </tbody>
           </table>
       </div>
        <!-- Modal agregar bloque -->
        
       <div class="modal" id="agregarBloque" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar Bloque Nuevo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                            <div class="modal-body">
                            <div class="form-group">
                                <label for="nombre2">nombre de bloque</label>
                                <input v-model="bloque.name" type="text" class="form-control" id="nombre2" name="name" placeholder="nombre">
                            </div>
                            <div class="form-group">
                                <label for="user">usuario a asignar</label>
                                <input v-model="bloque.client_id" type="text" class="form-control" id="user" name="client_id" placeholder="cliente">
                            </div>
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" @click="guardarBloque()" >Save changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                    </div>
                </div>
            </div> 
        <!-- Modal agregar lista -->
        
       <div class="modal" id="agregarLista" tabindex="-1" role="dialog">
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
                            <div class="form-group">
                                <label for="lista">bloque al que pertenese</label>
                                
                               <select v-model="lista.blockList_id" name="listTask_id" id="lista">
                                   <option value="">elije el bloque</option>
                                    <option  v-for="bloque in bloques" :key="bloque.index" :value="bloque.id">{{bloque.name}}</option>
                               </select>
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
</template>

<script>
    export default {
        props:["bloques"],
        data(){
            return{
                bloque:{
                    'name': '',
                    'client_id': '',

                },
                lista:{
                    'name': '',
                    'slug': '',
                    'blockList_id': '',
                }, 
            }
        },
        created(){
            this.obtenerBloques()
        },

        methods: {
/* Bloques */
            agregarBloque: function(){
                    $('#agregarBloque').modal('show');
            },

            guardarBloque: function(){
                console.log(this.bloque)
                let URL = 'bloque';

                axios.post(URL, 
                    this.bloque
                ).then((response) => {
                    console.log('se inserto datos');
                    $('#agregarBloque').modal('hide');
                    location.reload();
                    })

            },

           

            eliminarBloque: function(bloque){
                let URL = 'bloque/' + bloque.id;
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
                                    location.reload();
                                });
                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                            }
                        });       
            },

/* Listas */
            agregarLista: function(){
                    $('#agregarLista').modal('show');
               
            },

            guardarLista: function(){
                console.log(this.lista)
                let URL = 'lista';

                axios.post(URL, 
                    this.lista
                ).then((response) => {
                    $('#agregarLista').modal('hide');
                    console.log('se inserto datos');
                    })

            },

/* Tareas */               
            agregarTarea: function(){
                    $('#agregarTarea').modal('show');
               
            },

            guardarTarea: function(){
                console.log(this.tarea)
                let URL = 'tareas';

                axios.post(URL, 
                    this.tarea
                ).then((response) => {
                    console.log('se inserto datos');
                    }

                )},      
        }

    };
</script>

<style>

</style>
