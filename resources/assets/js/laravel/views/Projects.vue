<style scoped>
    *{
        margin: 0;
        padding: 0;
    }

    .menu{
        color: white;
        margin-left: 5px;
        margin-top: 2px;
    }

    h2{
        font-family: Bodoni;
        font-weight: lighter;
        letter-spacing: 1px;
        font-size: 2.3em;
        padding-top: 0.8em;
    }

    h3{
        font-family: Bodoni;
        font-weight: lighter;
        letter-spacing: 1px;
        font-style: italic;
        font-size: 1.7em;
    }

    .box-container{
        background-color: white;
        width: 100vw;
        height: 100vh;
        padding: 50px 50px;
        background: linear-gradient(rgba(255,255,255,.4), rgba(255,255,255,.4)), url('/images/textura.png');
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
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .box-content-projects{
        width: 100%;
        height: calc(100vh - 150px);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .box-content-projects-center{
        width: 100%;
        height: calc(100vh - 150px);
        /* display: flex;
        flex-direction: column;
        justify-content: space-around; */
    }

    .box-about-img {
        width: 100%;
        padding-top: 85%; /* 1:1 Aspect Ratio */
        position: relative; /* If you want text inside of it */
        background-position: center;
        background-size: cover;
        cursor: pointer;
    }

    .box-about-img img {
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

    .box-about-img:hover img{
        -webkit-filter: grayscale(0%);
        -moz-filter: grayscale(0%);
        filter: grayscale(0%);
    }

    .project-name-container-right{
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    .project-name-container-right p{
        color: white;
        background-color: #BEC1C8;
        padding: 0.2em 0.6em;
        text-align: center;
        font-family: Bodoni;
        font-size: 1.2em;
        font-weight: lighter;
        letter-spacing: 1px;
        text-shadow: 1px 1px 10px #707070;
        width: 14em;
        margin-right: -7em;
    }

    .project-name-container-left{
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        display: flex;
        justify-content: flex-start;
        align-items: center;
    }

    .project-name-container-left p{
        color: white;
        background-color: red;
        padding: 0.2em 0.6em;
        text-align: center;
        font-family: Bodoni;
        font-size: 1.2em;
        font-weight: lighter;
        letter-spacing: 1px;
        text-shadow: 1px 1px 10px #707070;
        width: 14em;
        margin-left: -7em;
    }

    .project-name-container-center{
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        display: flex;
        justify-content: center;
        align-items: flex-end;
    }

    .project-name-container-center p{
        color: white;
        background-color: blue;
        padding: 0.2em 0.6em;
        text-align: center;
        font-family: Bodoni;
        font-size: 1.2em;
        font-weight: lighter;
        letter-spacing: 1px;
        text-shadow: 1px 1px 10px #707070;
        width: 12em;
        margin-bottom: -5%;
        transform: rotate(90deg);
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

    .box-web{
        display: flex;
    }

    .box-movil{
        display: none;
    }

    /* Responsive */
    @media only screen and (max-width: 600px) {
        .box-web{
            display: none;
        }

        .box-movil{
            display: block;
        }

        h2{
            padding-top: 0;
        }

        .project-name-container-right p{
            margin-right: 0em;
        }

        .box-movil .col-md-12{
            margin-top: 20px;
        }

        .box-movil .col-md-12:nth-child(1){
            margin-top: 0;
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
            <div class="main-menu-container" :style="myStyle">
                <div class="main-menu-btn" @mouseover="menu = true" @mouseleave="menu = false">
                    <p>Menú</p>
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
                            <router-link to="/">- Inicio</router-link>
                        </li>
                        <li>
                            <router-link to="/about">- Nosotros</router-link>
                        </li>
                        <li>
                            <router-link to="/projects">- Proyectos</router-link>
                        </li>
                        <li>
                            <router-link to="/contact">- Contacto</router-link>
                        </li>
                        <li>
                            <a href="/login">- Novias Creato</a>
                        </li>
                    </ul>
                </section>
                <div v-if="projects != null" class="row box-web">
                    <div class="col-md-3">
                        <div class="box-content-projects">
                            <div class="row">
                                <div v-if="projects.data.length > 0" class="col-md-12" @click="goToProject(projects.data[0].id)">
                                    <!-- <div class="box-about-img" :style="{ backgroundImage: 'url(' + projects.data[0].banner + ')' }"> -->
                                    <div class="box-about-img">
                                        <img :src="projects.data[0].banner" width="100%" alt="">
                                        <div class="project-name-container-right">
                                            <p style="background-color: #BEC1C8;">{{ projects.data[0].title }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <i v-show="count != 1" class="arrow fas fa-caret-left" @click="count--"></i>
                            </div>
                            <div class="row">
                                <div v-if="projects.data.length > 2" class="col-md-12" @click="goToProject(projects.data[2].id)">
                                    <!-- <div class="box-about-img" :style="{ backgroundImage: 'url(' + projects.data[2].banner + ')' }"> -->
                                    <div class="box-about-img">
                                        <img :src="projects.data[2].banner" width="100%" alt="">
                                        <div class="project-name-container-right">
                                            <p style="background-color: #C3A18F;">{{ projects.data[2].title }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="box-content-projects-center">
                            <div class="row">
                               <div class="col-md-12 text-center">
                                    <h2>Galeria de Proyectos</h2>
                                </div>
                                <div class="col-md-12" style="margin-top: 2em;">
                                    <h3 class="text-center" style="margin-left: -2.5em;">Your love story</h3>
                                    <h3 class="text-center" style="margin-right: -2.5em;">begins here...</h3>
                                </div>
                            </div>
                            <div class="row" style="display: flex; justify-content: center; margin-top: calc((100vh - 150px) / 7);">
                                <div v-if="projects.data.length > 4" class="col-md-6" @click="goToProject(projects.data[4].id)">
                                    <!-- <div class="box-about-img" :style="{ backgroundImage: 'url(' + projects.data[4].banner + ')' }"> -->
                                    <div class="box-about-img">
                                        <img :src="projects.data[4].banner" width="100%" alt="">    
                                        <div class="project-name-container-center">
                                            <p style="background-color: #C8CECE;">{{ projects.data[4].title }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-content-projects">
                            <div class="row">
                               <div v-if="projects.data.length > 1" class="col-md-12" @click="goToProject(projects.data[1].id)">
                                    <!-- <div class="box-about-img" :style="{ backgroundImage: 'url(' + projects.data[1].banner + ')' }"> -->
                                    <div class="box-about-img">
                                        <img :src="projects.data[1].banner" width="100%" alt="">
                                        <div class="project-name-container-left">
                                            <p style="background-color: #B8AEA3;">{{ projects.data[1].title }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="display: flex; justify-content: flex-end;">
                                <i v-show="count != lastPage" class="arrow fas fa-caret-right" @click="count++"></i>
                            </div>
                            <div class="row">
                                <div v-if="projects.data.length > 3" class="col-md-12" @click="goToProject(projects.data[3].id)">
                                    <!-- <div class="box-about-img" :style="{ backgroundImage: 'url(' + projects.data[3].banner + ')' }"> -->
                                    <div class="box-about-img">
                                        <img :src="projects.data[3].banner" width="100%" alt="">
                                        <div class="project-name-container-left">
                                            <p style="background-color: #EDE3D8;">{{ projects.data[3].title }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if="projects != null" class="row box-movil">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h2>Galeria de Proyectos</h2>
                            </div>
                            <div class="col-md-12">
                                <h3 class="text-center">Your love story</h3>
                                <h3 class="text-center">begins here...</h3>
                            </div>
                        </div>
                    </div>

                    <div v-if="projects.data.length > 0" class="col-md-12" @click="goToProject(projects.data[0].id)">
                        <!-- <div class="box-about-img" :style="{ backgroundImage: 'url(' + projects.data[0].banner + ')' }"> -->
                        <div class="box-about-img">
                            <img :src="projects.data[0].banner" width="100%" alt="">
                            <div class="project-name-container-right">
                                <p style="background-color: #BEC1C8;">{{ projects.data[0].title }}</p>
                            </div>
                        </div>
                    </div>

                    <div v-if="projects.data.length > 2" class="col-md-12" @click="goToProject(projects.data[2].id)">
                        <!-- <div class="box-about-img" :style="{ backgroundImage: 'url(' + projects.data[2].banner + ')' }"> -->
                        <div class="box-about-img">
                            <img :src="projects.data[2].banner" width="100%" alt="">
                            <div class="project-name-container-right">
                                <p style="background-color: #C3A18F;">{{ projects.data[2].title }}</p>
                            </div>
                        </div>
                    </div>

                    <div v-if="projects.data.length > 4" class="col-md-12" @click="goToProject(projects.data[4].id)">
                        <!-- <div class="box-about-img" :style="{ backgroundImage: 'url(' + projects.data[4].banner + ')' }"> -->
                        <div class="box-about-img">
                            <img :src="projects.data[4].banner" width="100%" alt="">    
                            <div class="project-name-container-right">
                                <p style="background-color: #C8CECE;">{{ projects.data[4].title }}</p>
                            </div>
                        </div>
                    </div>

                    <div v-if="projects.data.length > 1" class="col-md-12" @click="goToProject(projects.data[1].id)">
                        <!-- <div class="box-about-img" :style="{ backgroundImage: 'url(' + projects.data[1].banner + ')' }"> -->
                        <div class="box-about-img">
                            <img :src="projects.data[1].banner" width="100%" alt="">
                            <div class="project-name-container-right">
                                <p style="background-color: #B8AEA3;">{{ projects.data[1].title }}</p>
                            </div>
                        </div>
                    </div>

                    <div v-if="projects.data.length > 3" class="col-md-12" @click="goToProject(projects.data[3].id)">
                        <!-- <div class="box-about-img" :style="{ backgroundImage: 'url(' + projects.data[3].banner + ')' }"> -->
                        <div class="box-about-img">
                            <img :src="projects.data[3].banner" width="100%" alt="">
                            <div class="project-name-container-right">
                                <p style="background-color: #EDE3D8;">{{ projects.data[3].title }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-5 d-flex justify-content-end">
                                <i v-show="count != 1" class="arrow fas fa-caret-left" @click="count--"></i>
                            </div>
                            <div class="col-2" />
                            <div class="col-5 d-flex justify-content-sart">
                                <i v-show="count != lastPage" class="arrow fas fa-caret-right" @click="count++"></i>
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
    name: 'Projects',

    data(){
        return{
            menu: false,
            projects: null,
            count: 1,
            lastPage: null,
            myStyle: {
                backgroundColor: " "
            },
        }
    },

    mounted(){
        this.getProjects();
        this.obtenerDatos();
    },

    watch:{
        count(){
            this.getProjects()
        }
    },

    computed: {
        
    },

    methods: {
        obtenerDatos: function(){
                let URL = '/index';
                axios.get(URL).then((response)=>{
                    this.imagenes = response.data;
                    this.myStyle.backgroundColor =response.data.config.color;
                });     
        },
        async getProjects(){
            try{
                this.projects = null
                let URL = `/api/projects?page=${this.count}`
                let response = await axios.get(URL)
                if (response) {
                    this.projects = response.data
                    this.lastPage = response.data.last_page
                    console.log(response.data)
                }
            }
            catch(e){
                console.log(e)
            }
        },

        goToProject(id){
            this.$router.push({ name: 'project', params: { id: id } })
        }
    }
}
</script>