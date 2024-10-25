<template>
<div class="row">
    
    <div class="col-md-10 col-md-offset-2">
        <table class="table table-hover table-sprite">
            <thead class="table table-dark">
                <tr>
                    <th class="text-center" style="width: 100px;"><i class="si si-user"></i></th>
                    <th>Nombre</th>
                    <th class="d-none d-sm-table-cell" style="width: 20%;">Email</th>
                    <th class="d-none d-md-table-cell" style="width: 20%;">Fecha</th>
                    <th class="d-none d-md-table-cell" style="width: 30%;">Lugar</th>
                    <th class="text-center" style="width: 30%;">Acciones</th>
                </tr>
            </thead>
                <tbody>
                   <tr v-for="cotizacion in cotizaciones" :key="cotizacion.index"> 
                       <td class="text-center">
                            <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar12.jpg" alt="">
                        </td>
                        <td class="font-w600">{{cotizacion.name}}</td>
                        <td class="d-none d-sm-table-cell">{{cotizacion.email}}</td>
                        <td class="d-none d-md-table-cell">
                            <span class="badge badge-info">{{cotizacion.date}}</span>
                        </td>
                        <td class="d-none d-sm-table-cell">{{cotizacion.place}}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" @click="verCotizacion(cotizacion)" data-toggle="tooltip" title="" data-original-title="Edit">
                                    <a class="si si-eyeglasses"></a>
                                </button>

                                <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" @click="eliminarCotizacion(cotizacion)" data-toggle="tooltip" title="" data-original-title="Edit">
                                    <a class="fa fa-times"></a>
                                </button>
                                
                            
                            </div>
                        </td>
                   </tr>
               </tbody>
        </table>
    </div>
<!-- Modal: Ver datos de cotización -->
    <div class="modal fade" id="verCotizacion" tabindex="-1" role="dialog"  
        v-for="cotizacion2 in cotizaciones2" :key="cotizacion2.index">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
        <!--Header-->
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">datos de {{cotizacion.name}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                    </div>
        <!--Body-->
                    <div class="modal-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Corre</th>
                                <th>Lugar del evento</th>
                                <th>Fecha</th>
                                <th>Telefono</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <th scope="row">{{cotizacion2.id}}</th>
                                <td>{{cotizacion2.name}}</td>
                                <td>{{cotizacion2.email}}</td>
                                <td>{{cotizacion2.place}}</td>
                                <td>{{cotizacion2.date}}</td>
                                <td>{{cotizacion2.phone}}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
        <!--Footer-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
    </div>
<!-- Modal: fin de modal -->
</div>        
</template>

<script>
export default {
    data(){
        return{
            cotizacion:{
                'id':'',
                'name':'',
                'place':'',
                'date':'',
                'email':'',
                'phone':'',
            },

            cotizaciones:[],

            cotizacion2:{
                'name':'',
                'place':'',
                'date':'',
                'email':'',
                'phone':'',
            },
            cotizacion2:[],
         
        }
    },

    created(){
        this.obtenerCotizaciones()
    },

    methods:{
        obtenerCotizaciones: function(){
                let URL = 'cotizaciones';
                axios.get(URL).then((response)=>{
                    this.cotizaciones = response.data;
                    console.log(this.cotizaciones);
                }).catch((error)=>{
                    console.log(error.data);
                });
                
        },

        eliminarCotizacion: function(cotizacion){
                let URL = 'cotizacion/' + cotizacion.id;
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
                                    location.reload();
                                });
                        Swal.fire(
                        'Eliminado!',
                        'La tarea se a eliminado',
                        'success'
                        )
                            }
                        });       
        },

        verCotizacion2:function(cotizacion){
            let URL = 'quotation';
                axios.get(URL).then((response)=>{
                    this.cotizaciones = response.data;
                    console.log(this.cotizaciones);
                }).catch((error)=>{
                    console.log(error.data);
                });
        },

        verCotizacion: function(){
            $('#verCotizacion').modal('show');
        },
    }
}
</script>
