<template>
    <section class="container">
        <div class="row gutters-tiny">
            <div class="col-md-6 col-xl-3">
                <a class="block block-link-shadow text-right" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-left mt-10">
                            <i class="si si-drawer fa-3x text-body-bg-dark"></i>
                        </div>
                        <div class="font-size-h3 font-w600">{{ numeroBloques }}</div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Bloques</div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a class="block block-link-shadow text-right" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-left mt-10">
                            <i class="si si-list fa-3x text-body-bg-dark"></i>
                        </div>
                        <div class="font-size-h3 font-w600">{{ numeroListas }}</div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Listas</div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a class="block block-link-shadow text-left" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-right mt-10">
                            <i class="si si-note fa-3x text-body-bg-dark"></i>
                        </div>
                        <div class="font-size-h3 font-w600">65</div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Tareas</div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a class="block block-link-shadow text-left" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-right mt-10">
                            <i class="si si-check fa-3x text-body-bg-dark"></i>
                        </div>
                        <div class="font-size-h3 font-w600">32</div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Completadas</div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Lista de bloques actuales</h3>
                        <div class="block-options">
                            <div class="block-options-item">
                                <button type="button" class="btn btn-sm btn-alt-primary mr-5 mb-5" @click="agregarBloque()">
                                    <i class="fa fa-plus mr-5"></i>Agregar Bloque
                                </button>
                            </div>
                        </div>
                    </div>
                    <div v-if="bloques.length != 0" class="block-content">
                        <table class="table table-striped table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 50px;">#</th>
                                    <th>Nombre</th>
                                    <th>Usuario asignado</th>
                                    <th># Lista de tareas</th>
                                    <th class="d-none d-sm-table-cell" style="width: 15%;">Estado</th>
                                    <th class="text-center" style="width: 100px;">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="bloque in bloques" :key="bloque.index">
                                    <th class="text-center" scope="row">{{ bloque.id }}</th>
                                    <td>{{ bloque.name }}</td>
                                    <td>{{ bloque.user.name }}</td>
                                    <td>{{ bloque.lists_task.length }}</td>
                                    <td class="d-none d-sm-table-cell">
                                        <span class="badge badge-info">Activo</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit" @click="iniciaEdicionBloque(bloque)">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            <a :href="'lista/' + bloque.id" type="button" class="btn btn-sm btn-secondary js-tooltip-enabled">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete" @click="eliminarBloque(bloque)">
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
        
        <!-- lista de bloques -->
        
       
        <!-- Modal agregar bloque -->
        
       <div class="modal fade show" id="agregarBloque" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-slideleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-center">
                                Nuevo bloque
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
                                        <input v-model="bloque.name" type="text" class="form-control" name="material-text" placeholder="">
                                        <label for="material-text">Nombre</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <select v-model="bloque.client_id" class="form-control" name="listTask_id" id="lista">
                                            <option value="">elije el cliente</option>
                                            <option  v-for="usuario in usuarios" :key="usuario.index" :value="usuario.id">{{usuario.name}}</option>
                                        </select>
                                        <label for="material-text">Cliente</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-alt-success" @click="guardarBloque()">
                                <i class="fa fa-check"></i> Guardar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <!-- Modal editar bloque -->
        <div class="modal fade show" id="editarBloque" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-slideleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-center">
                                Editar bloque
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
                                        <input v-model="actualizarBloque.name" type="text" class="form-control" name="material-text" placeholder="">
                                        <label for="material-text">Nombre</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material">
                                        <select v-model="actualizarBloque.client_id" class="form-control" name="listTask_id" id="lista">
                                            <option value="">elije el cliente</option>
                                            <option  v-for="usuario in usuarios" :key="usuario.index" :value="usuario.id">{{usuario.name}}</option>
                                        </select>
                                        <label for="material-text">Cliente</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-alt-success" @click="editarBloque(actualizarBloque)">
                                <i class="fa fa-check"></i> Editar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <!-- termina modal para editar bloque -->      
    </section>
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
        computed: {
            numeroBloques: function(){
                return this.bloques.length
            },

            numeroListas: function(){
                if(this.bloques.length != 0){
                    let listas = 0
                    this.bloques.forEach((element) => {
                        listas = listas + element.lists_task.length
                    })

                    return listas
                }
            }
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
                    this.obtenerBloques()
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
