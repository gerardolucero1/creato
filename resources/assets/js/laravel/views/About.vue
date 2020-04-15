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
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .box-tag-container{
        background-color: #E7D5CD;
        padding: 20px 50px;
        margin-left: -50px;
        color: #545454;
    }

    .box-content .row:nth-child(1) p{
        font-family: Bodoni;
        margin-top: 25px;
        font-size: 25px;
    }

    .box-content .row:nth-child(2) p{
        font-family: Bodoni;
        font-size: 17px;
    }

    .box-content .row:nth-child(3) p{
        font-family: Bodoni;
        font-size: 18px;
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
                        <p>Acerca de Nosotros</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>Somos una firma mexicana de talentos enfocada en crear experiencias unicas. Tomamos tu inspiracion y emocion para moldear el diseño de tus eventos; escucharte y entenderte nos permite materializar tus sueños y reflejar tu escencia en cada elemento.</p>
                        <br>
                        <p>Planeamos y estructuramos cada uno de los aspectos tecnicos para que el proceso de creacion sea sinonimo de tranquilidad y, sobre todo, felicidad. Ejecutamos cada detalle minusculo para que en su conjunto logremos la espectacularidad que te mereces.</p>
                        <br>
                        <p>Creato es creacion; diseño de vanguardia; propuestas que buscan innovar, evolucionar e integrar; buscamos el sentido propio de cada quien partiendo de la personalidad de cada ser humano.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="box-about-img" style="background-image: url('/images/paola.png');">

                        </div>
                        <p class="text-center">Ana Paola</p>
                    </div>
                    <div class="col-md-3">
                        <div class="box-about-img" style="background-image: url('/images/maria.png');">

                        </div>
                        <p class="text-center">Ana Maria</p>
                    </div>
                    <div class="col-md-3">
                        <div class="box-about-img" style="background-image: url('/images/gerardo.png');">

                        </div>
                        <p class="text-center">Gerardo</p>
                    </div>
                    <div class="col-md-3">
                        <div class="box-about-img" style="background-image: url('/images/todos.png');">

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

        }
    },

    computed: {

    },

    methods: {

    }
}
</script>