<template>
      <div class="content">
            <main id="main-container" style="min-height: 250px;" v-for="user in users" :key="user.index">
                <div class="bg-image bg-image-bottom" :style='{ backgroundImage: `url(${user.profile.banner})` }'>
                    <div class="bg-primary-dark-op py-30">
                        <button type="button" class="btn btn-rounded btn-hero btn-sm btn-alt-primary mb-5" @click="cambiarBanner()">
                                <i class="fa fa-plus mr-5"></i>
                            </button>
                        <div class="content content-full text-center">
                            <div class="mb-15">
                                <a class="img-link" @click="cambiarPerfil()">
                                    <img class="img-avatar img-avatar96 img-avatar-thumb" :src="user.profile.photo" >
                                </a>
                            </div>
                            <h1 class="h3 text-white font-w700 mb-10">{{ user.name }} {{ user.profile.last_name }}</h1>
                            <h2 class="h5 text-white-op">
                                Aqui va la fecha del evento
                            </h2>
                        </div>
                    </div>
                </div>
            </main>
            <h2 class="content-heading">Datos</h2>
            <div class="row"  v-for="user in users" :key="user.index">
                <div class="col-md-9">
                    <div class="block">
                        <div class="block-header">
                            <h3 class="block-title">Descripción</h3>
                        </div>
                        <div class="block-content">
                            <p>{{ user.profile.description }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Datos </h3>
                        </div>
                        <div class="block-content">
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
        
            <h2 class="content-heading">Mi evento<small>Galeria</small></h2>
        <div class="row items-push js-gallery js-gallery-enabled">
                <div class="col-md-6 col-lg-4 col-xl-3 animated fadeIn">
            <div class="options-container fx-item-zoom-in fx-overlay-slide-down">
                <img class="img-fluid options-item" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTc2oirVaWUN_aOxTpXvC_mCWv5rS5raEjnTGzHayUyzJNgauKA" alt="">
                <div class="options-overlay bg-black-op-75">
                    <div class="options-overlay-content">
                        <h3 class="h4 text-white mb-5">Image</h3>
                        <h4 class="h6 text-white-op mb-15">More Details</h4>
                        <a class="btn btn-sm btn-rounded btn-noborder btn-alt-primary min-width-75 img-lightbox" href="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTc2oirVaWUN_aOxTpXvC_mCWv5rS5raEjnTGzHayUyzJNgauKA">
                            <i class="fa fa-search-plus"></i> View
                        </a>
                        <a class="btn btn-sm btn-rounded btn-noborder btn-alt-success min-width-75" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a>
                    </div>
                </div>
            </div>
        </div>
                <div class="col-md-6 col-lg-4 col-xl-3 animated fadeIn">
            <div class="options-container fx-item-zoom-in fx-overlay-slide-down">
                <img class="img-fluid options-item" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ5MsJ8HUqsAxdFd7iuy_Uj9YGyMSQj0KjvDjZJzZmnEK3hIj_L" alt="">
                <div class="options-overlay bg-black-op-75">
                    <div class="options-overlay-content">
                        <h3 class="h4 text-white mb-5">Image</h3>
                        <h4 class="h6 text-white-op mb-15">More Details</h4>
                        <a class="btn btn-sm btn-rounded btn-noborder btn-alt-primary min-width-75 img-lightbox" href="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ5MsJ8HUqsAxdFd7iuy_Uj9YGyMSQj0KjvDjZJzZmnEK3hIj_L">
                            <i class="fa fa-search-plus"></i> View
                        </a>
                        <a class="btn btn-sm btn-rounded btn-noborder btn-alt-success min-width-75" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a>
                    </div>
                </div>
            </div>
        </div>
                <div class="col-md-6 col-lg-4 col-xl-3 animated fadeIn">
            <div class="options-container fx-item-zoom-in fx-overlay-slide-down">
                <img class="img-fluid options-item" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRRb3w4JV8QcYHlMtiDnx9PSnlL_h71AaDD-WjAcw9Y7L3p0JzI" alt="">
                <div class="options-overlay bg-black-op-75">
                    <div class="options-overlay-content">
                        <h3 class="h4 text-white mb-5">Image</h3>
                        <h4 class="h6 text-white-op mb-15">More Details</h4>
                        <a class="btn btn-sm btn-rounded btn-noborder btn-alt-primary min-width-75 img-lightbox" href="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRRb3w4JV8QcYHlMtiDnx9PSnlL_h71AaDD-WjAcw9Y7L3p0JzI">
                            <i class="fa fa-search-plus"></i> View
                        </a>
                        <a class="btn btn-sm btn-rounded btn-noborder btn-alt-success min-width-75" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a>
                    </div>
                </div>
            </div>
        </div>
                <div class="col-md-6 col-lg-4 col-xl-3 animated fadeIn">
            <div class="options-container fx-item-zoom-in fx-overlay-slide-down">
                <img class="img-fluid options-item" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSzqwkKMqVTA0y2Tf5YPXQR-B5dUKcUcMN226KnLhadhDPf4AJI" alt="">
                <div class="options-overlay bg-black-op-75">
                    <div class="options-overlay-content">
                        <h3 class="h4 text-white mb-5">Image</h3>
                        <h4 class="h6 text-white-op mb-15">More Details</h4>
                        <a class="btn btn-sm btn-rounded btn-noborder btn-alt-primary min-width-75 img-lightbox" href="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSzqwkKMqVTA0y2Tf5YPXQR-B5dUKcUcMN226KnLhadhDPf4AJI">
                            <i class="fa fa-search-plus"></i> View
                        </a>
                        <a class="btn btn-sm btn-rounded btn-noborder btn-alt-success min-width-75" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a>
                    </div>
                </div>
            </div>
        </div>
                <div class="col-md-6 col-lg-4 col-xl-3 animated fadeIn">
            <div class="options-container fx-item-zoom-in fx-overlay-slide-down">
                <img class="img-fluid options-item" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTHOxaJ6_HvQUFnbaRfQzrMCd0zV41QH76lheWD9OpkLniQKrNE" alt="">
                <div class="options-overlay bg-black-op-75">
                    <div class="options-overlay-content">
                        <h3 class="h4 text-white mb-5">Image</h3>
                        <h4 class="h6 text-white-op mb-15">More Details</h4>
                        <a class="btn btn-sm btn-rounded btn-noborder btn-alt-primary min-width-75 img-lightbox" href="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTHOxaJ6_HvQUFnbaRfQzrMCd0zV41QH76lheWD9OpkLniQKrNE">
                            <i class="fa fa-search-plus"></i> View
                        </a>
                        <a class="btn btn-sm btn-rounded btn-noborder btn-alt-success min-width-75" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a>
                    </div>
                </div>
            </div>
        </div>
                <div class="col-md-6 col-lg-4 col-xl-3 animated fadeIn">
            <div class="options-container fx-item-zoom-in fx-overlay-slide-down">
                <img class="img-fluid options-item" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRqj63IgDlzdA8vEVDjv_Lbmtbt-IAfhI-lcAX2zRhxa1x2V22L" alt="">
                <div class="options-overlay bg-black-op-75">
                    <div class="options-overlay-content">
                        <h3 class="h4 text-white mb-5">Image</h3>
                        <h4 class="h6 text-white-op mb-15">More Details</h4>
                        <a class="btn btn-sm btn-rounded btn-noborder btn-alt-primary min-width-75 img-lightbox" href="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRqj63IgDlzdA8vEVDjv_Lbmtbt-IAfhI-lcAX2zRhxa1x2V22L">
                            <i class="fa fa-search-plus"></i> View
                        </a>
                        <a class="btn btn-sm btn-rounded btn-noborder btn-alt-success min-width-75" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a>
                    </div>
                </div>
            </div>
        </div>
                <div class="col-md-6 col-lg-4 col-xl-3 animated fadeIn">
            <div class="options-container fx-item-zoom-in fx-overlay-slide-down">
                <img class="img-fluid options-item" src="https://cdn0.bodas.com.mx/emp/fotos/5/9/9/7/t30_2x_1_5_125997_v13.jpg" alt="">
                <div class="options-overlay bg-black-op-75">
                    <div class="options-overlay-content">
                        <h3 class="h4 text-white mb-5">Image</h3>
                        <h4 class="h6 text-white-op mb-15">More Details</h4>
                        <a class="btn btn-sm btn-rounded btn-noborder btn-alt-primary min-width-75 img-lightbox" href="https://cdn0.bodas.com.mx/emp/fotos/5/9/9/7/t30_2x_1_5_125997_v13.jpg">
                            <i class="fa fa-search-plus"></i> View
                        </a>
                        <a class="btn btn-sm btn-rounded btn-noborder btn-alt-success min-width-75" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a>
                    </div>
                </div>
            </div>
        </div>
                <div class="col-md-6 col-lg-4 col-xl-3 animated fadeIn">
            <div class="options-container fx-item-zoom-in fx-overlay-slide-down">
                <img class="img-fluid options-item" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQY_wNBzPPHU7tj0LNNNZ5J3kew-YD-jgNVnit5YG6szEynefOz" alt="">
                <div class="options-overlay bg-black-op-75">
                    <div class="options-overlay-content">
                        <h3 class="h4 text-white mb-5">Image</h3>
                        <h4 class="h6 text-white-op mb-15">More Details</h4>
                        <a class="btn btn-sm btn-rounded btn-noborder btn-alt-primary min-width-75 img-lightbox" href="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQY_wNBzPPHU7tj0LNNNZ5J3kew-YD-jgNVnit5YG6szEynefOz">
                            <i class="fa fa-search-plus"></i> View
                        </a>
                        <a class="btn btn-sm btn-rounded btn-noborder btn-alt-success min-width-75" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a>
                    </div>
                </div>
            </div>
        </div>
                <div class="col-md-6 col-lg-4 col-xl-3 animated fadeIn">
            <div class="options-container fx-item-zoom-in fx-overlay-slide-down">
                <img class="img-fluid options-item" src="https://www.expotuboda.com.mx/wp-content/uploads/2014/09/23fb9a79b87accb900c1a0678a5d61e7.jpg" alt="">
                <div class="options-overlay bg-black-op-75">
                    <div class="options-overlay-content">
                        <h3 class="h4 text-white mb-5">Image</h3>
                        <h4 class="h6 text-white-op mb-15">More Details</h4>
                        <a class="btn btn-sm btn-rounded btn-noborder btn-alt-primary min-width-75 img-lightbox" href="https://www.expotuboda.com.mx/wp-content/uploads/2014/09/23fb9a79b87accb900c1a0678a5d61e7.jpg">
                            <i class="fa fa-search-plus"></i> View
                        </a>
                        <a class="btn btn-sm btn-rounded btn-noborder btn-alt-success min-width-75" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a>
                    </div>
                </div>
            </div>
        </div>
                <div class="col-md-6 col-lg-4 col-xl-3 animated fadeIn">
            <div class="options-container fx-item-zoom-in fx-overlay-slide-down">
                <img class="img-fluid options-item" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTdFNygVAMuLzQZ74afz5uE8I9HZMttdu7U25znogPAO9dhUBtR" alt="">
                <div class="options-overlay bg-black-op-75">
                    <div class="options-overlay-content">
                        <h3 class="h4 text-white mb-5">Image</h3>
                        <h4 class="h6 text-white-op mb-15">More Details</h4>
                        <a class="btn btn-sm btn-rounded btn-noborder btn-alt-primary min-width-75 img-lightbox" href="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTdFNygVAMuLzQZ74afz5uE8I9HZMttdu7U25znogPAO9dhUBtR">
                            <i class="fa fa-search-plus"></i> View
                        </a>
                        <a class="btn btn-sm btn-rounded btn-noborder btn-alt-success min-width-75" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a>
                    </div>
                </div>
            </div>
        </div>
                <div class="col-md-6 col-lg-4 col-xl-3 animated fadeIn">
            <div class="options-container fx-item-zoom-in fx-overlay-slide-down">
                <img class="img-fluid options-item" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRJvEiF-IMa5Auk1jfS_0iOe_dN253X3-VazIbi7-JX80MPf6So" alt="">
                <div class="options-overlay bg-black-op-75">
                    <div class="options-overlay-content">
                        <h3 class="h4 text-white mb-5">Image</h3>
                        <h4 class="h6 text-white-op mb-15">More Details</h4>
                        <a class="btn btn-sm btn-rounded btn-noborder btn-alt-primary min-width-75 img-lightbox" href="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRJvEiF-IMa5Auk1jfS_0iOe_dN253X3-VazIbi7-JX80MPf6So">
                            <i class="fa fa-search-plus"></i> View
                        </a>
                        <a class="btn btn-sm btn-rounded btn-noborder btn-alt-success min-width-75" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a>
                    </div>
                </div>
            </div>
        </div>
                <div class="col-md-6 col-lg-4 col-xl-3 animated fadeIn">
            <div class="options-container fx-item-zoom-in fx-overlay-slide-down">
                <img class="img-fluid options-item" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTSvcgTwJhs6pCoLK7amKid46PBy2i6yeObBFSW3gcjv8BipYUS" alt="">
                <div class="options-overlay bg-black-op-75">
                    <div class="options-overlay-content">
                        <h3 class="h4 text-white mb-5">Image</h3>
                        <h4 class="h6 text-white-op mb-15">More Details</h4>
                        <a class="btn btn-sm btn-rounded btn-noborder btn-alt-primary min-width-75 img-lightbox" href="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTSvcgTwJhs6pCoLK7amKid46PBy2i6yeObBFSW3gcjv8BipYUS">
                            <i class="fa fa-search-plus"></i> View
                        </a>
                        <a class="btn btn-sm btn-rounded btn-noborder btn-alt-success min-width-75" href="javascript:void(0)"><i class="fa fa-pencil"></i> Edit</a>
                    </div>
                </div>
            </div>
        </div>
            </div>
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
                                    <div class="row items-push text-right">
                                        <Countdown end="August 22, 2020"></Countdown>
                                    </div>
                                </div>
                                <a class="btn btn-hero btn-noborder btn-rounded btn-outline-warning" href="be_pages_generic_blank.php">
                                </a>
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
                    'user_id': '12',
                    'last_name': '',
                    'second_name': '',
                    'photo': '',
                    'banner': '',
                    'description': '',
                    'phone': '',
                },

            /* Arreglo vacio para almacenar los datos a mostrar */
                users:[],
                profile:[]
            }
        },
    created(){
            this.obtenerDatos();
        },
    methods: {

        obtenerDatos: function(){
                let URL = '/cliente/perfil/get/'+ this.userId;
                axios.get(URL).then((response)=>{
                    this.users = response.data;
                });     
            },
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
                ).then(function(){
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
                ).then(function(){
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
    }
}
</script>
