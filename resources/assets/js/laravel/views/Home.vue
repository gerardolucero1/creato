<template>
    <section>
        <!--
        <video src="/videos/video-home.mp4" width="100%" autoplay loop muted></video>
        -->
        <img src="https://i1.wp.com/varaeventos.com/wp-content/uploads/2017/06/tendencias-bodas-2019-1024x768.jpg" width="100%" alt="">
        <div class="layer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <p class="text-left"><span class="text-main">Creamos</span> <span class="text">diseños</span></p>
                        <p class="text-right"><span class="text-main">cumpliendo tus</span> <span class="text">sueños</span></p>
                    </div>
                </div>
            </div>

            <div class="main-btns">
                <div>
                    <a href="#" class="main-links">NUESTROS PROYECTOS</a>
                    <a href="/dashboard" class="main-links">NOVIAS CREATO</a>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {

}
</script>

<style scoped>
    img{
        min-width: 100vw;
        height: 100vh;
        position: absolute;
        object-fit: cover;
        object-position: center;
        top: 0;
        left: 0;
    }

    .layer{
        width: 100vw;
        height: 100vh;
        position: absolute;
        left: 0;
        top: 0;
        background-color: rgba(0, 0, 0, 0.3);
        display: flex;
        justify-content: center;
        align-items: center;
        
    }

    .layer p{
        font-size: 4.2em;
        color: rgba(232, 215, 207, 1);
        line-height: 0.7em;
    }

    .layer .text-main{
        font-family: 'Unna', serif;
    }

    .layer .text{
        font-family: 'Cormorant', serif;
    }

    .main-btns{
        position: absolute;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: flex-end;
        padding-bottom: 50px;
    }

    .main-btns a{
        display: block;
        text-align: center;
        text-decoration: none;
        padding: 20px 30px;
        color: rgba(232, 215, 207, 1);
        font-family: 'DM Serif Text', serif;
        font-size: 15px;
        letter-spacing: 4px;
        text-shadow: 1px 1px 2px rgba(106, 105, 105, 0.5);
        transition: all 0.4s;
    }

    .main-btns a:hover{
        color: black;
        background-color: rgba(232, 215, 207, 1);
    }
</style>