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

    h3{
        font-family: Bodoni;
        font-weight: lighter;
        letter-spacing: 1px;
        font-style: italic;
        font-size: 1.3em;
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
        background-repeat: repeat-y;
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
    }

    .box-tag-container{
        background-color: #E7D5CD;
        padding: 20px 50px;
        margin-left: -50px;
        color: #545454;
    }

    .box-content .formulario label{
        width: 100px;
        font-family: Bodoni;
        font-size: 17px;
        font-weight: lighter;
        letter-spacing: 2px;
        margin-top: 20px;
    }

    .box-content .formulario input, textarea{
        background-color: transparent;
        border: none;
        border-bottom: 1px solid black;
        border-radius: 0;
        width: 80%;
        margin-top: 10px;
    }

    .box-social-media p{
        font-family: Bodoni;
        font-size: 14px;
        font-weight: lighter;
        letter-spacing: 1px;
        font-style: italic;
    }

    .box-about-img {
        width: 100%;
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
                    <img src="/images/logo.png" alt="">
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
                    </ul>
                </section>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2>Nos encantaria escuchar de ti</h2>
                        <div class="col-md-12 mt-5">
                            <h3 class="text-center">Contactanos para obtener mas informacion de nosotros y nuestros servicios.</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 formulario">
                        <form action="">
                            <div class="d-flex">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="d-flex">
                                <label for="">Correo</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="d-flex">
                                <label for="">Celular</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="d-flex">
                                <label for="">Mensaje</label>
                                <textarea class="form-control" name="message" id="" cols="30" rows="10"></textarea>
                            </div>
                        </form>
                        <div class="row box-social-media mt-3">
                            <div class="col-md-12 d-flex flex-column justify-content-center align-items-center">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img class="mr-1" src="/images/logo-fb.png" alt="">
                                    <img class="ml-1" src="/images/logo-insta.png" alt="">
                                </div>
                                <p>@creato.mx</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="box-about-img" style="background-image: url('/images/index.png');">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'Contact',

    data(){
        return{
            menu: false,
        }
    },

    computed: {

    },

    methods: {

    }
}
</script>