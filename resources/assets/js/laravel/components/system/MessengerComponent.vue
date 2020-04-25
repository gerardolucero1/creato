<template>
    <div>
        <div class="row">  
            <div class="col-md-5 col-xl-3">     
                <div class="block d-none d-md-block" style="min-height: 600px;">
                    <div class="block-content">
                        <div class="js-inbox-nav d-none d-md-block">
                            <div class="block">
                                <div class="block-header block-header-default">
                                    <div class="block-title">
                                        <input type="text" v-model="querySearch" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Buscar contacto...">
                                    </div>
                                </div>
                                <contact-list-component @conversationSelected="changeActiveConversation($event)"
                                :conversations="conversationsFiltered">
                                </contact-list-component>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-xl-9">
                <div class="block"  style="min-height: 600px;">
                        <active-conversation-component v-if="selectedConversation"
                        :contact-id="selectedConversation.contact_id"
                        :contact-name="selectedConversation.contact_name"
                        :messages="messages"
                        @messageCreated="addMessage($event)">
                        </active-conversation-component>
                </div>
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
                console.log(data);
		    	const message = data.message; 
                message.writtenByMe = false;     
	    		this.addMessage(message);
            });

        Echo.join('messenger')
            .here((users) => {
                users.forEach(user => this.changeStatus(user, true));
            })
            .joining(
                (user) => this.changeStatus(user, true)
            )
            .leaving((user) => this.changeStatus(user, false)
            );
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
        changeStatus(user, status){
            //console.log('se conecto', user.id);
            let index = this.conversations.findIndex((conversation) => {
                return conversation.contact_id == user.id;
            });
            if (index >= 0)
            this.$set(this.conversations[index], 'online', status);
            //this.$set(this.)
        }
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
