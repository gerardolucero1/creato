<template>
    <ul class="nav-users">
        <li :class="{'bg-primary-lighter' :variant}"> 
            <a href="#">
                    <img class="img-avatar" :src="conversation.photo[0].photo">
                    <i :class="[ conversation.online ? 'fa fa-circle text-success' : 'fa fa-circle text-muted' ]"></i>
                    <p class="mb-1">
                        
                        {{ conversation.contact_name }}
                    </p>
                    <p class="text-muted small mb-1">{{ conversation.last_message | truncarConversacion }}</p>
                
                    <p class="text-muted small">{{ lastTime }}</p>
            </a>   
        </li>
    </ul>
</template>

<script>
export default {
    props:{
        conversation: Object,
        selected: Boolean
    },
    data(){ 
        return{

        };
    },
    filters: {
        truncarConversacion(args){

            let conversation = args.split(':')
            
            if(conversation[1] != undefined){
                let num = 12
                if (conversation[1].length <= num) {
                    return conversation[1]
                }
                
                return conversation[1].slice(0, num) + '...'
            }else{
                return '...'
            }

            
        }
    },
    computed: {
        lastTime(){
            return moment(this.conversation.last_time, "YYYY-MM-DD hh:mm:ss").locale('es').fromNow();
        },
        variant() {
            return this.selected;
        }
    }
}
</script>

<style>

</style>