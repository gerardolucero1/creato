<template>
<div>
    <form class="my-3 mx-2">
        <div class="form-group">
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Buscar contacto...">
        </div>
    </form>     

    <ul class="list-group">
        <contact-component 
        v-for="conversation in conversations" 
        :key="conversation.id"
        :conversation="conversation"
        @click.native="selectConversation(conversation)">

        </contact-component>
        <!--
        <contact-component variant="active"></contact-component>
        <contact-component variant="active"></contact-component>
        <contact-component variant="secundary"></contact-component>
        -->
    </ul>
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
        }
    }
}
</script>
