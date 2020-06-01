<style>
    .container-gallery{
        background-color: red;
        width: 100%;
        padding-top: 100%; /* 1:1 Aspect Ratio */
        position: relative; /* If you want text inside of it */
    }

    /* If you want text inside of the container */
    .container-gallery img{
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        object-fit: cover;
        object-position: center;
        -webkit-filter: grayscale(100%);
        -moz-filter: grayscale(100%);
        filter: grayscale(100%);
        transition: all 0.5s ease;
    }

    .container-gallery:hover img{
        -webkit-filter: grayscale(0%);
        -moz-filter: grayscale(0%);
        filter: grayscale(0%);
    }
</style>

<template>
    <section class="container">
        <div class="block-rounded">
            <div class="bg-pattern" style="background-image: url('assets/media/various/bg-pattern-inverse.png');">
                <div class="py-20 text-center">
                    <h1 class="h3 mb-5">Avance de tu boda</h1>
                    <p class="mb-10 text-muted">
                        <em>Mira como va el progreso de tu boda en esta seccion</em>
                    </p>
                    <!-- <p>
                        Web Design and Development of ACME’s website. Brand identity as well as promo mobile app development for their projects.
                    </p> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div v-for="(item, index) in lists" :key="index">
                    <div class="todo ribbon ribbon-left ribbon-bookmark ribbon-primary" v-for="(item, index) in item.tasks" :key="index">
                        <div class="ribbon-box" style="background-color: #E59169;">
                             <span v-if="item.complete">
                                <i class="fa fa-fw fa-check"></i>
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <p class="title-todo">
                                    {{ item.name }}
                                </p>
                                <!-- <label class="category-todo" style="background-color: #D9D9D9; padding: 2px; font-size: 11px;">{{ item.category }}</label> -->
                            </div>
                            <div class="col-md-2 text-center">
                                <button type="button" class="btn btn-lg btn-circle mr-5 mb-5" style="background-color: #f76c6f;" @click="getEvidence(item)">
                                    <i class="fa fa-eye" style="color: white;"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="text-center" style="background-color: #EFEFEF; padding: 10px;">{{ taskSelected.name }}</h2>
                <div class="row">
                    <div class="col-md-12" style="margin-bottom: 20px">
                        <div class="row">
                            <div v-for="(item, index) in evidence" :key="index" class="col-4 col-md-4" style="margin-top: 20px">
                                <div class="container-gallery">
                                    <a data-fancybox="gallery" :href="item.image"><img :src="item.image" width="100%"></a>
                                </div>
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
    name: 'AdminTasks',

    data(){
        return{
            lists: [],
            taskSelected: {},
            evidence: [],
        }
    },

    mounted(){
        this.getLists()
    },

    methods: {
        async getLists(){
            try {
                let URL = '/cliente/get-admins-lists'
                let response = await axios.get(URL)

                if(response){
                    this.lists = response.data
                }
            } catch (error) {
                console.log(error)
            }
        },

        async getEvidence(args){
            this.taskSelected = args
            try {
                let URL = '/cliente/get-evidence/' + args.id
                let response = await axios.get(URL)

                if(response){
                    this.evidence = response.data
                }
            } catch (error) {
                console.log(error)
            }
        }
    }
}
</script>