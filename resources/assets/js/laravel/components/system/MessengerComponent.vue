<template>
      <div class="container fluid">
        <div class="row justify-content-center">
            <div class="col-4">
                <contact-list-component @conversationSelected="changeActiveConversation($event)"
                :conversations="conversations">

                </contact-list-component>
            </div>
            <div class="col-8">
                <active-conversation-component v-if="selectedConversation"
                :contact-id="selectedConversation.contact_id"
                :contact-name="selectedConversation.contact_name"
                :messages="messages"
                @messageCreated="addMessage($event)">
                </active-conversation-component>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        userId: Number
    },
    data(){
        return{
            selectedConversation: null,
            messages: [],
            conversations: []
        };
    },
    mounted(){
        this.getConversations();

        Echo.channel(`users.${this.userId}`)
		    .listen('MessageSent', (data) => {
                console.log(message);
		    	const message = data.message; 
                message.writtenByMe = false;     
	    		this.addMessage(message);
            });
    },
    methods: {
        changeActiveConversation(conversation){
            this.selectedConversation = conversation;
            this.getMessages();
        },
        getMessages(){
            axios.get(`mensajes?contact_id=${this.selectedConversation.contact_id}`)
            .then((response) => {
                 console.log(response.data);
                 this.messages = response.data;
            });
        },
        addMessage(message){
            const conversation = this.conversations.find((conversation) =>{
                return conversation.contact_id == message.from_id || 
                conversation.contact_id == message.to_id;
            });

            const author = this.userId === message.from_id ?'Tú' : conversation.contact_name;
            conversation.last_message = `${author}: ${message.content}`;
            conversation.last_time = message.created_at;
            if(this.selectedConversation.contact_id == message.from_id || 
                conversation.contact_id == message.to_id){
                this.messages.push(message);
            }
        },
        getConversations(){
            axios.get('conversations')
            .then((Response) => {
                this.conversations = Response.data;
            });
        },
    }

}
</script>
