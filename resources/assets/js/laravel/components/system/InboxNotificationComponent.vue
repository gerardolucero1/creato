<template>
            <a>{{ numeroNotificacion }}
            </a>
</template>

<script>
export default {
    props:{
        userId: {
            type: Number,
            required: true
        }
    },
    data(){
        return {
            notification: []
        }
    }, 
    created(){
            this.obtenerNotificacion()
        },

    computed: {
            numeroNotificacion: function(){
                return this.notification.length
                }
            },
            
    mounted(){
        Echo.private('App.User.' + this.userId)
            .notification((notification) => {
                this.obtenerNotificacion()  
            });
        Echo.join('messengerOnline')
            .here((users) => {
                users.forEach(user => this.changeStatus(user, true));
            })
            .joining(
                (user) => this.changeStatus(user, true)
            )
            .leaving((user) => this.changeStatus(user, false)
            );
    },
    methods:{
        obtenerNotificacion: function(){
            let URL = 'notificacion/'+ this.userId;
                axios.get(URL).then((response)=>{           
                    this.notificaciones = response.data;
                    var unique = [...new Set(this.notificaciones.map(item=> item.notifiable_id))];
                    this.notification = response.data; 
                });
            },
            changeStatus(user, status){
            
        },
    }

}
</script>
