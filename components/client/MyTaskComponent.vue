<style>
    .detalles-tarea{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        padding: 20px;
    }
</style>

<template>
    <section class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="js-tasks">
                    <h2 class="content-heading mb-10">Activas</h2>
                    <div class="js-task-list">
                        <div v-for="(item, index) in tareasPendientes" class="js-task block block-rounded mb-5 animated fadeIn" data-task-completed="false" data-task-starred="false">
                            <table class="table table-borderless table-vcenter mb-0">
                                <tbody><tr>
                                    <td class="text-center" style="width: 50px;">
                                        <label class="js-task-status css-control css-control-primary css-checkbox py-0">
                                            <button @click="completarTarea(item)" type="button" class="btn btn-circle btn-outline-secondary mr-5 mb-5">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </label>
                                    </td>
                                    <td class="js-task-content font-w600">
                                        {{ item.name }}
                                        <span style="display: block; font-size: 10px;">{{ item.category }}</span>
                                    </td>
                                    <td class="text-right" style="width: 100px;">
                                        <button @click="verTarea(item)" class="js-task-star btn btn-sm btn-alt-warning" type="button">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody></table>
                        </div>
                    </div>
                    <h2 class="content-heading mb-10">Completadas</h2>
                    <div class="js-task-list-completed">
                        <div v-for="(item, index) in tareasCompletas" class="js-task block block-rounded mb-5 animated fadeIn" data-task-completed="true" data-task-starred="false">
                            <table class="table table-borderless table-vcenter bg-body-light mb-0">
                                <tbody><tr>
                                    <td class="text-center" style="width: 50px;">
                                        <label class="js-task-status css-control css-control-primary css-checkbox py-0">
                                            <button @click="retornarTarea(item)" type="button" class="btn btn-circle btn-alt-success mr-5 mb-5">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </label>
                                    </td>
                                    <td class="js-task-content font-w600">
                                        <del>{{ item.name }}</del>
                                        <span style="display: block; font-size: 10px;">{{ item.category }}</span>
                                    </td>
                                    <td class="text-right" style="width: 100px;">
                                        <button @click="verTarea(item)" class="js-task-star btn btn-sm btn-alt-warning" type="button">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody></table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mt-4">
                <div class="block mt-4">
                    <div class="detalles-tarea">
                        <h5>{{ tarea.name }}</h5>
                        <p style="display: block; font-size: 10px;">{{ tarea.category }}</p>
                        <p>{{ tarea.slug }}</p>
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
            lista: '',
            tarea: '',
        }
    },
    created(){
        this.obtenerTareas()
    },
    computed: {
        tareasPendientes: function(){
            if(this.lista.length != 0){
                let pendientes = []

                this.lista.tasks.forEach((element) => {
                    if(!element.complete){
                        pendientes.push(element)
                    }
                })

                return pendientes
            }
        },
        
        tareasCompletas: function(){
            if(this.lista.length != 0){
                let completas = []

                this.lista.tasks.forEach((element) => {
                    if(element.complete){
                        completas.push(element)
                    }
                })

                return completas
            }
        },

    },
    methods: {
        obtenerTareas: function(){
            let path = window.location.pathname.split('/')
            let URL = '/obtener-tareas/' + path[3]

            axios.get(URL).then((response) => {
                this.lista = response.data
            })
        },

        completarTarea: function(item){
            let URL = '/completar-tarea/' + item.id

            axios.get(URL).then((response) => {
                this.obtenerTareas()
            })
        },

        retornarTarea: function(item){
            let URL = '/retornar-tarea/' + item.id

            axios.get(URL).then((response) => {
                this.obtenerTareas()
            })
        },

        verTarea: function(item){
            this.tarea = item
        }
    }
}
</script>