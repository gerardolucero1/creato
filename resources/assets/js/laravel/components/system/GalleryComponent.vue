<template>
    <div>
        <h2 class="content-heading">Mi evento<small>Galería</small>
            <button type="button" class="btn btn-lg btn-circle btn-outline-info mr-5 mb-5 ml-4" @click="CargarImagen()">
                <i class="fa fa-plus"></i>
            </button>
        </h2>
        <div class="row items-push js-gallery js-gallery-enabled">
            <div class="col-md-6 col-lg-4 col-xl-3 animated fadeIn" v-for="imagen in imagenes" :key="imagen.index">
                <div class="options-container fx-item-zoom-in fx-overlay-slide-down">
                    <img class="img-fluid options-item" :src="imagen.image" alt="">
                    <div class="options-overlay bg-black-op-75">
                        <div class="options-overlay-content">
                            <h3 class="h4 text-white mb-5">Imagen</h3>
                            <h4 class="h6 text-white-op mb-15">More Details</h4>
                            <a class="btn btn-sm btn-rounded btn-noborder btn-alt-primary min-width-75 img-lightbox" :href="imagen.image">
                                <i class="fa fa-search-plus"></i> Ver
                            </a>
                            <a class="btn btn-sm btn-rounded btn-noborder btn-alt-danger min-width-75" @click="eliminarImagen(imagen)"><i class="fa fa-pencil"></i> Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal banner -->
        <div class="modal fade" id="cargarImagen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <!-- Change class .modal-sm to change the size of the modal -->
            <div class="modal-dialog modal-lg" role="document">


                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title w-100" id="myModalLabel">Cargar imagen</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data">
                            <label for="photo">Seleccionar imagen</label>
                            <input type="file" @change="obtenerImagen" class="form-control-file">
                            <figure>
                                <img with="200" height="200" :src="imagenPreview" alt="image">
                            </figure>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary btn-sm" @click="enviarImagen">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- termina modal banner -->
    </div>
</template>

<script>
export default {
props: {
        userId: Number
    },
    data(){
            return{
            /* imagenes preview */ 
             imagenMiniatura:'',

            /* Objetos para obtener los datos que se van a cargar*/
                gallery:{
                    'user_id': '',
                    'image': ''
                },

            /* Arreglo vacio para almacenar los datos a mostrar */
                imagenes:[]
            }
        },
    created(){
            this.obtenerDatos();
        },
    methods: {

        obtenerDatos: function(){
                let URL = '/cliente/perfil/galeria/'+ this.userId;
                axios.get(URL).then((response)=>{
                    this.imagenes = response.data;
                });     
        },

        CargarImagen: function(){
                    $('#cargarImagen').modal('show');
        },
        obtenerImagen(a){
            let fileImagen = a.target.files[0];
            this.gallery.image = fileImagen;
            this.cargarImagen(fileImagen);
        },
        cargarImagen(fileImagen){
            let reader = new FileReader();
            reader.onload = (a) => {
                this.imagenMiniatura = a.target.result;
            }
            reader.readAsDataURL(fileImagen);
        },
        enviarImagen(){
  
                let formData = new FormData();
                formData.append('user_id', this.userId);
                formData.append('image', this.gallery.image);

               let URL = '/cliente/perfil/guardar/galeria/'+ this.userId;

                axios.post( URL,
                    formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(() => {
                    $('#cargarImagen').modal('hide');
                    this.obtenerDatos();
                });
        },
        eliminarImagen: function(imagen){
                let URL = '/cliente/perfil/galeria/eliminar/' + imagen.id;
                    Swal.fire({
                        title: 'Estas seguro?',
                        text: 'No podras revertir esto!',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, Eliminar!'
                        }).then((result) => {
                            if (result.value) {
                                axios.delete(URL).then((response) => {
                                    this.obtenerDatos();
                                });
                        Swal.fire(
                        'Eliminado!',
                        'La tarea se a eliminado',
                        'success'
                        )
                            }
            });       
            },
    },
    computed: {
        imagenPreview(){
            return this.imagenMiniatura
        }
    }
}
</script>
