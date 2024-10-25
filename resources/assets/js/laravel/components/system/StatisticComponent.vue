<template>
    <section class="container">
        <div class="row gutters-tiny" v-if="datos.length != 0">
            <div class="col-md-6 col-xl-3">
                <a class="block block-link-shadow text-right" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-left mt-10">
                            <i class="si si-calendar fa-3x text-body-bg-dark"></i>
                        </div>
                        <div class="font-size-h3 font-w600">{{ datos[0].length }}</div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Proyectos {{ anoActual }}</div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a class="block block-link-shadow text-right" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-left mt-10">
                            <i class="si si-action-redo fa-3x text-body-bg-dark"></i>
                        </div>
                        <div class="font-size-h3 font-w600">{{ proyectosActuales[mesActual[0]] }}</div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">{{ mesActual[1] }} del {{ anoActual }}</div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a class="block block-link-shadow text-left" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-right mt-10">
                            <i class="si si-calendar fa-3x text-body-bg-dark"></i>
                        </div>
                        <div class="font-size-h3 font-w600">{{ datos[1].length }}</div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Proyectos {{ anoPasado }}</div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a class="block block-link-shadow text-left" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-right mt-10">
                            <i class="si si-action-undo fa-3x text-body-bg-dark"></i>
                        </div>
                        <div class="font-size-h3 font-w600">{{ proyectosPasados[mesActual[0]] }}</div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">{{ mesActual[1] }} del {{ anoPasado }}</div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" v-if="datacollection != null">
                
                <line-chart :chart-data="datacollection"></line-chart>
            </div>
        </div>
    </section>
</template>

<script>
import LineChart from '../charts/LineChart'

export default {
    components: {
        LineChart,
    },
    data(){
        return{
            datacollection: null,
            datos: [],
        }
    },
    mounted () {
        this.obtenerDatos()
    },
    computed: {
        anoActual: function(){
            return moment().format('YYYY')
        },

        anoPasado: function(){
            return moment().subtract(1, 'year').format('YYYY')
        },

        mesActual: function(){
            let mes = moment().format('L').split('/')
            let d = new Date();
            let month = new Array();
            month[0]    = "Enero";
            month[1]    = "Febrero";
            month[2]    = "Marzo";
            month[3]    = "Abril";
            month[4]    = "Mayo";
            month[5]    = "Junio";
            month[6]    = "Julio";
            month[7]    = "Agosto";
            month[8]    = "Septiembre";
            month[9]    = "Octubre";
            month[10]   = "Noviembre";
            month[11]   = "Diciembre";
            let n = month[d.getMonth()];
            
            let datos = [d.getMonth(), n]

            return datos
        },

        proyectosActuales: function(){
            if(this.datos.length != 0){
                let arregloActual = []
                let contador = 1

                while(contador <= 12){
                    let proyectos = 0
                    this.datos[0].forEach((element) => {
                        let mes = element.date.split('-')

                        if(contador == mes[1]){
                            proyectos++
                        }
                    })
                    arregloActual.push(proyectos)
                    contador++
                }
                return arregloActual
            }
        },

        proyectosPasados: function(){
            if(this.datos.length != 0){
                let arregloActual = []
                let contador = 1

                while(contador <= 12){
                    let proyectos = 0
                    this.datos[1].forEach((element) => {
                        let mes = element.date.split('-')

                        if(contador == mes[1]){
                            proyectos++
                        }
                    })
                    arregloActual.push(proyectos)
                    contador++
                }
                return arregloActual
            }
        },
    },
    methods: {
        crearGrafica (){
            this.datacollection = {
            labels: ['Enero','Febrero','Marzo','Abril','Mayo', 'Junio' , 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            datasets: [
                    {
                        label: moment().subtract(1, 'year').format('YYYY'),
                        backgroundColor: '#FF0066',
                        data: [
                            this.proyectosPasados[0],
                            this.proyectosPasados[1],
                            this.proyectosPasados[2],
                            this.proyectosPasados[3],
                            this.proyectosPasados[4],
                            this.proyectosPasados[5],
                            this.proyectosPasados[6],
                            this.proyectosPasados[7],
                            this.proyectosPasados[8],
                            this.proyectosPasados[9],
                            this.proyectosPasados[10],
                            this.proyectosPasados[11],
                        ]
                    },
                    {
                        label: moment().format('YYYY'),
                        backgroundColor: '#F57677',
                        data: [ 
                            this.proyectosActuales[0],
                            this.proyectosActuales[1],
                            this.proyectosActuales[2],
                            this.proyectosActuales[3],
                            this.proyectosActuales[4],
                            this.proyectosActuales[5],
                            this.proyectosActuales[6],
                            this.proyectosActuales[7],
                            this.proyectosActuales[8],
                            this.proyectosActuales[9],
                            this.proyectosActuales[10],
                            this.proyectosActuales[11],
                        ]
                    },
                ]
            }
        },

        obtenerDatos: function(){
            let URL = '/grafica-obtener-datos'

            axios.get(URL).then((response) => {
                this.datos = response.data
                this.crearGrafica()
            }).catch((error) => {
                console.log(error.data);
            })
        }
    }
}
</script>

<style>

</style>