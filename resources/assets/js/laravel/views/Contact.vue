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

    .box-content .box-2 label{
        width: 100px;
        font-family: Bodoni;
        font-size: 17px;
        font-weight: lighter;
        letter-spacing: 2px;
        margin-top: 20px;
    }

    .box-content .box-2 input, textarea{
        background-color: transparent;
        border: none;
        border-bottom: 1px solid black;
        border-radius: 0;
        width: 80%;
        margin-top: 10px;
    }

    .box-content .box-2 textarea{
        border: 1px solid black;
    }

    .box-content .box-2 textarea:focus{
        background-color: transparent;

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
        /* transition: all 0.5s ease; */
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

    .form-button{
        width: 80%;
        margin-top: 10px;
        border: 1px solid black;
        background-color: transparent;
        color: black;
        font-family: Bodoni;
        font-weight: lighter;
        letter-spacing: 1px;
    }

    .form-button:hover{
        background-color: #E7D5CD;
        color: black;
    }

    .input-special{
        display: flex;
    }

    /* .inputs{
        display: flex;
    } */

    /* Responsive */
    @media only screen and (max-width: 992px) {
        .inputs{
            display: block;
        }

        .box-content .box-1{
            flex-direction: row;
            margin-bottom: 10px;
        }

    }
    @media only screen and (max-width: 600px) {
        h2{
            text-align: center;
        }

        h3{
            margin-top: 20px;
            text-align: center;
        }

        .box-content .box-1{
            height: calc((100vh - 150px) / 5.5);
            display: block;
            
        }

        .box-2{
            margin-top: 120px;
        }

        .inputs{
            display: block;
        }

        .box-content .box-2 input, textarea{
            width: 100%;
        }

        .form-button{
            width: 100%;
        }

        .box-about-img{
            display: none;
        }

    }

    @media only screen 
    and (min-device-width: 375px) 
    and (max-device-width: 812px) 
    and (-webkit-min-device-pixel-ratio: 3)
    and (orientation: portrait) { 
        h2{
            text-align: center;
        }

        h3{
            margin-top: 20px;
            text-align: center;
        }

        .box-content .box-1{
            height: calc((100vh - 150px) / 5.5);
            display: block;
            
        }

        .box-2{
            margin-top: 120px;
        }

        .inputs{
            display: block;
        }

        .box-content .box-2 input, textarea{
            width: 100%;
        }

        .form-button{
            width: 100%;
        }

        .box-about-img{
            display: none;
        }
    }
</style>

<template>
    <section class="box-container">
        <div class="box-main">
            <div class="main-menu-container" :style="myStyle">
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
                <div class="row box-1">
                    <h2>Nos encantaría escuchar de ti</h2>
                    <h3>Contáctanos para obtener mas información de nosotros y nuestros servicios.</h3>
                </div>
                <div class="row box-2">
                    <div class="col-12 col-sm-12 col-md-7">
                        <form action="" @submit.prevent="sendEmail">
                            <div class="inputs">
                                <label for="">Nombre</label>
                                <input type="text" v-model="contact.name" required>
                            </div>
                            <div class="inputs">
                                <label for="">Correo</label>
                                <input type="email" v-model="contact.email" required>
                            </div>
                            <div class="inputs">
                                <label for="">Celular</label>
                                <input type="number" v-model="contact.telephone">
                            </div>
                            <div class="inputs input-special">
                                <label for="">Mensaje</label>
                                <textarea name="message" id="" cols="30" rows="10" v-model="contact.message" required></textarea>
                            </div>
                            <div class="inputs">
                                <label for="" style="visibility: hidden;">Mensaje</label>
                                <button class="form-button" type="submit">ENVIAR</button>
                            </div>
                        </form>
                        <div class="row box-social-media mt-3">
                            <div class="col-12 col-sm-12 col-md-12 d-flex flex-column justify-content-center align-items-center">
                                <div class="d-flex justify-content-center align-items-center">
                                    <a href="#" target="_blank">
                                        <img class="mr-1" src="/images/logo-fb.png" alt="">
                                    </a>
                                    <a href="#" target="_blank">
                                        <img class="ml-1" src="/images/logo-insta.png" alt="">
                                    </a>
                                    
                                </div>
                                <p>@creato.mx</p>
                            </div>
                        </div>
                    </div>
                        <div class="col-12 col-sm-12 col-md-5" style="background-image: url('/images/index.png'); background-position: center; background-size: cover;">
                            <!-- <div class="">
                                <img src="/images/index.png" width="100%" alt="">
                            </div> -->
                        </div>
                </div>
                <!-- <div class="row">
                    <div class="col-md-7">
                        <div class="form">
                            <form action="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Nombre</label>
                                        <input type="text" style="width: 90%;" v-model="contact.name" required> 
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Correo</label>
                                        <input type="email" style="width: 90%;" v-model="contact.email" required> 
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Celular</label>
                                        <input type="number" style="width: 90%;" v-model="contact.telephone">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Mensaje</label>
                                        <textarea style="width: 90%;" name="message" id="" cols="30" rows="10" v-model="contact.message" required></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <img src="/images/index.png" width="100%" alt="">
                    </div>
                </div> -->
            </div>
        </div>
    </section>
</template>

<script>
import { required, email } from 'vuelidate/lib/validators'

export default {
    name: 'Contact',

    data(){
        return{
            menu: false,
            contact: {
                name: '',
                email: '',
                telephone: '',
                message: ''
            },
            imagenes: [],
            myStyle: {
                backgroundColor: "",
            },
            myStyle2: {
                backgroundColor: "",
            },
        }
    },

    validations: {
        contact: {
            name: {
                required,
            },
            email: {
                required,
                email,
            },
        }
    },

    computed: {

    },
    created(){
            this.obtenerDatos();
        },

    methods: {
        sendEmail(){
            if(this.$v.contact.$invalid){
                console.log('Fallo')
                return
            }
            let URL = '/contact/send-email'
            axios.post(URL, this.contact).then((response) => {
                console.log('email enviado')
            })
        },
        obtenerDatos: function(){
                let URL = '/index';
                axios.get(URL).then((response)=>{
                    this.imagenes = response.data;
                    this.myStyle.backgroundColor =response.data.config.color;
                    this.myStyle2.backgroundColor =response.data.config.contact;
                });     
        },
    }
}
</script>