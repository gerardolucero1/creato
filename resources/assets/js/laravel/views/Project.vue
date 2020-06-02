<style scoped>
    *{
        margin: 0;
        padding: 0;
    }

    h2{
        font-family: Bodoni;
        font-weight: lighter;
        letter-spacing: 1px;
    }

    .menu{
        color: white;
        margin-left: 5px;
        margin-top: 2px;
    }

    .box-container{
        background-color: white;
        width: 100vw;
        height: 100vh;
        padding: 50px 50px;
        background-image: url('/images/textura.png');
        background-size: cover;
        background-position: center;
        position: relative;
    }

    .box-main{
        width: 100%;
        height: calc(100vh - 100px);
    }

    .main-menu-container{
        width: 100%;
        height: 50px;
        background-color: #E7D5CD;
        display: flex;
        justify-content: space-between;
    }

    .main-menu-btn{
        display: flex;
        justify-content: flex-start;
        align-items: center;
        padding-left: 10px;
    }

    .main-menu-logo{
        display: flex;
        justify-content: flex-start;
        align-items: center;
        padding-right: 10px;
        margin-top: -8px;
    }

    .main-menu-btn p{
        font-family: Bodoni;
        font-size: 22px;
        font-weight: lighter;
        letter-spacing: 1px;
        color: white;
        text-shadow: 1px 1px 10px #707070;
    }

    .main-menu-logo img{
        margin-top: 8px;
        width: 40px;
    }

    .box-content{
        width: 100%;
        height: calc(100vh - 150px);
        /* display: flex;
        flex-direction: column;
        justify-content: space-between; */
    }

    .box-tag-container{
        background-color: #E7D5CD;
        padding: 20px 50px;
        margin-left: -50px;
        color: #545454;
    }

    .box-content .box-1{
        height: calc((100vh - 150px) / 5.5);
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .box-content .box-2{
        height: calc((100vh - 150px) / 1.2);
    }

    .box-content .box-2 p{
        font-family: Bodoni;
        font-size: 1.1em;
    }

    .project-title{
        color: white;
        background-color: #BEC1C8;
        padding: 0.2em 0.6em;
        font-family: Bodoni;
        font-size: 1.2em;
        font-weight: lighter;
        letter-spacing: 1px;
        text-shadow: 1px 1px 10px #707070;
        display: inline-block;
        text-align: center;
        width: 14em;
    }

    .arrow{
        font-size: 40px;
        color: #5D5D5D;
        cursor: pointer;
    }

    .menu-container{
        background-color: #C8CECE;
        position: absolute;
        top: 0;
        left: 0;
        margin-top: 100px;
        padding: 10px;
        visibility: hidden;
        z-index: 1000;
    }

    .active{
        visibility: visible;
    }

    .menu-container ul{
        margin-left: 40px;
        list-style: none;
    }

    .menu-container ul li{
        font-family: Bodoni;
        font-weight: lighter;
        letter-spacing: 1px;
        color: white;
        text-shadow: 1px 1px 10px #707070;
        cursor: pointer;
    }

    .menu-container ul li a{
        color: white;
    }

    .menu-container ul li a{
        color: white;
    }

    .menu-container ul li a:hover{
        text-decoration: none;
    }

    .main-menu-btn:hover{
        cursor: pointer;
    }

    /* Responsive */
    @media only screen and (max-width: 600px) {

        h2{
            text-align: center;
        }

        .project-title{
            margin-top: 20px;
            width: 100%;
        }

        .box-content .box-1{
            height: calc((100vh - 150px) / 5.5);
            display: block;
            
        }

        .box-2{
            margin-top: 50px;
        }

    }

    @media only screen 
    and (min-device-width: 375px) 
    and (max-device-width: 812px) 
    and (-webkit-min-device-pixel-ratio: 3)
    and (orientation: portrait) { 
        
    }

</style>

<template>
    <section class="box-container">
        <div class="box-main">
            <div class="main-menu-container">
                <div class="main-menu-btn" @mouseover="menu = true" @mouseleave="menu = false">
                    <p>menú</p>
                    <i class="menu fas fa-bars"></i>
                </div>
                <div class="main-menu-logo">
                    <router-link to="/">
                        <img src="/images/creato-logo-2.png" alt="">
                    </router-link>
                </div>
            </div>

            <div class="box-content">
                <section class="menu-container" :class="[menu ? 'active' : '']" @mouseover="menu = true" @mouseleave="menu = false">
                    <ul>
                        <li>
                            <router-link to="/">- inicio</router-link>
                        </li>
                        <li>
                            <router-link to="/about">- nosotros</router-link>
                        </li>
                        <li>
                            <router-link to="/projects">- proyectos</router-link>
                        </li>
                        <li>
                            <router-link to="/contact">- contacto</router-link>
                        </li>
                        <li>
                            <a href="/login">- novias creato</a>
                        </li>
                    </ul>
                </section>
                <div v-if="project != null" class="row box-1">
                    <h2>Galeria de Proyectos</h2>
                    <p class="project-title">{{ project.title }}</p>
                </div>
                <div v-if="project != null" class="row box-2">
                    <gallery :images="images" :index="index" @close="index = null"></gallery>
                    <div class="col-1 col-md-1 arrow-content d-flex justify-content-start align-items-center">
                        <i v-show="count != 1" class="arrow fas fa-caret-left" @click="count--"></i>
                    </div>
                    <div
                        class="col-2 col-md-2"
                        v-for="(image, imageIndex) in images"
                        :key="imageIndex"
                        @click="index = imageIndex"
                        style="cursor: pointer;"
                        :style="{ backgroundImage: 'url(' + image + ')', height: 'calc((100vh - 150px) / 1.2)' }"
                    ></div>
                    <div class="col-1 col-md-1 arrow-content d-flex justify-content-end align-items-center">
                        <i v-show="count != lastPage" class="arrow fas fa-caret-right" @click="count++"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import VueGallery from 'vue-gallery';

export default {
    name: 'Project',

    data: function () {
        return {
            images: [
            // 'https://www.viajejet.com/wp-content/viajes/Lago-Moraine-Parque-Nacional-Banff-Alberta-Canada-1440x810.jpg',
            // 'https://www.dzoom.org.es/wp-content/uploads/2017/07/seebensee-2384369-810x540.jpg',
            // 'https://images.samsung.com/is/image/samsung/p5/uk/explore/photography/lighting/landscape_photography/Explore_How_To_Take_Great_Landscape_Photography_KV.jpg',
            // 'https://img.vixdata.io/pd/jpg-large/es/sites/default/files/imj/p/paisajes-espectaculares-del-mundo-1.jpg',
            // 'https://ep01.epimg.net/elpais/imagenes/2018/03/01/album/1519910473_492871_1519910821_noticia_normal.jpg',
            ],
            index: null,
            menu: false,
            project: null,
            count: 1,
            lastPage: null
        };
    },

    components: {
      'gallery': VueGallery
    },

    mounted(){
        this.getProject()
        this.getProjectImages()
    },

    watch:{
        count(){
            this.getProjectImages()
        }
    },

    computed: {

    },

    methods: {
        async getProject(){
            try {
                let URL = `/api/projects/${this.$route.params.id}`
                let response = await axios.get(URL)

                if (response) {
                    this.project = response.data
                    // this.project.images.forEach(element => {
                    //     this.images.push(element.file_name)
                    // });
                }
            } catch (error) {
                console.log(error)
            }
        },

        async getProjectImages(){
            try {
                this.images = []
                let URL = `/api/projects/${this.$route.params.id}/images?page=${this.count}`
                let response = await axios.get(URL)

                if (response) {
                    console.log(response.data)
                    this.lastPage = response.data.last_page
                    response.data.data.forEach(element => {
                        this.images.push(element.file_name)
                    });
                }
            } catch (error) {
                console.log(error)
            }
        }
    }
}
</script>