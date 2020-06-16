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
                            <h3 class="block-title">Editor de mesas</h3>
                        </div>
                        <div v-if="tables.lenght != 0" class="block-content">
                            <div class="col-md-12 d-flex justify-content-start align-items-center flex-wrap">
                                <div class="table-icon mt-3" style="position: relative;" v-for="(item, index) in tables" :key="index" @click="selectTable(item)">
                                    <img src="https://images.vexels.com/media/users/3/148881/isolated/preview/5acbf09ec9202ad5bbed61d97a086ec4-icono-de-mesa-de-oficina-by-vexels.png" alt="">
                                    <p class="text-center">Mesa {{ item.name }}</p>
                                    <p class="text-center" style="position: absolute; top: 0; left: 0;">
                                        <span class="badge badge-pill badge-danger">{{ item.capability }}</span>
                                    </p>
                                    
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
            tables: []
        }
    },

    mounted(){
        this.getTables()
    },

    methods: {
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