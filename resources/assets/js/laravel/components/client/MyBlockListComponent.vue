<style>
    .todo{
        width: 100%;
        padding: 10px 5px 5px 65px;
        border: 1px solid rgba(228, 231, 237, 1);
        transition: all .5s;
    }

    .todo:hover{
        background-color: rgba(207, 208, 208, .4);
        cursor: pointer;
    }

    .todo p{
        line-height: 10px;
    }

    .title-todo{
        font-size: 19px;
    }

    .category-todo{
        font-size: 14px;
    }

    .ribbon-primary.ribbon-bookmark.ribbon-left .ribbon-box::before {
        border-color: #E59169;
        border-right-color: transparent;
    }
</style>

<template>
    <section class="row">
        <div class="col-md-9">
            <div class="block-rounded">
                <div class="block-header">
                    <h3 class="block-title" style="font-size: 1.5em;">Próximas tareas</h3>
                </div>
                <div>

                    <div v-if="listas.length != 0" class="block-content" style="margin: 0; padding: 0;">
                        <div class="todo ribbon ribbon-left ribbon-bookmark ribbon-primary" v-for="(item, index) in listas" :key="index">
                            <div class="ribbon-box" style="background-color: #E59169;">
                                <span v-if="tareasPendientes(item) == 0">
                                    <i class="fa fa-fw fa-check"></i>
                                </span>
                                <span v-else>
                                    {{ tareasPendientes(item) }}
                                </span>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <p class="title-todo">
                                        {{ item.name }}
                                    </p>
                                    <label class="category-todo" style="background-color: #D9D9D9; padding: 2px; font-size: 11px;">{{ item.slug }}</label>
                                </div>
                                <div class="col-md-2 text-center">
                                    <a :href="'cliente/tareas/' + item.id" type="button" class="btn btn-lg btn-circle mr-5 mb-5" style="background-color: #f76c6f;">
                                        <i class="fa fa-eye" style="color: white;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p v-else>Aun no tienes ninguna lista asignada</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="block-rounded">
                <div class="block-header">
                    <h3 class="block-title" style="font-size: 1.5em;">Mis listas</h3>
                </div>
                <div style="border: none;">
                    <ul class="list-group push">
                        <li class="list-group-item">
                            <span class="js-task-badge badge badge-primary float-right animated bounceIn">{{ listasActivas }}</span>
                            Activas
                        </li>
                        <li class="list-group-item">
                            <span class="js-task-badge-completed badge badge-success float-right animated bounceIn">{{ listasCompletadas }}</span>
                            Completadas
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import auth from "../../mixins/auth";

export default {
    data(){
        return{
            listas: [],
        }
    },
    mixins: [
        auth
    ],
    created(){
        this.obtenerListas()
    },
    computed: {
        listasActivas: function(){
            let contador = 0

            this.listas.forEach((element) => {
                let tareas = element.tasks.length
                let terminadas = 0

                // if(tareas == 0){
                //     contador++
                // }

                element.tasks.forEach((item) => {
                    if(item.complete){
                        terminadas++
                    }
                })
                if(terminadas != tareas){
                    contador++
                }
            })

            return contador
        },

        listasCompletadas: function(){
            let contador = 0

            this.listas.forEach((element) => {
                let tareas = element.tasks.length
                let terminadas = 0

                // if(tareas == 0){
                //     contador--
                // }

                element.tasks.forEach((item) => {
                    if(item.complete){
                        terminadas++
                    }
                })
                if(terminadas == tareas){
                    contador++
                }
            })

            return contador
        },

    },
    methods: {
        obtenerListas: function(){
            let URL = 'cliente/obtener-listas/' + this.user.id

            axios.get(URL).then((response) => {
                this.listas = response.data
            })
        },

        tareasPendientes: function(item){
            if(item.tasks == 0){
                return 0
            }

            let contador = 0

            item.tasks.forEach((element) => {
                if(!element.complete){
                    contador++
                }
            })

            return contador
        }
    }
}
</script>