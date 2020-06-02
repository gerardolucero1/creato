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

    .box-container{
        background-color: white;
        width: 100vw;
        height: 100vh;
        padding: 50px 50px;
        background-image: url('/images/textura.png');
        background-size: cover;
        background-position: center;
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
        display: flex;
        justify-content: flex-start;
        align-items: center;
        position: relative;
    }

    .box-tag-container{
        background-color: #E7D5CD;
        padding: 20px 50px;
        margin-left: -50px;
        color: #545454;
        z-index: 1000;
    }

    .box-tag-container p:nth-child(1){
        font-size: 40px;
    }

    .box-tag-container p:nth-child(2){
        font-family: Bodoni;
        font-weight: lighter;
        letter-spacing: 1px;
        font-size: 19px;
        text-align: center;
    }

    .menu-container{
        background-color: #C8CECE;
        position: absolute;
        top: 0;
        left: 0;
        margin-left: -50px;
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

    .video-container{
        /* background-color: red;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: calc(100vh - 150px); */
        background: #000;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: calc(100vh - 150px);
    }

    .video-container video{
        object-fit: cover;
        object-position: center;
        width: 100%;
        height: calc(100vh - 150px);
    }

    .btn-audio{
        position: absolute;
        bottom: 0;
        right: 0;
        visibility: hidden;
        width: 35px;
        height: 35px;
        border-radius: 100%;
        margin-bottom: 5px;
        margin-right: 5px;
        background-color: transparent;
        color: royalblue;
        border: 1px solid royalblue;
    }

    .video-container:hover .btn-audio{
        visibility: visible;
    }

    /* Responsive */
    @media only screen and (max-width: 600px) {

        .box-tag-container{
            display: none;
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
                    <img src="/images/creato-logo-2.png" alt="">
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
                <div class="video-container">
                    <video id="video-source" src="/videos/Creato_Web_2.webm" autoplay loop muted></video>
                    <button class="btn-audio" @click="videoSound">
                        <i v-if="!sound" class="fas fa-volume-mute"></i>
                        <i v-else class="fas fa-volume-up"></i>
                    </button>
                    <!-- <iframe src="https://player.vimeo.com/video/418283179?autoplay=1&loop=1&title=0&byline=0&portrait=0&background=1" frameborder="0" allow="fullscreen;" allowfullscreen></iframe> -->
                </div>
                
                <div class="box-tag-container">
                    <img src="/images/creato-logo-1.png" width="300px" alt="">
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'Inicio',

    data(){
        return{
            menu: false,
            sound: true,
        }
    },

    computed: {

    },

    methods: {
        videoSound(){
            let video = document.getElementById('video-source')
            this.sound = !this.sound
            video.muted = this.sound;
        }
    }
}
</script>