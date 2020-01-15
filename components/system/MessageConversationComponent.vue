<template>
    <div class="col-12 card mb-2">
        <div :class="{'rounded font-w600 p-10 mb-10 animated fadeIn ml-50 bg-primary-lighter text-primary-darker text-right' :writtenByMe == true}">
            <slot></slot>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        writtenByMe: Boolean
    },
    data(){
        return{
            content: 'mensaje 1'
        };
    }
}
</script>

<style>

</style>