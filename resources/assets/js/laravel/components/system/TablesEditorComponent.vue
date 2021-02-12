<style>
    .table-icon{
        width: 60px;
        height: 90px;
        padding: 2px;
        transition: all 0.4s;
        cursor: pointer;
        margin: 10px;
    }

    .table-icon:hover{
        background-color: rgb(231, 213, 205, 0.5);
    }

    .table-icon img{
        width: 100%;
    }
</style>

<template>
    <section>
        <div class="bg-image" :style="{ 'background-image': 'url(' + project.banner + ')' }">
            <div class="bg-black-op-75">
                <div class="content content-top text-center">
                    <div class="py-100">
                        <h1 class="font-w700 text-white mb-10">{{ project.title }}</h1>
                        <h2 class="h4 font-w400 text-white-op">Andábamos sin buscarnos, pero sabiendo que andábamos para encontrarnos.</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <div class="block-header block-header-default">
                            <div class="col-md-2">
                                <h3 class="block-title">Editor de mesas</h3>  
                            </div>
                            <div class="col-md-10">
                                <button type="button" class="btn btn-sm btn-rounded btn-alt-primary mr-5 mb-5" data-toggle="modal" @click="allSelected = !allSelected">
                                    <i class="fa fa-check"> Seleccionar todo</i>
                                </button>
                                <button v-if="mesasIds.length != 0" type="button" class="btn btn-sm btn-rounded btn-alt-danger mr-5 mb-5" data-toggle="modal" @click="eliminarseleccion(mesasIds)">
                                    <i class="si si-trash"></i>
                                </button>
                                <button v-if="mesasIds.length != 0" type="button" class="btn btn-sm btn-rounded btn-alt-info mr-5 mb-5" data-toggle="modal" @click="editarseleccion(mesasIds)">
                                    <i class="si si-pencil"></i>
                                </button>
                            </div>
                        </div>
                        <div v-if="tables.lenght != 0" class="block-content">
                            <div class="col-md-12 d-flex justify-content-start align-items-center flex-wrap">
                                <div class="table-icon mt-3" style="position: relative;" v-for="(item, index) in tables" :key="index">
                                    <input type="checkbox" :value="item.id" v-model="mesasIds">
                                    <div @click="selectTable(item)">
                                        <img src="https://images.vexels.com/media/users/3/148881/isolated/preview/5acbf09ec9202ad5bbed61d97a086ec4-icono-de-mesa-de-oficina-by-vexels.png" alt="">
                                        <p class="text-center">Mesa {{ item.name }}</p>
                                        <p class="text-center" style="position: absolute; top: 18px; left: 0;">
                                            <span class="badge badge-pill badge-danger">{{ item.capability }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-else class="block-content">
                            <h2>No se han cargado las mesas</h2> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'TablesEditor',

    props: [
        'project'
    ],

    data(){
        return{
            tables: [],
            
		    allSelected: false,
            mesasIds: []
        }
    },

    mounted(){
        this.getTables()
    },

    watch:{
        allSelected() {
        
                if(this.allSelected){
                    this.mesasIds =[]
                    this.tables.forEach(item => {
                        this.mesasIds.push(item.id);
                    })
                }
                else(this.mesasIds =[])
            
        },
    },

    methods: {

        eliminarseleccion: function(mesasIds){
            console.log(mesasIds);
            
            let URL = '/dashboard/proyectos/mesas-editor/eliminarselect';

            Swal.fire({
                title: '¿Quieres eliminar las mesas seleccionadas? ',
                text: "No podras revertir esta accion",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, ¡eliminalas!',
                cancelButtonText: '¡No las elimines!'
                }).then((result) => {
                if (result.value) {
                    axios.post(URL, this.mesasIds).then((response) => {
                        Swal.fire(
                            'Buen trabajo!',
                            'mesas eliminadas',
                            'success'
                        );
                        this.getTables();
                        this.mesasIds =[]
                    }).catch((error) => {
                        console.log(error.data);
                    });
                }
            });
        },

         editarseleccion(mesasIds){
             console.log(mesasIds);

            let URL = '/dashboard/proyectos/mesas-editor/tables/multiple'

            const { value: table } = Swal.fire({
                title: 'Ingresa el numero de invitados',
                input: 'text',
                showCancelButton: true,
                inputValidator: (value) => {
                    if (!value) {
                        return 'El numero de sillas no puede ir vacio'
                    }else{
                        axios.post(URL,{
                            'id': this.mesasIds,
                            'value': value
                        }).then((response) => {   
                            Swal.fire({
                                title: 'Correcto',
                                text: 'Mesas editadas',
                                type: 'success',
                                showConfirmButton: false,
                                timer: 1500,
                                onClose: () => {
                                    this.getTables();
                                    this.mesasIds =[];
                                }
                            })           
                            
                        }).catch((error) => {
                            console.log(error.data);
                        })
                    }
                }
            })
        },
        
        async getTables(){
            try {
                let URL = `/dashboard/proyectos/mesas-editor/tables/${this.project.id}`
                let response = await axios.get(URL)

                if (response) {
                    this.tables = response.data
                }
            } catch (error) {
                console.log(error)
            }
        },

        selectTable(item){
            let URL = '/dashboard/proyectos/mesas-editor/tables/'

            const { value: table } = Swal.fire({
                title: 'Ingresa el numero de invitados',
                input: 'text',
                showCancelButton: true,
                inputValidator: (value) => {
                    if (!value) {
                        return 'El numero de sillas no puede ir vacio'
                    }else{
                        axios.put(URL, {
                            'id': item.id,
                            'value': value
                        }).then((response) => {   
                            Swal.fire({
                                title: 'Correcto',
                                text: 'Mesa editada',
                                type: 'success',
                                showConfirmButton: false,
                                timer: 1500,
                                onClose: () => {
                                    this.getTables();
                                }
                            })           
                            
                        }).catch((error) => {
                            console.log(error.data);
                        })
                    }
                }
            })
        }
    }

}
</script>