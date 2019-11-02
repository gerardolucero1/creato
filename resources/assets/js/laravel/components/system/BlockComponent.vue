<template>
   <div id="crud" class="row">
       <div class="col-sm-12 ">
           <h1>Bloques de Tareas</h1>
       </div>
        <div class="col-sm-12 col-right">
            <div class="col-md-6 col-md-offset-5">
            <!-- Boton para agregar un bloque nuevo -->
                <button type="button" class="btn btn-primary" @click="agregarBloque()">
                                <i class=""></i> Bloque nuevo
                </button>
            </div>
        </div>
            <!-- lista de bloques -->
            <div class="col-md-1">
            <!-- recorrer 1 columna -->
            </div>
            <div class="col-md-8 col-center">
                <table class="table table-hover table-sprite">
                    <thead class="table table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Bloque</th>
                            <th colspan="2">
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- funcion para imprimir los datos obtenidosde bloque -->
                        <tr v-for="bloque in bloques" :key="bloque.index">
                            <td width="10px">{{bloque.id}}
                            </td>
                                <td>{{bloque.name}}
                                </td>
                                <td width="10px">
                                    <button type="button" class="btn btn-outline-primary waves-effect btn-sm" @click="iniciaEdicionBloque(bloque)" >
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </td>
                                <td width="10px">
                                    <a :href="'lista/' + bloque.id" class="btn btn-outline-primary waves-effect btn-sm"><i class="si si-eye"></i></a>
                                </td>
                                <td width="10px">
                                    <button @click="eliminarBloque(bloque)" class="btn btn-outline-danger waves-effect btn-sm">
                                        <i class="si si-trash"></i>
                                    </button>
                                </td>
                        </tr>
                     </tbody>
                </table>
            </div>
       
        <!-- Modal agregar bloque -->
        
       <div class="modal fade" id="agregarBloque" tabindex="-1" role="dialog">
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
                                <!-- select -->
                                <div class="form-group">
                                    <label for="lista">Usuario al que pertenese</label>
                                <select v-model="bloque.client_id" name="listTask_id" id="lista">
                                    <option value="">elije el cliente</option>
                                        <option  v-for="usuario in usuarios" :key="usuario.index" :value="usuario.id">{{usuario.name}}</option>
                                </select>
                                </div>
                                <!-- termina select -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" @click="guardarBloque()" >Save changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                    </div>
                </div>
            </div> 
            
        <!-- Modal editar bloque -->
            <div class="modal fade" id="editarBloque" tabindex="-1" role="dialog">
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
                                    <input v-model="actualizarBloque.name" type="text" class="form-control" id="nombre2" name="name" placeholder="nombre">
                                </div>
                                <!-- select -->
                                <div class="form-group">
                                    <label for="lista">Usuario al que pertenese</label>
                                <select v-model="actualizarBloque.client_id" name="listTask_id" id="lista">
                                    <option value="">elije el cliente</option>
                                        <option  v-for="usuario in usuarios" :key="usuario.index" :value="usuario.id">{{usuario.name}}</option>
                                </select>
                                </div>
                                <!-- termina select -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" @click="editarBloque(actualizarBloque)" >Save changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                    </div>
                </div>
            </div> 
        <!-- termina modal para editar bloque -->      
   </div>
</template>

<script>
    export default {
        
        data(){
            return{
                bloque:{
                    'name': '',
                    'client_id': '',

                },

                actualizarBloque:{
                    'name': '',
                    'client_id': '',

                },
                
                usuario:{
                    'name': '',
                    'id': '',
                },

            /* Arreglos vacios para almacenar los datos que se mostraran */
                bloques:[],

                usuarios:[],
            }
        },
        created(){
            this.obtenerBloques(),
            this.obtenerUsuarios()
        },

        methods: {
    /* C-rear bloques */

            agregarBloque: function(){
                    $('#agregarBloque').modal('show');
            },

            guardarBloque: function(){
                console.log(this.bloque)
                let URL = 'block/save';

                axios.post(URL, 
                    this.bloque
                ).then((response) => {
                    console.log('se inserto datos');
                    $('#agregarBloque').modal('hide');
                    this.obtenerBloques();
                    })

            }, 

    /* R-Obtener datos */

            /* Usuarios */
            obtenerUsuarios:function(){
                let URL = 'users/get';
                axios.get(URL).then((response)=>{
                    this.usuarios =response.data;
                    console.log(this.usuarios);
                }).catch((error)=>{
                    console.log(error.data);
                });
            },

            /* Bloques */
            obtenerBloques: function(){
                let URL = 'blocks/get';
                axios.get(URL).then((response)=>{
                    this.bloques = response.data;
                    console.log(this.bloques);
                }).catch((error)=>{
                    console.log(error.data);
                });
                
            },

    /* U-Actualizar datos */

        editarBloque: function(actualizarBloque){
                let URL = '/dashboard/block/update/'+ actualizarBloque.id;
                axios.put(URL,this.actualizarBloque).then((response)=>{
                     $('#editarBloque').modal('hide');
                })
                
            }, 

            iniciaEdicionBloque: function(bloque){
                this.actualizarBloque = bloque;
                    $('#editarBloque').modal('show');
            },

    /* D-Eliminar datos */ 
        
            eliminarBloque: function(bloque){
                let URL = 'block/delete/' + bloque.id;
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
                                    this.obtenerBloques();
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
