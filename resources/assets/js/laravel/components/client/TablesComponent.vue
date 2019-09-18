<template>
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <section class="drag-zone">
                    <div v-for="(invitado, index) in invitadosNuevo" :key="index" class="invitado">
                        <div class="picture draggable" :data-x="invitado.dataX" :data-y="invitado.dataY" :data-id="invitado.id" :style="{ transform: 'translate(' + invitado.dataX + 'px,' + invitado.dataY + 'px)' }"></div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</template>

<script>
    import interact from 'interactjs';

    export default {
        props: [
            'invitados',
        ],
        data(){
            return{
                invitadosNuevo: this.invitados,
            }
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
                onend: function (event) {
                    let dataID = event.currentTarget.dataset.id;
                    let dataX = event.currentTarget.dataset.x;
                    let dataY = event.currentTarget.dataset.y;
                    
                    let URL = '/cliente/tables/' + dataID;

                    axios.put(URL, {
                        'dataX': dataX,
                        'dataY': dataY,
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

        },
    }
</script>

<style>
    .drag-zone{
        width: 100%;
        height: 80vh;
        background-color: blue;
        position: relative;
    }

    .picture{
        width: 50px;
        height: 50px;
        background-color: purple;
        position: absolute;
        top: 0;
        left: 0;
    }
</style>