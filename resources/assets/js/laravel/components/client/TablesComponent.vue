<style>
    .drag-zone{
        background-color: blue;
        width: 100%;
    }

    .picture{
        position: absolute;
        top: 0;
        left: 0;
        touch-action: none;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    /* .picture img{
        width: 30px;
        height: 30px;
    } */

    .sidebar-invitados{
        background-color: white;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 100;
        width: 30vw;
        height: 100vh;
        -webkit-box-shadow: 2px 0px 8px -2px rgba(0,0,0,0.75);
        -moz-box-shadow: 2px 0px 8px -2px rgba(0,0,0,0.75);
        box-shadow: 2px 0px 8px -2px rgba(0,0,0,0.75);
    }

    .sidebar-invitados-button{
        width: 50px;
        height: 50px;
        top: 0;
        left: 0;
        margin-top: 14vh;
        margin-left: 30vw;
        background-color: white;
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    .sidebar-button{
        width: 50px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 30px;
        cursor: pointer;
    }

    .mini-sidebar{
        
    }

    .close-sidebar-invitados{
        margin-left: -30vw;
        transition: all 0.6s;
    }

    .open-sidebar-invitados{
        margin-left: 0;
        transition: all 0.6s;
    }

    .lista-invitados{
        width: 100%;
        height: 100vh;
        margin-top: -21vh;
        top: 0;
        left: 0;
        background-color: white;
        overflow-y: scroll;
    }

    .nombre-invitado{
        display: block;
        background-color: rgba(255, 255, 255, 0.5);
        color: black;
        border: 1px solid rgba(226, 226, 226, 1);
        text-align: center;
        font-size: 10px;
    }

    .resultadoInvitados{
        position: absolute;
        z-index: 3000;
        background-color: white;
        overflow: scroll; 
        max-height: 300px;
        -webkit-box-shadow: 0px 5px 5px -2px rgba(38,38,38,1);
-moz-box-shadow: 0px 5px 5px -2px rgba(38,38,38,1);
box-shadow: 0px 5px 5px -2px rgba(38,38,38,1);
padding: 0;

    }

    .contenedor-invitado{
        border-bottom:none;
        padding-top: 8px;
        padding-bottom: 8px;
        height: 100%;
        margin-bottom: 0;
        font-size: 14px;
    }
    .contenedor-invitado:hover{
        border-bottom:none; 
        padding-top: 8px;
        padding-bottom: 8px;
        background:#F2F2F2;
        cursor: pointer;
        margin-bottom: 0;
        font-size: 14px;
    }

    .table-icon{
        width: 60px;
        height: 78px;
        padding: 2px;
        transition: all 0.4s;
        cursor: pointer;
        margin: 10px;
    }

    .table-icon:hover{
        background-color: #E7D5CD;
    }

    .table-icon img{
        width: 100%;
    }

    .activeClass{
        background-color: #E7D5CD;
    }

    .hidden{
        opacity: 0;
    }

    .btn-rounded{
        border: 1px solid #f76c6f;
        color: #f76c6f;
    }

    .btn-rounded:hover{
        background-color: #f76c6f;
        color: white;
    }
</style>

<template>
    <section class="container">
        <div class="sidebar-invitados" :class="[isActive ? 'close-sidebar-invitados' : 'open-sidebar-invitados']">
            <div class="sidebar-invitados-button">
                <div class="sidebar-button" @click="activarSidebar()">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
            <div class="lista-invitados">
                <h2 class="text-center mt-1">Mis invitados</h2>
                <div class="row">
                    <div class="col-md-12">
                        <buscador-component
                            :limpiar="limpiar"
                            placeholder="Buscar invitado"
                            event-name="resultadoInvitados"
                            :list="listaInvitados"
                            :keys="['name', 'lastName', 'secondLastName', 'phone' , 'email']"
                            class="form-control"
                        ></buscador-component>

                        <!-- Resultado Busqueda -->
                        <div class="row" v-if="resultadoInvitados.length < listaInvitados.length">
                            <div v-if="resultadoInvitados.length !== 0" class="col-md-12 resultadoInvitados">
                                <div v-for="invitado in resultadoInvitados.slice(0,5)" :key="invitado.index">
                                    <div class="row contenedor-invitado" v-on:click="sentarInvitado(invitado)" style="margin:0">
                                        <div class="col-md-3">
                                            <img class="img-fluid" v-if="invitado.genere == 'MALE'" src="/images/avatars/male.png" alt="" width="70%">
                                            <img class="img-fluid" v-else src="/images/avatars/female.png" alt="" width="70%">
                                        </div>
                                        <div class="col-md-8">
                                            <p style="padding:0; margin:0; line-height:14px; font-size:13px; "><span style="font-weight:bolder"> {{ invitado.name }} {{ invitado.lastName }} {{ invitado.secondLastName }}</span></p>
                                            <p style="padding:0; margin:0; line-height:14px; font-size:11px; ">{{ invitado.email }}</p>
                                            <p style="padding:0; margin:0; line-height:14px; font-size:11px; ">{{ invitado.phone }}</p>                                         
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mini-sidebar col-md-12">
                        <h5 class="text-center mt-1">Mis Grupos</h5>
                        <span class="badge badge-info mr-1 ml-1" style="cursor: pointer;" @click="obtenerGrupo('Todos')">Todos</span>
                        <span class="badge badge-info mr-1 ml-1" style="cursor: pointer;" @click="obtenerGrupo('General')">General</span>
                        <span class="badge badge-info mr-1 ml-1" style="cursor: pointer;" v-for="(group, index) in groups" :key="index" @click="obtenerGrupo(group.name)">{{ group.name }}</span>
                    </div>
                </div>
                <ul class="list-group" v-for="(invitado, index) in invitados" :key="index">
                    <li class="list-group-item" style="border-bottom: 1px solid rgba(228, 231, 237, 1); margin-top: 5px;">{{ invitado.name }} {{ invitado.lastName }} - <span class="badge badge-primary badge-pill text-right" style="cursor: pointer;" @click="sentarInvitado(invitado)">ASIGNAR</span>
                        <ul class="list-group" v-for="(companion, index) in invitado.companions" :key="index">
                            <li v-if="companion.status == 'CONFIRMADO'" class="list-group-item d-flex justify-content-between align-items-center" style="border-left: 6px solid red; border-bottom: 1px solid rgba(228, 231, 237, 1); margin-top: 5px;">{{ companion.name }} {{ companion.lastName }} <span class="badge badge-primary badge-pill" style="cursor: pointer;" @click="sentarAcompanante(companion)">ASIGNAR</span></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="block-rounded">
                    <div class="" style="padding: 10px;">
                        <div class="row">
                            <div class="col-md-10 d-flex justify-content-start align-items-center flex-wrap">
                            <label><input type="checkbox" v-model="ocultarNombres"> Ocultar nombres</label>
                        </div>
                        <div class="col-md-2 d-flex justify-content-start align-items-center flex-wrap">
                            <button type="button" class="btn btn-rounded min-width-125 mb-10" data-toggle="modal" data-target="#ajustarTamano">Ajustar tamaño</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="block-rounded">
                    <div class="" style="padding: 10px;">
                        <div class="col-md-12 d-flex justify-content-start align-items-center flex-wrap">
                            <div :class="[item.number == mesaSeleccionada ? 'activeClass' : '']" class="table-icon" v-for="(item, index) in mesas" :key="index" @click="mesaSeleccionada = item.number">
                                <img src="https://images.vexels.com/media/users/3/148881/isolated/preview/5acbf09ec9202ad5bbed61d97a086ec4-icono-de-mesa-de-oficina-by-vexels.png" alt="">
                                <p class="text-center">Mesa {{ item.name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-1 mb-4">
            <div class="col-md-12">
                <section class="drag-zone" id="wrap-zone" style="padding: 0;">
                    <img v-if="proyecto.plans" :src="proyecto.plans" width="100%" alt="">
                    <img v-else src="/images/creato.jpg" width="100%" alt="">
                    
                    <div v-for="(invitado, index) in invitadosSentados" :key="index" class="invitado">
                        <div v-if="invitado.companions" class="picture draggable d-flex justify-content-center align-items-center flex-column" :data-index="index" :data-tipo="'invitado'" :data-x="invitado.dataX" :data-y="invitado.dataY" :data-id="invitado.id" :style="{ transform: 'translate(' + invitado.dataX + 'px,' + invitado.dataY + 'px)' }" @click="obtenerInvitado(invitado)">
                            <img :width="`${size}px`" :height="`${size}px`" v-if="invitado.genere == 'MALE'" src="/images/avatars/male.png" alt="">
                            <img :width="`${size}px`" :height="`${size}px`" v-else src="/images/avatars/female.png" alt="">
                            <label :class="[ocultarNombres ? 'hidden' : '']" class="nombre-invitado" for="">{{ invitado.name }}</label>
                            
                            <!-- <div class="acciones">
                                <button @click="eliminarInvitado(invitado, index, tipo = 'invitado')">Eliminar</button>
                            </div> -->
                           
                        </div>
                        <div v-else class="picture draggable" :data-tipo="'acompanante'" :data-index="index" :data-x="invitado.dataX" :data-y="invitado.dataY" :data-id="invitado.id" :style="{ transform: 'translate(' + invitado.dataX + 'px,' + invitado.dataY + 'px)' }" @click="obtenerInvitado(invitado)">
                            <img :width="`${size}px`" :height="`${size}px`" v-if="invitado.genere == 'MALE'" src="/images/avatars/male.png" alt="">
                            <img :width="`${size}px`" :height="`${size}px`" v-else src="/images/avatars/female.png" alt="">
                            <label :class="[ocultarNombres ? 'hidden' : '']" class="nombre-invitado" for="">{{ invitado.name }}</label>
                            <!--
                            <div class="acciones">
                                <button @click="eliminarInvitado(invitado, index, tipo = 'acompanante')">Eliminar</button>
                            </div>
                            -->
                        </div>
                    </div>
                    
                </section>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="ajustarTamano" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Configuracion del tamaño del layout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" height="300px">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center align-items-center flex-column" style="height: 250px;">
                             <img :width="`${size2}px`" :height="`${size2}px`" src="/images/avatars/male.png" alt="">
                             <div class="form-group mt-4">
                                <label for="formControlRange">Ajusta el tamaño de la imagen</label>
                                <input type="range" class="form-control-range" id="formControlRange" min="5" max="60" v-model="size2">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" @click="guardarTamano">Guardar</button>
                </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import auth from "../../mixins/auth";
    import interact from 'interactjs';
    import BuscadorComponent from '../Shared/BuscadorComponent.vue';

    export default {
        components: {
            BuscadorComponent,
        },

        data(){
            return{
                invitados: [],
                invitadosSentados: [],
                invitado: '',
                isActive: false,
                proyecto: '',
                listaInvitados: [],
                resultadoInvitados: [],
                limpiar: false,

                groups: null,
                size: 0,
                size2: 30,

                mesas:[
                    // { name: '1', number: 1 },
                    // { name: '2', number: 2 },
                    // { name: '3', number: 3 },
                    // { name: '4', number: 4 },
                    // { name: '5', number: 5 },
                    // { name: '6', number: 6 },
                    // { name: '7', number: 7 },
                ],
                mesaSeleccionada: 1,
                ocultarNombres: false,
            }
        },

        computed:{
            
        },

        mixins: [
            auth
        ],

        created(){
            this.obtenerInvitados();
            this.obtenerProyecto();
            this.obtenerGrupos();
            this.obtenerMesas();

            this.$on('resultadoInvitados', resultadoInvitados => {
                this.resultadoInvitados = resultadoInvitados
            });
        },
        mounted(){
            this.obtenerTamano()

            //Ajustamos el contenedor al tamaño real en px de su 100% en cualquier monitor
            let wrap = document.getElementById('wrap-zone');
            let medidaX = wrap.offsetWidth;
            console.log(medidaX);

            wrap.style.width = medidaX + 'px';

            // Apuntamos al elemento con la clase "draggable"
            interact('.draggable')
            .draggable({

                // enable inertial throwing
                inertia: true,

                // enable autoScroll
                autoScroll: true,

                // call this function on every dragmove event
                onmove: dragMoveListener,
                // call this function on every dragend event
                onend: (event) => {
                    console.log(event);
                    let dataID = event.currentTarget.dataset.id;
                    let dataX = event.currentTarget.dataset.x;
                    let dataY = event.currentTarget.dataset.y;
                    let tipo = event.currentTarget.dataset.tipo;
                    
                    let URL = '/cliente/tables/' + dataID;
                    let URL2 = '/cliente/tables/asignar-mesa/' + dataID;

                    axios.put(URL, {
                        'dataX': dataX,
                        'dataY': dataY,
                        'seated': true,
                        'tipo': tipo,
                    }).then((response) => {
                        console.log('Invitado acomodado');

                        //Actualizar mesa
                        axios.put(URL2, {
                                    'tipo': tipo,
                                    'tableName': this.mesaSeleccionada,
                                }).then((response) => {   
                                    console.log('Funciono prroooooo')
                                    // this.obtenerInvitados()          
                                }).catch((error) => {
                                    console.log(error.data);
                                })
                    }).catch((error) => {
                        console.log(error.data);
                    })
                }
            })

            function dragMoveListener (event) {
                var target = event.target
                // keep the dragged position in the data-x/data-y attributes
                var x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx
                var y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy

                // translate the element
                target.style.webkitTransform =
                    target.style.transform =
                    'translate(' + x + 'px, ' + y + 'px)'
                

                // update the posiion attributes
                target.setAttribute('data-x', x)
                target.setAttribute('data-y', y)
            }

            // this is used later in the resizing and gesture demos
            window.dragMoveListener = dragMoveListener

            interact('.draggable')
                .on('doubletap', (event) => {
                    let dataID = event.currentTarget.dataset.id;
                    let index = event.currentTarget.dataset.index;
                    let tipo = event.currentTarget.dataset.tipo;

                    let URL = '/cliente/tables/limpiar/' + dataID;

                    axios.put(URL, {
                        'tipo': tipo,
                    }).then((response) => {   
                        Swal.fire({
                            title: 'Correcto',
                            text: 'El invitado ya no se encuentra asignado',
                            type: 'success',
                            showConfirmButton: false,
                            timer: 1500,
                            onClose: () => {
                                console.log('Yheaaaa');
                                this.invitadosSentados.splice(index, 1);
                                //this.obtenerInvitados();
                                location.reload();
                            }
                        })           
                        
                    }).catch((error) => {
                        console.log(error.data);
                    })
                })
                .on('hold', (event) => {
                    let dataID = event.currentTarget.dataset.id;
                    let index = event.currentTarget.dataset.index;
                    let tipo = event.currentTarget.dataset.tipo;

                    let URL = '/cliente/tables/asignar-mesa/' + dataID;

                    const { value: table } = Swal.fire({
                        title: 'Ingresa el nombre o numero de la mesa',
                        input: 'text',
                        showCancelButton: true,
                        inputValidator: (value) => {
                            if (!value) {
                                return 'El nombre o numero de mesa no puede ir vacio'
                            }else{
                                axios.put(URL, {
                                    'tipo': tipo,
                                    'tableName': value,
                                }).then((response) => {   
                                    Swal.fire({
                                        title: 'Correcto',
                                        text: 'Mesa asignada',
                                        type: 'success',
                                        showConfirmButton: false,
                                        timer: 1500,
                                        onClose: () => {
                                            this.obtenerInvitados();
                                        }
                                    })           
                                    
                                }).catch((error) => {
                                    console.log(error.data);
                                })
                            }
                        }
                    })
                })

        },

        methods: {
            async obtenerMesas(){
                try {
                    let URL = '/cliente/tables/obtener-mesas'
                    let response = await axios.get(URL)

                    if(response){
                        console.log(`Estas son las mesas: ${response.data}`)
                        this.mesas = response.data.reverse()
                    }
                } catch (error) {
                    console.log(error)
                }
            },

            async guardarTamano(){
               try {
                    let URL = '/cliente/tables/guardar-tamano'
                    let response = await axios.post(URL, {
                        size: this.size2
                    })

                    if(response){
                        this.size = this.size2
                    }
               } catch (error) {
                   console.log(error)
               }
            },

            async obtenerTamano(){
                try {
                    let URL = '/cliente/tables/obtener-tamano'

                    let response = await axios.get(URL)

                    if(response){
                        console.log(`Este es el tamano: ${response.data}`)
                        this.size = response.data
                    }
                } catch (error) {
                    console.log(error)
                }
            },

            obtenerGrupos: function(){
                let URL = '/cliente/groups/' + this.user.id;

                axios.get(URL).then((response) => {
                    this.groups = response.data;
                    console.log('Estos son los grupos: ', this.groups);
                }).catch((error) => {
                    console.log(error.data);
                })
            },

            obtenerGrupo: function(args){
                let URL = '/cliente/groups/group'

                this.invitadosSentados = []

                if(args == 'Todos'){
                    this.obtenerInvitados()
                    return
                }

                axios.post(URL, {
                    nombre: args,
                }).then((response) => {
                    this.invitados = response.data;
                    this.crearArregloInvitados(); 

                    // Recorremos el array de invitados y detectamos los que ya se encuentran sentados,
                    // y hacemos un push al arreglo 
                    // invitadosSentados
                    this.invitados.forEach((element) => {
                        if(element.seated){
                            this.invitadosSentados.push(element);
                        }
                    });

                    // Hacemos el mismo procedimiento pero ahora con los acompañantes de cada invitado.
                    this.invitados.forEach((element) => {
                        element.companions.forEach((item) => {
                            if(item.seated){
                                this.invitadosSentados.push(item);
                            }
                        });
                    })
                }).catch((error) => {
                    console.log(error.data);
                })
            },

            crearArregloInvitados: function(){
                if(this.invitados.length != 0){
                    let misInvitados = [];
                    let misAcompanantes = [];
                    this.invitados.forEach((element) => {
                        let invitado = JSON.parse(JSON.stringify(element));

                        misInvitados.push(invitado);
                    });

                    this.invitados.forEach((element) => {
                        element.companions.forEach((item) => {
                            let invitado = JSON.parse(JSON.stringify(item));

                            misAcompanantes.push(invitado);
                        });
                    });

                    this.listaInvitados = misInvitados.concat(misAcompanantes);
                }
            },

            obtenerMedidas: function(){
                let wrap = document.getElementById('wrap-zone');
                alert(wrap.offsetWidth);
            },

            activarSidebar: function(){
                if(this.isActive){
                    this.isActive = false;
                }else{
                    this.isActive = true;
                }
            },

            obtenerProyecto: function(){
                let URL = '/cliente/tables/proyecto';

                axios.get(URL).then((response) => {
                    this.proyecto = response.data;
                }).catch((error) => {
                    console.log(error.data);
                })
            },

            obtenerInvitados: function(){
                let URL = '/cliente/tables/invitados';

                axios.get(URL).then((response) => {
                    this.invitados = response.data;
                    this.crearArregloInvitados(); 

                    // Recorremos el array de invitados y detectamos los que ya se encuentran sentados,
                    // y hacemos un push al arreglo 
                    // invitadosSentados
                    this.invitados.forEach((element) => {
                        if(element.seated){
                            this.invitadosSentados.push(element);
                        }
                    });

                    // Hacemos el mismo procedimiento pero ahora con los acompañantes de cada invitado.
                    this.invitados.forEach((element) => {
                        element.companions.forEach((item) => {
                            if(item.seated){
                                this.invitadosSentados.push(item);
                            }
                        });
                    })
                  
                }).catch((error) => {
                    console.log(error.data);
                });
            },

            eliminarInvitado: function(invitado, index, tipo){                
                let URL = '/cliente/tables/limpiar/' + invitado.id;

                axios.put(URL, {
                    'tipo': tipo,
                }).then((response) => {   
                    Swal.fire(
                        'Correcto',
                        'El invitado ya no se encuentra asignado',
                        'success'
                    )                  
                    this.invitadosSentados.splice(index, 1);
                    
                }).catch((error) => {
                    console.log(error.data);
                })
                

            },

            sentarInvitado: function(invitado){
                this.limpiar = true;
                if(this.invitadosSentados.some((element) => {
                    return element == invitado
                })){
                    Swal.fire(
                        'Error',
                        'El invitado que intentas agregar ya esta asignado',
                        'error'
                    )
                }else{
                    this.invitadosSentados.push(invitado);
                }

                setTimeout(() => {
                    this.limpiar = false;
                }, 1000);
            },

            sentarAcompanante: function(companion){
                if(this.invitadosSentados.some((element) => {
                    return element == companion
                })){
                    Swal.fire(
                        'Error',
                        'El acompañante que intentas agregar ya esta asignado',
                        'error'
                    )
                }else{
                    this.invitadosSentados.push(companion);
                }  
            },

            obtenerInvitado: function(invitado){
                this.invitado = invitado;
            }
        }
    }
</script>