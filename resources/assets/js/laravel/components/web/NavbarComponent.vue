<template>
    <section>
        <nav>
            <router-link :to="{ name: 'home' }">
                <button class="link">HOME</button>
            </router-link>

            <router-link :to="{ name: 'about' }">
                <button class="link">ABOUT</button>
            </router-link>

            <a v-if="isAuthenticated" href="/dashboard">
                <button class="link novias-creato">NOVIAS CREATO</button>
            </a>
            <a v-else href="/login">
                <button class="link novias-creato">NOVIAS CREATO</button>
            </a>
        </nav>
    </section>
</template>

<script>
import auth from '../../mixins/auth';

export default {
    mixins: [
            auth
        ],
}
</script>

<style scoped>
    nav{
        width: 100%;
        height: 10vh;
        position: absolute;
        top: 0;
        left: 0;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 100;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        padding: 0px 20px;
    }

    .link:focus{
        outline: none;
    }

    .link{
        background-color: transparent;
        border: none;
        color: white;
        margin-left: 20px;
    }

    .novias-creato{
        border: 1px solid white;
        padding: 5px 10px;
        outline: none;
    }
</style>