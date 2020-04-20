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
    }

    h3{
        font-family: Bodoni;
        font-weight: lighter;
        letter-spacing: 1px;
        font-style: italic;
        font-size: 23px;
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
        display: flex;
        flex-direction: column;
        justify-content: space-around;
    }

    .box-about-img {
        width: 100%;
        padding-top: 85%; /* 1:1 Aspect Ratio */
        position: relative; /* If you want text inside of it */
        background-position: center;
        background-size: cover;
    }

    .project-name-container{
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    .project-name-container p{
        color: white;
        background-color: #BEC1C8;
        padding: 5px 25px;
        text-align: center;
        font-family: Bodoni;
        font-size: 20px;
        font-weight: lighter;
        letter-spacing: 1px;
        text-shadow: 1px 1px 10px #707070;
        width: 250px;
        margin-right: -125px;
    }

    .arrow{
        font-size: 40px;
        color: #5D5D5D;
    }
</style>

<template>
    <section class="box-container">
        <div class="box-main">
            <div class="main-menu-container">
                <div class="main-menu-btn">
                    <p>menú</p>
                    <i class="menu fas fa-bars"></i>
                </div>
                <div class="main-menu-logo">
                    <img src="/images/logo.png" alt="">
                </div>
            </div>

            <div class="box-content">
                <div class="row">
                    <div class="col-md-3">
                        <div class="box-content-projects">
                            <div class="row">
                               <div class="col-md-12">
                                    <div class="box-about-img" style="background-image: url('/images/index.png');">
                                        <div class="project-name-container">
                                            <p>daniela + jacobo</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <i class="arrow fas fa-caret-left"></i>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box-about-img" style="background-image: url('/images/index.png');">

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
                                <div class="col-md-12 mt-5" style="padding-left: 30%; padding-right: 30%;">
                                    <h3 class="text-left">Your love story</h3>
                                    <h3 class="text-right">begins here...</h3>
                                </div>
                            </div>
                            <div class="row" style="display: flex; justify-content: center;">
                                <div class="col-md-6">
                                    <div class="box-about-img" style="background-image: url('/images/index.png');">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-content-projects">
                            <div class="row">
                               <div class="col-md-12">
                                    <div class="box-about-img" style="background-image: url('/images/index.png');">

                                    </div>
                                </div>
                            </div>
                            <div class="row" style="display: flex; justify-content: flex-end;">
                                <i class="arrow fas fa-caret-right"></i>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box-about-img" style="background-image: url('/images/index.png');">

                                    </div>
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
    name: 'Projects',

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