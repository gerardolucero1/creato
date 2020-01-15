<style>
    .todo{
        width: 100%;
        padding: 10px 5px 5px 65px;
        border-bottom: 1px solid rgba(228, 231, 237, 1);
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
</style>

<template>
    <section class="row">
        <div class="col-md-9">
            <div class="block block-bordered">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Lista de pendientes</h3>
                </div>
                <div v-if="listas.length != 0" class="block-content" style="margin: 0; padding: 0;">
                    <div class="todo ribbon ribbon-left ribbon-bookmark ribbon-primary" v-for="(item, index) in listas" :key="index">
                        <div class="ribbon-box">
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
                                <p class="category-todo">{{ item.slug }}</p>
                            </div>
                            <div class="col-md-2 text-center">
                                <a :href="'cliente/tareas/' + item.id" type="button" class="btn btn-lg btn-circle btn-alt-secondary mr-5 mb-5">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="block block-bordered">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Mis listas</h3>
                </div>
                <div class="block-content">
                    <ul class="list-group push">
                        <li class="list-group-item">
                            <span class="js-task-badge badge badge-primary float-right animated bounceIn">{{ listasActivas }}</span>
                            <i class="fa fa-fw fa-tasks mr-5"></i> Activas
                        </li>
                        <li class="list-group-item">
                            <span class="js-task-badge-starred badge badge-warning float-right animated bounceIn">2</span>
                            <i class="fa fa-fw fa-ban mr-5"></i> Omitidas
                        </li>
                        <li class="list-group-item">
                            <span class="js-task-badge-completed badge badge-success float-right animated bounceIn">{{ listasCompletadas }}</span>
                            <i class="fa fa-fw fa-check mr-5"></i> Completadas
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