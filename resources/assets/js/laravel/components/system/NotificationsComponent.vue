<template>
    <div class="dropdown-menu dropdown-menu-right min-width-300" aria-labelledby="page-header-notifications">
        <h5 class="h6 text-center py-10 mb-0 border-b text-uppercase">Notifications</h5>
        <ul class="list-unstyled my-20" v-if="notifications.length == 0">
            <li>
                <a class="text-body-color-dark media mb-15" :href="'dashboard/conversaciones'">
                    <div class="ml-5 mr-15">
                        <i class="fa fa-fw fa-check text-success"></i>
                    </div>
                    <div class="media-body pr-10"> 
                        <p class="mb-0">No tienes nuevas notificaciones</p>
                    </div>
        </a>
            </li>
        </ul>
        <ul class="list-unstyled my-20">
            <indiv-notifications-component 
            v-for="notification in notifications" :key="notification.index" 
            :notification="notification"/>
        </ul>
        <div class="dropdown-divider">
        </div>
            <a class="dropdown-item text-center mb-0" href="javascript:void(0)">
                <i class="fa fa-flag mr-5"></i> Ver todo
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
            notifications: []
        } 
    },

    created(){
            this.obtenerNotificacion()
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
                //this.notifications = response.data;
                this.notificaciones = response.data;
                var unique = [...new Set(this.notificaciones.map(item=> item.data))];
                //console.log(unique);
                this.notifications = unique; 
                //this.reducir();
                });
            },
    }

}
</script>