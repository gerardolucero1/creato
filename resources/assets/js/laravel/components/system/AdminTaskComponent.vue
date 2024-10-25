<template>
    <section>
        <div class="content">
            <div class="col-md-12">
                <div class="block block-rounded">
                    <button type="button" class="btn btn-square btn-secondary mr-5 mb-5" onClick="history.back()">
                        <i class="fa fa-arrow-circle-left mr-5"></i>Regresar
                    </button>
                    <div class="block-content bg-pattern">
                        <div class="py-20 text-center">
                            <h1 class="h3 mb-5">{{ list.name }}</h1>
                            <p class="mb-10 text-muted">
                                <em>{{ list.created_at | formatoFecha }}</em>
                            </p>
                            <p>
                                Lista asignado a: {{ list.project.title }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 col-xl-3">
                    <div class="js-tasks-nav d-none d-md-block">
                        <div class="block block-rounded">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Tasks</h3>
                            </div>
                            <div class="block-content">
                                <ul class="list-group push" v-if="tareas.length != 0">
                                    <li class="list-group-item">
                                        <span class="js-task-badge badge badge-primary float-right animated bounceIn">{{ tareasPendientes.length }}</span>
                                        <i class="fa fa-fw fa-tasks mr-5"></i> Activas
                                    </li>
                                    <li class="list-group-item">
                                        <span class="js-task-badge-completed badge badge-success float-right animated bounceIn">{{ tareasCompletas.length }}</span>
                                        <i class="fa fa-fw fa-check mr-5"></i> Completadas
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-xl-9">
                    <div class="js-tasks">
                        <div class="input-group input-group-lg">
                            <input class="form-control" type="text" v-model="tarea" @keyup.enter="guardarTarea()" id="js-task-input" name="js-task-input" placeholder="Escribe una tarea y presiona enter..">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-plus"></i>
                                </span>
                            </div>
                        </div>
                        <h2 class="content-heading mb-10">Activas</h2>
                        <div class="js-task-list" v-if="tareas.length != 0">
                            <div v-for="(tarea, index) in tareasPendientes" :key="index" class="js-task block block-rounded mb-5 animated fadeIn" data-task-id="9" data-task-completed="false" data-task-starred="false">
                                <table class="table table-borderless table-vcenter mb-0">
                                    <tbody><tr>
                                        <td class="text-center" style="width: 50px;">
                                            <label class="js-task-status css-control css-control-primary css-checkbox py-0">
                                                <input type="checkbox" class="css-control-input" v-model="tarea.complete" @change="completarTarea(tarea, index)">
                                                <span class="css-control-indicator"></span>
                                            </label>
                                        </td>
                                        <td class="js-task-content font-w600">
                                            {{ tarea.name }}
                                        </td>
                                        <td class="text-right" style="width: 150px;">
                                            <button class="js-task-star btn btn-sm btn-alt-warning" type="button" @click="editarTarea(tarea)">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            <a :href="`/dashboard/admin-lista/tasks/show/${tarea.id}`" class="js-task-star btn btn-sm btn-alt-info" type="button">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <button class="js-task-remove btn btn-sm btn-alt-danger" type="button" @click="eliminarTarea(tarea)">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody></table>
                            </div>
                        </div>

                        <h2 class="content-heading mb-10">Completadas</h2>
                        <div class="js-task-list-completed">
                            <div v-for="(tarea, index) in tareasCompletas" :key="index" class="js-task block block-rounded mb-5 animated fadeIn" data-task-id="3" data-task-completed="true" data-task-starred="false">
                                <table class="table table-borderless table-vcenter bg-body-light mb-0">
                                    <tbody><tr>
                                        <td class="text-center" style="width: 50px;">
                                            <label class="js-task-status css-control css-control-primary css-checkbox py-0">
                                                <input type="checkbox" class="css-control-input" v-model="tarea.complete" @change="completarTarea(tarea, index)">
                                                <span class="css-control-indicator"></span>
                                            </label>
                                        </td>
                                        <td class="js-task-content font-w600">
                                            <del>{{ tarea.name }}</del>
                                        </td>
                                        <td class="text-right" style="width: 150px;">
                                            <button class="js-task-star btn btn-sm btn-alt-warning" type="button" @click="editarTarea(tarea)">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            <a :href="`/dashboard/admin-lista/tasks/show/${tarea.id}`" class="js-task-star btn btn-sm btn-alt-info" type="button">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <button class="js-task-remove btn btn-sm btn-alt-danger" type="button" @click="eliminarTarea(tarea)">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody></table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'AdminTask',

    props: {
        list: Object,
    },

    data(){
        return{
            tarea: '',
            tareas: [],
        }
    },

    filters: {
        formatoFecha: function(data){
            return moment(data).format('LL')
        }
    },

    mounted(){
        this.obtenerTareas()
    },

    computed: {
        tareasPendientes(){
            if(this.tareas.length != 0){
                let pendientes = []

                this.tareas.forEach((element) => {
                    if(!element.complete){
                        pendientes.push(element)
                    }
                })

                return pendientes
            }
        },
        
        tareasCompletas(){
            if(this.tareas.length != 0){
                let completas = []

                this.tareas.forEach((element) => {
                    if(element.complete){
                        completas.push(element)
                    }
                })

                return completas
            }
        },
    },

    methods: {
        obtenerTareas(){
            let URL = '/dashboard/admin-lista/tasks/' + this.list.id

            axios.get(URL).then((response) => {
                this.tareas = response.data
            })
        },

        guardarTarea(){
            let URL = '/dashboard/admin-lista/tasks/store'
            let tarea = {
                admin_list: this.list.id,
                name: this.tarea,
                body: '',
                complete: false,
            }

            axios.post(URL, 
                tarea
            ).then((response) => {
                this.tarea = ''
                this.obtenerTareas();
            })

        },

        completarTarea(tarea, index){
            this.tareas = []
            let URL = '/dashboard/admin-lista/tasks/complete/' + tarea.id

            axios.post(URL, tarea).then((response) => {
                this.obtenerTareas()
            })
        },

        editarTarea(tarea){
            console.log(tarea)
            const { name } = Swal.fire({
                title: 'Nombre de la tarea',
                input: 'text',
                showCancelButton: true,
                inputValidator: (value) => {
                    if (!value) {
                        return '¡Necesitas escribir algo!'
                    }
                }
            }).then((result) => {
                if (result.value) {
                    tarea.name = result.value

                    this.completarTarea(tarea)

                    Swal.fire(
                        'Editado!',
                        'La tarea se ha editado',
                        'success'
                    )
                }
            })
        },

        eliminarTarea(tarea){
            let URL = '/dashboard/admin-lista/tasks/' + tarea.id;

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
}
</script>

<style>

</style>