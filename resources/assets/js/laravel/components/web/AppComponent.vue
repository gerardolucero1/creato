<template>
    <main>
        <router-link :to="{ name: 'home' }">Home</router-link>
        <router-link :to="{ name: 'about' }">About</router-link>

        <router-view></router-view>
    </main>
</template>

<script>
export default {

}
</script>

<style>

</style>