<style>
    .detalles-tarea{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        padding: 20px;
        background-color: #fdf9e1;
    }
</style>

<template>
    <section class="container">
        <div class="block-rounded">
            <div class="bg-pattern" style="background-image: url('assets/media/various/bg-pattern-inverse.png');">
                <div class="py-20 text-center">
                    <h1 class="h3 mb-5">{{ lista.name }}</h1>
                    <p class="mb-10 text-muted">
                        <em>{{ lista.slug }}</em>
                    </p>
                    <!-- <p>
                        Web Design and Development of ACME’s website. Brand identity as well as promo mobile app development for their projects.
                    </p> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="js-tasks">
                    <h3 style="font-size: 1.5em;">Activas</h3>
                    <div class="js-task-list">
                        <div v-for="(item, index) in tareasPendientes" :key="index" class="js-task block block-rounded mb-5 animated fadeIn" data-task-completed="false" data-task-starred="false">
                            <table class="table table-borderless table-vcenter mb-0">
                                <tbody><tr>
                                    <td class="text-center" style="width: 50px;">
                                        <label class="js-task-status css-control css-control-primary css-checkbox py-0">
                                            <button @click="completarTarea(item)" type="button" class="btn btn-circle btn-outline-success mr-5 mb-5">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </label>
                                    </td>
                                    <td class="js-task-content font-w600">
                                        {{ item.name }}
                                        <span style="display: block; font-size: 10px;">{{ item.category }}</span>
                                    </td>
                                    <td class="text-right" style="width: 100px;">
                                        <button @click="verTarea(item)" class="btn btn-lg btn-circle mr-5 mb-5" style="background-color: #f76c6f;" type="button">
                                            <i class="fa fa-eye" style="color: white;"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody></table>
                        </div>
                    </div>
                    <h3 style="font-size: 1.5em;">Completadas</h3>
                    <div class="js-task-list-completed">
                        <div v-for="(item, index) in tareasCompletas" :key="index" class="js-task block block-rounded mb-5 animated fadeIn" data-task-completed="true" data-task-starred="false">
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
                                        <button @click="verTarea(item)" class="btn btn-lg btn-circle mr-5 mb-5" style="background-color: #f76c6f;" type="button">
                                            <i class="fa fa-eye" style="color: white;"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody></table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mt-4">
                <div class="mt-4">
                    <div class="detalles-tarea">
                        <h5>{{ tarea.name }}</h5>
                        <p style="display: block; font-size: 10px;">{{ tarea.category }}</p>
                        <p>{{ tarea.slug }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row js-appear-enabled animated fadeIn mt-4" data-toggle="appear">
            <div class="col-md-6 col-xl-3"></div>
            <div class="col-6 col-xl-3">
                <a class="block block-link-shadow text-right" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix" style="background-color: #EE656D;">
                        <div class="float-left mt-10 d-none d-sm-block">
                            <i class="si si-check fa-3x text-body-bg-dark"></i>
                        </div>
                        <div class="font-size-h3 font-w600 js-count-to-enabled" data-toggle="countTo" data-speed="1000" data-to="1500" style="color: white;">{{ tareasCompletas.length }}</div>
                        <div class="font-size-sm font-w600 text-uppercase" style="color: white;">Completadas</div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-xl-3">
                <a class="block block-link-shadow text-right" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix" style="background-color: #EE656D;">
                        <div class="float-left mt-10 d-none d-sm-block">
                            <i class="si si-close fa-3x text-body-bg-dark"></i>
                        </div>
                        <div class="font-size-h3 font-w600 js-count-to-enabled" data-toggle="countTo" data-speed="1000" data-to="1500" style="color: white;">{{ tareasPendientes.length }}</div>
                        <div class="font-size-sm font-w600 text-uppercase" style="color: white;">Pendientes</div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3"></div>
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