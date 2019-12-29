<template>
      <div class="container fluid">
        <div class="row justify-content-center">
            <div class="col-4">
                <form class="my-3 mx-2">
                    <div class="form-group">
                        <input type="text" v-model="querySearch" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Buscar contacto...">
                    </div>
                </form> 
                <contact-list-component @conversationSelected="changeActiveConversation($event)"
                :conversations="conversationsFiltered">

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
            conversations: [],
            querySearch: ''
        };
    },
    mounted(){
        this.getConversations();

        Echo.private(`users.${this.userId}`)
		    .listen('MessageSent', (data) => {
                console.log(message);
		    	const message = data.message; 
                message.writtenByMe = false;     
	    		this.addMessage(message);
            });

        Echo.join('messenger')
            .here((users) => {
                console.log('online', users)
            })
            .joining((user) => {
                console.log(user.id);
            })
            .leaving((user) => {
                console.log(user.id);
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
    },

    computed:{
        conversationsFiltered() {
            return this.conversations.filter(
                (conversation) => conversation.contact_name
                                    .toLowerCase()
                                    .includes(this.querySearch.toLowerCase()));
        }
    }
}
</script>
