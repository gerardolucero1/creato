<template>
    <section class="col-md-6">
        <div class="block block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title">Mi lista de tareas</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="modal" data-target="#agregarLista">
                        <i class="si si-plus"></i>
                    </button>
                </div>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-striped table-vcenter" v-if="listasNueva.length != 0">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 100px;"><i class="si si-user"></i></th>
                                <th>TITULO</th>
                                <th style="width: 15%;">ESTATUS</th>
                                <th>ORDEN</th>
                                <th class="text-center" style="width: 100px;">ACCIONES</th>
                                <th>SORT</th>
                            </tr>
                        </thead>
                        <draggable :list="listasNueva" animation="200" handle=".handle" :tag="'tbody'" @change="update">
                            <tr v-for="(lista, index) in listasNueva" :key="index">
                                <td class="text-center">
                                    <i class="si si-basket"></i>
                                </td>
                                <td class="font-w600">{{ lista.name }}</td>
                                <td>
                                    <span class="badge badge-success">Completada</span>
                                </td>
                                <td>
                                    {{ lista.order }}
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Watch">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <i class="fa fa-arrows handle"></i>
                                </td>
                            </tr>
                        </draggable>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal agregar lista -->
        <div class="modal fade show" id="agregarLista" tabindex="-1" role="dialog" aria-labelledby="modal-slideleft" aria-modal="true">
            <div class="modal-dialog modal-dialog-slideleft" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-center">
                                Nueva lista
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
                                                <input type="text" class="form-control" name="name" placeholder="Nombre de la lista" v-model="lista.name">
                                                <label for="material-text">Nombre de la lista</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="form-material">
                                                <select class="form-control" name="genere" v-model="lista.category">
                                                    <option>...</option>
                                                    <option value="PLANIFICACION">Planificacion</option>
                                                    <option value="CEREMONIA">Ceremonia</option>
                                                    <option value="JOYERIA">Joyeria</option>
                                                </select>
                                                <label for="material-select">Categoria</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-alt-success" @click="agregarLista()">
                            <i class="fa fa-check"></i> Agregar
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </section>
</template>

<script>

    import auth from '../../mixins/auth';
    import draggable from 'vuedraggable';

    export default {
        components: {
            draggable,
        },
        data(){
            return{
                listas: [],
                listasNueva: '',
                ultimoElemento: '',
                lista: {
                    client_id: '',
                    name: '',
                    category: '',
                    order: '',
                }
            }
        },
        mixins: [
            auth
        ],
        created(){
            this.obtenerListas();
        },
        methods: {
            update: function(){
                this.listasNueva.map((lista, index) => {
                    lista.order = index + 1;
                });

                let URL = '/actualizar-listas/';

                axios.put(URL, {
                    listas: this.listasNueva,
                }).then((response) => {
                    console.log('Listas actualizadas');
                })
            },
            obtenerListas: function(){
                let URL = '/mi-lista';

                axios.get(URL).then((response) => {
                    this.listas = response.data;
                    this.ultimoElemento = this.listas.pop();
                    this.listas.push(this.ultimoElemento);
                    this.listasNueva = this.listas;
                    console.log('Estas son las listas', this.listas);
                }).catch((error) => {
                    console.log(error.data);
                })
            },
            agregarLista: function(){
                let URL = '/mi-lista';

                this.lista.client_id = this.user.id;
                if(this.listas.length == 0){
                    this.lista.order = 1;
                }else{
                    this.lista.order = this.ultimoElemento.order + 1;
                }

                axios.post(URL, this.lista).then((response) => {
                    console.log('Lista agregada');
                    this.obtenerListas();
                }).catch((error) => {
                    console.log(error.data);
                })
            }
        },
    }
</script>

<style>

</style>