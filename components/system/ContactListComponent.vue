<template>
<div>    
    <div class="block-content block-content-full scroll-auto">
            <contact-component 
            v-for="conversation in conversations" 
            :key="conversation.id"
            :conversation="conversation"
            @click.native="selectConversation(conversation)">
            </contact-component>
    </div>
</div>
</template>

<script>
export default {
    props:{
        conversations: Array
    },
    data(){
        return{
        };
    },
    mounted(){
    },
    methods:{
        selectConversation(conversation){
           // console.log('conversation');
           this.$emit('conversationSelected', conversation);
        },
        scrollTopBottom(){
            const scrollAuto = document.querySelector('.scroll-auto');
            scrollAuto.scrollTop = scrollAuto.scrollHeight;
        },
    }
}
</script>
