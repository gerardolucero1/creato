<template>
      <div class="content" v-if="user != null">
            <main id="main-container" style="min-height: 250px;">
                <div class="bg-image bg-image-bottom" :style='{ backgroundImage: `url(${user.profile.banner})` }'>
                    <div class="bg-primary-dark-op py-30">
                        <button type="button" class="btn btn-lg btn-circle btn-outline-info mr-5 mb-5 ml-4" @click="cambiarBanner()">
                                <i class="fa fa-plus"></i>
                            </button>
                        <div class="content content-full text-center">
                            <div class="mb-15">
                                <a class="img-link" @click="cambiarPerfil()">
                                    <img class="img-avatar img-avatar96 img-avatar-thumb" :src="user.profile.photo" >
                                </a>
                            </div>
                            <h1 class="h3 text-white font-w700 mb-10">{{ user.name }} {{ user.profile.last_name }}</h1>
                            <h2 class="h5 text-white-op">
                                {{ event.date }}
                            </h2>
                        </div>
                    </div>
                </div>
            </main>
            <h2 class="content-heading">Datos</h2>
            <div class="row">
                <div class="col-md-9">
                    <div class="block">
                        <div class="block-header">
                            <h3 class="block-title">Descripción</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                    <i class="si si-pencil"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content" style="min-height: 200px;">
                            <p>{{ user.profile.description }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="block">
                        <div class="block">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Datos</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                        <i class="si si-pencil"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="block-content" style="min-height: 175px;">
                            Numero de telefono<p>{{ user.profile.phone }}</p>
                            Correo <p>{{ user.email }}</p>
                            Otros datos
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                                Progreso <small>Normal</small>
                            </h3>
                        </div>
                        <div class="block-content">
                            <div class="progress push">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                    <span class="progress-bar-label">50%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <client-gallery-component :userId="userId"></client-gallery-component>
            <h2 class="content-heading"></h2>
        <div class="bg-image" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTV2HfciS-At-CmTedfjd6HJqJXYOcKkltVrPgsRhjJJtNTeann');">
            <div class="hero bg-black-op">
                <div class="hero-inner">
                    <div class="content content-full">
                        <div class="row justify-content-center">
                            <div class="col-md-6 py-30 text-center">
                                <h1 class="display-4 font-w700 text-white mb-10">Tu boda</h1>
                                <h2 class="h4 font-w400 text-white-op pb-30 mb-20 border-white-op-b">We’re working on it! Coming soon..</h2>
                                <div class="js-countdown mb-20">
                                    <div class="row text-white">
                                        <div class="col-2"></div>
                                        <div class="col-8 text-center">
                                            <Countdown :end="event.date"></Countdown>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- modales para cambiar imagenes de perfil y banner -->
         <!-- modal perfil -->
        <div class="modal fade" id="cambioPerfil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">

            <!-- Change class .modal-sm to change the size of the modal -->
            <div class="modal-dialog modal-md" role="document">


                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title w-100" id="myModalLabel">Cambiar Perfil</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data">
                            <label for="photo">Cambiar imagen de Perfil</label>
                            <input type="file" @change="obtenerPhoto" class="form-control-file">
                            <figure>
                                <img with="200" height="200" :src="imagenPerfil" alt="foto de perfil">
                            </figure>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary btn-sm" @click="enviarImgPerfil">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- termina modal perfil -->
        <!-- modal banner -->
        <div class="modal fade" id="cambioBanner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">

            <!-- Change class .modal-sm to change the size of the modal -->
            <div class="modal-dialog modal-lg" role="document">


                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title w-100" id="myModalLabel">Cambiar banner</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data">
                            <label for="photo">Cambiar imagen de Banner</label>
                            <input type="file" @change="obtenerBanner" class="form-control-file">
                            <figure>
                                <img with="200" height="200" :src="imagenBanner" alt="banner">
                            </figure>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary btn-sm" @click="enviarImgBanner">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- termina modal banner -->
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
        Echo.join('messenger')
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
