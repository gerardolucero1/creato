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
        background-color: black;
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
        background-color: red;
        width: 100%;
        height: calc(100vh - 150px);
        display: flex;
        justify-content: flex-start;
        align-items: center;
    }

    .box-tag-container{
        background-color: #E7D5CD;
        padding: 20px 50px;
        margin-left: -50px;
        color: #545454;
    }

    .box-tag-container p:nth-child(1){
        font-size: 40px;
    }

    .box-tag-container p:nth-child(2){
        font-size: 16px;
        text-align: center;
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
                <div class="box-tag-container">
                    <p>CREATO.MX</p>
                    <p>event design</p>
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

        }
    },

    computed: {

    },

    methods: {

    }
}
</script>