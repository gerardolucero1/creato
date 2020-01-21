<template>
    <div class="dropdown-menu dropdown-menu-right min-width-300" aria-labelledby="page-header-notifications">
        <h5 class="h6 text-center py-10 mb-0 border-b text-uppercase">Notifications</h5>
        <ul class="list-unstyled my-20" v-for="notification in notifications" :key="notification.index">
            <li>
                <a class="text-body-color-dark media mb-15" :href="'dashboard/conversaciones'">
                    <div class="ml-5 mr-15">
                        <i class="fa fa-fw fa-check text-success"></i>
                    </div>
                    <div class="media-body pr-10"> 
                        <p class="mb-0">A new message from <strong>{{ notification.data }}</strong></p>
                        <div class="text-muted font-size-sm font-italic">
                            {{ lastTime }}
                        </div>
                    </div>
                </a>
            </li>
        </ul>
        <div class="dropdown-divider">
        </div>
            <a class="dropdown-item text-center mb-0" href="javascript:void(0)">
                <i class="fa fa-flag mr-5"></i> View All
            </a>
    </div>
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
            notification: {
                'id': '',
                'type': '',
                'notifiable_type': '',
                'notifiable_id': '',
                'data': '',
            },
            notifications: [],
            users: []
        } 
    },
    created(){
            this.obtenerNotificacion();
        },

    computed: {
        numeroNotificacion: function(){
            return this.notification.length
            },

        lastTime(){
            let date = this.notifications[0].created_at;
            return moment(date, "YYYY-MM-DD hh:mm:ss").locale('es').fromNow();
        },
    },
            
    mounted(){
        Echo.private('App.User.' + this.userId)
            .notification((notification) => {
                this.obtenerNotificacion()  
            }); 
    },
    methods:{
        obtenerNotificacion: function(){
            let URL = 'notificacion/'+ this.userId;
                axios.get(URL).then((response)=>{     
                    // para juntar las notificaciones      
                    this.notificaciones = response.data;
                    var unique = [...new Set(this.notificaciones.map(item=> item.notifiable_id))];
                    //notifications
                    this.notifications = response.data; 
                    console.log(response.data);
                    this.obtenerUsuario();
                    
                });
            },

        //obtenerIdUser: function () {	
        //    let data = this.notification[0].data;
        //    let json = JSON.stringify(this.data)
        //    console.log(this.json);
        //},
    // falta obtener el ID del usuario
        obtenerUsuario: function(){
            //let result = this.data[this.data.from_id];
            //console.log(result);

            let URL = 'notificacion/administrador/'+ 12;
                axios.get(URL).then((response)=>{           
                    this.users = response.data;
                    //console.log(response.data)
                    this.PruebaDatos();
                });
            },
        
        PruebaDatos: function(){
            let data = this.notifications[0].created_at;
            let notificacioon = this.notifications.created_at;
            console.log(data);
        }
    }

}
</script>