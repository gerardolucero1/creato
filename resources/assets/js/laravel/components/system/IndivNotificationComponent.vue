<template>
    <li>
        <a class="text-body-color-dark media mb-15" :href="'dashboard/conversaciones'">
            <div class="ml-5 mr-15">
                <i class="fa fa-fw fa-check text-success"></i>
            </div>
            <div class="media-body pr-10" v-for="user in users" :key="user.id"> 
                <p class="mb-0">A new message from <strong>{{ user.name }}</strong></p>
                <div class="text-muted font-size-sm font-italic">
                    {{ lastTime }}
                </div>
            </div>
        </a>
    </li>
</template>

<script>
export default {
    props:{
        notification: String,
    },

    data(){
        return{
            users:[],
            result:[]
        };
    },

    created(){
        this.obtenerUsuario();
    },

    methods:{
        obtenerUsuario: function(){
            //let result = JSON.parse(this.notification.data);
            let Strings = this.notification.split (" ");
            let result = JSON.parse(Strings);
            //console.log(result.from_id)

            let URL = 'notificacion/administrador/'+ result.from_id;
                axios.get(URL).then((response)=>{           
                    this.users = response.data;
                    //console.log(response.data)
                    
                });
            },
    },

    computed: {
        lastTime(){
            let date = this.notification.created_at;
            console.log(date)
            return moment(date, "YYYY-MM-DD hh:mm:ss").locale('es').fromNow();
        },
    }

}
</script>

<style>

</style>