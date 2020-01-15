<template>
    <ul class="nav-users">
        <li :class="{'':variant}"> 
            <a href="#">
                    <img class="img-avatar" :src="conversation.photo[0].photo">
                    <i class="fa fa-circle text-success"></i>
                    <p class="mb-1">
                        
                        {{ conversation.contact_name }}
                    </p>
                    <p class="text-muted small mb-1">{{ conversation.last_message }}</p>
                
                    <p class="text-muted small">{{ lastTime }}</p>
            </a>   
        </li>
    </ul>
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