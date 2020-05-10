<template>
    <div class="row">
        <div class="col-12">
            <main id="main-container">
                <div class="js-chat-container content content-full js-appear-enabled animated fadeIn" data-toggle="appear" data-chat-height="auto">
                    <div class="block mb-0">
                        <div class="tab-content overflow-hidden">
                            <div class="tab-pane fade show active" id="chat-window1" role="tabpanel">
                                <div class="js-chat-talk block-content block-content-full text-wrap-break-word overflow-y-auto" data-chat-id="1" style="height: 480px;">
                                    <message-conversation-component 
                                        v-for="message in messages"
                                        :key="message.id"
                                        :writtenByMe="message.writtenByMe">
                                            {{ message.content}}
                                        </message-conversation-component>
                                </div>
                                <div class="js-chat-form block-content block-content-full block-content-sm bg-body-light">
                                    <form @submit.prevent="postMessages" method="post" autocomplete="off">
                                        <div class="input-group input-group-lg">
                                            <div class="input-group-prepend">
                                                <button class="fa fa-comment text-primary input-group-text" type="submit"></button>
                                            </div>
                                            <input class="js-chat-input form-control" type="text" v-model="newMessage" placeholder="Escribe un mensaje..">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        contactId: Number,
        contactName: String,
        messages: Array
    },
    data(){
        return{ 
            newMessage: ''
        };
    },
    mounted(){
    },
    methods:{
        postMessages(){
            const params = {
                to_id: this.contactId,
                content: this.newMessage,
            };
           axios.post('mensajes', params)
            .then((response) => {
                 if(response.data.success){
                     this.newMessage='';
                     const message = response.data.message;
                     message.writtenByMe = true;
                     this.$emit('messageCreated', message);

                 }  
            }); 
        },
        emailMessages(){
            
        },
        scrollTopBottom(){
            const el = document.querySelector('.js-chat-talk');
            el.scrollTop = el.scrollHeight;
        },
    },
    updated() {
                this.scrollTopBottom();
                //console.log('messages a cambiado');
        },
}
</script>
