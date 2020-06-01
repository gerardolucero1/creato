<template>
    <div class="" v-if="user != null">
        <Countdown :end="event.date"></Countdown>
        <!-- <div class="bg-image" style="background-image: url('https://s1.1zoom.me/big3/90/354027-admin.jpg');">
            <div class="hero bg-black-op">
                <div class="hero-inner">
                    <div class="content content-full">
                        <div class="row justify-content-center">
                            <div class="col-md-6 py-30 text-center">
                                <h1 class="display-4 font-w700 text-white mb-10">Tu boda</h1>
                                <h2 class="h4 font-w400 text-white-op pb-30 mb-20 border-white-op-b">SIN PRISA, PERO SIN PAUSA...</h2>
                                <div class="js-countdown mb-20">
                                    <div class="row text-white">
                                        <div class="col-12 text-center">
                                            <Countdown :end="event.date"></Countdown>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</template>

<script>
import Countdown from 'vuejs-countdown'

export default {
  components: { Countdown 
  },
  
  props: {
        userId: Number
    },
    data(){
            return{
            /* imagenes preview */ 
             perfilMiniatura:'',
             bannerMiniatura:'',
             

            /* Objetos para obtener los datos que se van a cargar*/
                user:{
                    'name': '',
                        profile:{
                        'user_id': '',
                        'last_name': '',
                        'second_name': '',
                        'photo': '',
                        'banner': '',
                        'description': '',
                        'phone': '',
                        }
                },

            /* Arreglo vacio para almacenar los datos a mostrar */
                user:null,
                event:null
            }
        },
    created(){
            this.obtenerDatos();
            //this.obtenerEvento();
        },
    methods: {

        obtenerDatos: function(){
                let URL = '/cliente/perfil/get/'+ this.userId;
                axios.get(URL).then((response)=>{
                    this.user = response.data[0];
                    //console.log(response.data[0]);
                    this.event = response.data[1];
                });     
            },
        //obtenerEvento: function(){
        //       let URL = '/cliente/event/get/'+ this.userId;
        //        axios.get(URL).then((response)=>{
        //            this.events = response.data;
        //        });     
        //    },
        /* Cambiar foto de perfil */
        cambiarPerfil: function(){
                    $('#cambioPerfil').modal('show');
            },
        obtenerPhoto(e){
            let file = e.target.files[0];
            this.user.photo = file;
            this.cargarPhoto(file);
        },
        cargarPhoto(file){
            let reader = new FileReader();
            reader.onload = (e) => {
                this.perfilMiniatura = e.target.result;
            }
            reader.readAsDataURL(file);
        },
        enviarImgPerfil(){
  
                let formData = new FormData();

                formData.append('photo', this.user.photo);

               let URL = '/cliente/perfil/guardar/perfil/'+ this.userId;

                axios.post( URL,
                    formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(()  => {
                    $('#cambioPerfil').modal('hide');
                    this.obtenerDatos();
                });
        },
        
        /* Cambiar banner */
        cambiarBanner: function(){
                    $('#cambioBanner').modal('show');
            },
        obtenerBanner(a){
            let fileBanner = a.target.files[0];
            this.user.banner = fileBanner;
            this.cargarBanner(fileBanner);
        },
        cargarBanner(fileBanner){
            let reader = new FileReader();
            reader.onload = (a) => {
                this.bannerMiniatura = a.target.result;
            }
            reader.readAsDataURL(fileBanner);
        },
        enviarImgBanner(){
  
                let formData = new FormData();

                formData.append('banner', this.user.banner);

               let URL = '/cliente/perfil/guardar/perfil/'+ this.userId;

                axios.post( URL,
                    formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(() => {
                    $('#cambioBanner').modal('hide');
                    this.obtenerDatos();
                });
        },
    },

    computed: {
        imagenPerfil(){
            return this.perfilMiniatura;
        },
        imagenBanner(){
            return this.bannerMiniatura
        }
    },
    mounted(){
        Echo.join('messengerOnline')
            .here((users) => {
                //code here
            })
            .joining(
                // code here
            )
            .leaving(
                // code here
            ); 
    }
}
</script>
