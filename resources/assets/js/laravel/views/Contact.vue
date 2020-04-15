<style scoped>
    *{
        margin: 0;
        padding: 0;
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

    .box-content .row:nth-child(1) p:nth-child(1){
        font-family: Bodoni;
        margin-top: 25px;
        font-size: 25px;
        font-weight: lighter;
        letter-spacing: 2px;
    }

    .box-content .row:nth-child(1) p:nth-child(2){
        font-family: Bodoni;
        font-size: 17px;
        font-weight: lighter;
        font-style: italic;
        letter-spacing: 2px;
    }

    .box-content .row:nth-child(2){
        margin-top: 25px;
    }

    .box-content .row:nth-child(2) p{
        font-family: Bodoni;
        font-size: 17px;
    }

    .box-content .row:nth-child(2) label{
        width: 100px;
        font-family: Bodoni;
        font-size: 17px;
        font-weight: lighter;
        letter-spacing: 2px;
        margin-top: 20px;
    }

    .box-content .row:nth-child(2) input, textarea{
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
        width: 90%;
        padding-top: 90%; /* 1:1 Aspect Ratio */
        position: relative; /* If you want text inside of it */
        background-position: center;
        background-size: cover;
    }
</style>

<template>
    <section class="box-container">
        <div class="box-main">
            <div class="main-menu-container">
                <div class="main-menu-btn">
                    <p>menú</p>
                    <i class="fas fa-bars"></i>
                </div>
                <div class="main-menu-logo">
                    <img src="/images/logo.png" alt="">
                </div>
            </div>

            <div class="box-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p>Nos encantaria escuchar de ti</p>
                        <p>Contactanos para obtener mas informacion de nosotros y nuestros servicios.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7">
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
                        <div class="row box-social-media">
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

        }
    },

    computed: {

    },

    methods: {

    }
}
</script>