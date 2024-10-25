<style scoped>
    *{
        margin: 0;
        padding: 0;
    }

    h2{
        font-family: Bodoni;
        font-weight: lighter;
        letter-spacing: 1px;
        font-size: 2.3em;
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
        /* position: relative; */
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

    .box-content .box-3 p{
        font-family: Bodoni;
        font-size: 1.1em;
    }

    .box-about-img {
        width: 90%;
        padding-top: 90%; /* 1:1 Aspect Ratio */
        position: relative; /* If you want text inside of it */
        background-position: center;
        background-size: cover;
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

        .box-2 p{
            text-align: justify;
        }

        .box-2 .row:nth-child(2){
            margin-top: 20px;
        }

        .box-about-img {
            width: 100%;
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

                <div class="row box-1">
                    <h2>Acerca de Nosotros</h2>
                </div>
                <div class="row box-2">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12" style="padding: 0 0; font-size: 1.0em;">
                                <p class="text-justify">Somos una firma mexicana de talentos enfocada en crear experiencias únicas. Tomamos tu inspiración y emoción para moldear el diseño de tus eventos; escucharte y entenderte nos permite materializar tus sueños y reflejar tu esencia en cada elemento.</p>
                                <br>
                                <p class="text-justify">Planeamos y estructuramos cada uno de los aspectos técnicos para que el proceso de creación sea sinónimo de tranquilidad y, sobre todo, felicidad. Ejecutamos cada detalle minúsculo para que en su conjunto logremos la espectacularidad que te mereces.</p>
                                <br>
                                <p class="text-justify">Creato es creación; diseño de vanguardia; propuestas que buscan innovar, evolucionar e integrar; buscamos el sentido propio de cada quien partiendo de la personalidad de cada ser humano.</p>
                            </div>
                        </div>

                        <div class="row mt-3" v-for="imagen in imagenes" :key="imagen.index">
                            <div class="col-12 col-md-3">
                                <div class="box-about-img" :style='{ backgroundImage: "url(" + imagen.nosotros1 + ")", }'>

                                </div>
                                <p class="text-center">Ana Paola</p>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="box-about-img" :style='{ backgroundImage: "url(" + imagen.nosotros2 + ")", }'>

                                </div>
                                <p class="text-center">Ana Maria</p>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="box-about-img" :style='{ backgroundImage: "url(" + imagen.nosotros3 + ")", }'>

                                </div>
                                <p class="text-center">Gerardo</p>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="box-about-img" :style='{ backgroundImage: "url(" + imagen.nosotros4 + ")", }'>

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
    name: 'About',

    data(){
        return{
            menu: false,
            imagenes:[],
            myStyle: {
                backgroundColor: " "
            },
        }
    },

    computed: {

    },
    created(){
            this.obtenerDatos();
        },

    methods: {
        obtenerDatos: function(){
                let URL = '/index';
                axios.get(URL).then((response)=>{
                    this.imagenes = response.data;
                    this.myStyle.backgroundColor =response.data.config.color;
                });     
        },
    }
}
</script>