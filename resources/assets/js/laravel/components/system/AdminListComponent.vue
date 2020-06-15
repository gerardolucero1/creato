<template>
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Lista de tareas</h3>
            <div class="block-options">
                <div class="block-options-item">
                    <button type="button" class="btn btn-sm btn-alt-primary mr-5 mb-5" @click="agregarLista()">
                        <i class="fa fa-plus mr-5"></i>Agregar Lista
                    </button>
                </div>
            </div>
        </div>
        <div v-if="listas.length != 0" class="block-content">
            <div v-for="(lista, index) in listas" :key="index" class="js-task block block-rounded mb-5 animated fadeIn" data-task-id="9" data-task-completed="false" data-task-starred="false">
                <table class="table table-borderless table-vcenter mb-0">
                    <tbody>
                        <tr>
                            <td class="text-center" style="width: 50px;">
                                <label class="js-task-status css-control css-control-primary css-checkbox py-0">
                                    <span class="badge badge-info">
                                        {{ lista.tasks.length }}
                                    </span>
                                    <!-- <input type="checkbox" class="css-control-input">
                                    <span class="css-control-indicator"></span> -->
                                </label>
                            </td>
                            <td class="js-task-content font-w600">
                                {{ lista.name }}
                            </td>
                            <td class="text-right" style="width: 150px;">
                                <button class="js-task-star btn btn-sm btn-alt-warning" type="button" @click="iniciaEdicionLista(lista)">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <a :href="`/dashboard/admin-lista/${lista.id}`" class="js-task-remove btn btn-sm btn-alt-info" type="button">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <button class="js-task-remove btn btn-sm btn-alt-danger" type="button"  @click="eliminarLista(lista)">
                                    <i class="fa fa-times"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- <table class="table table-striped table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">#</th>
                        <th>Nombre</th>
                        <th># Tareas</th>
                        <th class="text-center" style="width: 100px;">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="lista in listas" :key="lista.index">
                        <th class="text-center" scope="row">{{ lista.id }}</th>
                        <td>{{ lista.name }}</td>
                        <td>{{ lista.tasks.length }}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit" @click="iniciaEdicionBloque(lista)">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <a type="button" class="btn btn-sm btn-secondary js-tooltip-enabled">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete" @click="eliminarBloque(lista)">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table> -->
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
                                        <select v-model="lista.category" class="form-control" id="lista">
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
                            <button type="button" class="btn btn-primary" @click="guardarLista()" >Guardar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
                                    <select v-model="actualizarLista.category" class="form-control" id="lista">
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
                        <button type="button" class="btn btn-primary" @click="editarLista(actualizarLista)" >Actualizar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal ver tareas -->
        <div class="modal fade show" id="verTareas" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-slideleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-center">
                                Lista de tareas
                            </h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="modal-body">
                            <table class="table table-striped table-vcenter">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 50px;">#</th>
                                        <th>Nombre</th>
                                        <th>Completado</th>
                                        <th class="text-center" style="width: 100px;">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="lista in listas" :key="lista.index">
                                        <th class="text-center" scope="row">{{ lista.id }}</th>
                                        <td>{{ lista.name }}</td>
                                        <td>{{ lista.tasks.length }}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit" @click="iniciaEdicionLista(lista)">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                                <a :href="'lista/' + lista.id" type="button" class="btn btn-sm btn-secondary js-tooltip-enabled">
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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</template>

<script>
export default {
    name: 'AdminList',

    props: {
        project: Object,
    },

    data(){
        return{
            /* Objetos para obtener los datos */
            lista:{
                'name': '',
                'category': '',
                'project_id': '',
            },

            actualizarLista:{
                'name': '',
                'category': '',
                'project_id': '',
            },

            listaSeleccionada: {},

            bloque: '',

            /* Arreglo vacio para almacenar los datos a mostrar */    
            listas:[],
        }
    },

    mounted(){
        this.obtenerListas()
    },

    methods: {
        obtenerListas: function(){
            let URL = '/dashboard/admin-list/get/'+ this.project.id

            axios.get(URL).then((response)=>{
                this.listas = response.data;
            }).catch((error)=>{
                console.log(error.data);
            });
        },

        agregarLista: function(){
            $('#agregarLista').modal('show');
        },

        guardarLista: function(){
            this.lista.project_id = this.project.id
            let URL = '/dashboard/admin-lista/store'

            axios.post(URL, 
                this.lista
            ).then((response) => {
                $('#agregarLista').modal('hide');
                this.obtenerListas();
            })

        },

        editarLista: function(actualizarLista){
            let URL = '/dashboard/admin-list/update/'+ actualizarLista.id;

            axios.put(URL,this.actualizarLista).then((response)=>{
                $('#editarLista').modal('hide');
            })
            
        }, 

        iniciaEdicionLista: function(lista){
            this.actualizarLista = lista;
            $('#editarLista').modal('show');
        },

        eliminarLista: function(lista){
            let URL = '/dashboard/admin-lista/delete/' + lista.id;

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
}
</script>

<style>

</style>