<style>
    .drag-zone{
        background-color: blue;
        width: 100%;
        padding-top: 100%; /* 1:1 Aspect Ratio */
        position: relative; /* If you want text inside of it */
    }

    .picture{
        position: absolute;
        top: 0;
        left: 0;
        touch-action: none;
    }

    .picture img{
        width: 50px;
        height: 50px;
    }

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
                <ul class="list-group" v-for="(invitado, index) in invitados" :key="index">
                    <li class="list-group-item" style="border-bottom: 1px solid rgba(228, 231, 237, 1); margin-top: 5px;">{{ invitado.name }} {{ invitado.lastName }} - <span class="badge badge-primary badge-pill text-right" style="cursor: pointer;" @click="sentarInvitado(invitado)">ASIGNAR</span>
                        <ul class="list-group" v-for="(companion, index) in invitado.companions" :key="index">
                            <li class="list-group-item d-flex justify-content-between align-items-center" style="border-left: 6px solid red; border-bottom: 1px solid rgba(228, 231, 237, 1); margin-top: 5px;">{{ companion.name }} {{ companion.lastName }} <span class="badge badge-primary badge-pill" style="cursor: pointer;" @click="sentarAcompanante(companion)">ASIGNAR</span></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <section class="drag-zone">
                    <div v-for="(invitado, index) in invitadosSentados" :key="index" class="invitado">
                        <div v-if="invitado.companions" class="picture draggable" :data-tipo="'invitado'" :data-x="invitado.dataX" :data-y="invitado.dataY" :data-id="invitado.id" :style="{ transform: 'translate(' + invitado.dataX + 'px,' + invitado.dataY + 'px)' }" @click="obtenerInvitado(invitado)">
                            <img v-if="invitado.genere == 'MALE'" src="https://image.flaticon.com/icons/png/512/219/219957.png" alt="">
                            <img v-else src="https://image.flaticon.com/icons/png/512/219/219961.png" alt="">
                            <div class="acciones">
                                <button @click="eliminarInvitado(invitado, index, tipo = 'invitado')">Eliminar</button>
                            </div>
                        </div>
                        <div v-else class="picture draggable" :data-tipo="'acompanante'" :data-x="invitado.dataX" :data-y="invitado.dataY" :data-id="invitado.id" :style="{ transform: 'translate(' + invitado.dataX + 'px,' + invitado.dataY + 'px)' }" @click="obtenerInvitado(invitado)">
                            <img v-if="invitado.genere == 'MALE'" src="https://image.flaticon.com/icons/png/512/219/219957.png" alt="">
                            <img v-else src="https://image.flaticon.com/icons/png/512/219/219961.png" alt="">
                            <div class="acciones">
                                <button @click="eliminarInvitado(invitado, index, tipo = 'acompanante')">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</template>

<script>
    import interact from 'interactjs';

    export default {
        /*
        props: [
            'invitados',
        ],
        */
        data(){
            return{
                invitados: [],
                invitadosSentados: [],
                invitado: '',
                isActive: false,
            }
        },
        created(){
            this.obtenerInvitados();
        },
        mounted(){
            // target elements with the "draggable" class
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

                    axios.put(URL, {
                        'dataX': dataX,
                        'dataY': dataY,
                        'seated': true,
                        'tipo': tipo,
                    }).then((response) => {
                        console.log('Invitado acomodado');
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
                    
                })

        },

        methods: {
            activarSidebar: function(){
                if(this.isActive){
                    this.isActive = false;
                }else{
                    this.isActive = true;
                }
            },

            obtenerInvitados: function(){
                let URL = '/cliente/tables/invitados';

                axios.get(URL).then((response) => {
                    this.invitados = response.data;

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