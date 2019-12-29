<template>
    <li :class="{'list-group-item':variant}">
        <div class="row p-2" align-h="center">
            <div class="col-md-3 col-12 text-center">
                <img src="https://www.jumpstarttech.com/files/2018/08/Network-Profile.png" class="rounded-circle" style="width:60px; height:60px;">
            </div>
            <div class="col-md-6 d-none d-md-block" aling-self="center" >
                <p class="mb-1">
                        <img class="rounded-circle" style="width:10px; height:10px; background-color:gray;">
                    {{ conversation.contact_name }}
                </p>
                <p class="text-muted small mb-1">{{ conversation.last_message }}</p>
            </div>
            <div class="col-md-3 d-none d-md-block">
                <p class="text-muted small">{{ lastTime }}</p>
            </div>
        </div>
    </li>
</template>

<script>
export default {
    props:{
        variant: String,
        conversation: Object
    },
    data(){
        return{
           
        };
    },
    computed: {
        lastTime(){
            return moment(this.conversation.last_time, "YYYY-MM-DD hh:mm:ss").locale('es').fromNow();
        }
    }
}
</script>

<style>

</style>