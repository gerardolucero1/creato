<template>
    <section>
        <video src="/videos/video-home.mp4" width="100%" autoplay loop muted></video>
        <div class="layer">
            <img class="creato-logo" src="https://img1.wsimg.com/isteam/ip/c61c6bbe-8c4b-487a-8931-330fb513cba4/logo/cf928107-e87c-4e5b-b2a9-50d94529bfbe.png" alt="Creato-studio-logo">
        </div>
    </section>
</template>

<script>
export default {

}
</script>

<style scoped>
    video{
        min-width: 100vw;
        height: 100%;
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
        top: 0;
        left: 0;
        /*background-color: rgba(255, 255, 255, 0.3);*/
        background-color: rgba(0, 0, 0, 0.8);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .layer .creato-logo{
        width: 500px;
        filter: invert(50) sepia(1) hue-rotate(0deg) saturate(1000%);
    }
</style>