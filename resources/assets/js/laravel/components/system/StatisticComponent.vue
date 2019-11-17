<template>
    <section class="container">
        <div class="row gutters-tiny">
            <div class="col-md-6 col-xl-3">
                <a class="block block-link-shadow text-right" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-left mt-10">
                            <i class="si si-drawer fa-3x text-body-bg-dark"></i>
                        </div>
                        <div class="font-size-h3 font-w600">2</div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Bloques</div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a class="block block-link-shadow text-right" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-left mt-10">
                            <i class="si si-list fa-3x text-body-bg-dark"></i>
                        </div>
                        <div class="font-size-h3 font-w600">3</div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Listas</div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a class="block block-link-shadow text-left" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-right mt-10">
                            <i class="si si-note fa-3x text-body-bg-dark"></i>
                        </div>
                        <div class="font-size-h3 font-w600">65</div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Tareas</div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3">
                <a class="block block-link-shadow text-left" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-right mt-10">
                            <i class="si si-check fa-3x text-body-bg-dark"></i>
                        </div>
                        <div class="font-size-h3 font-w600">32</div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Completadas</div>
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
            datacollection: null
        }
    },
    mounted () {
        this.fillData()
    },
    methods: {
        fillData (){
            this.datacollection = {
            labels: ['Enero','Febrero','Marzo','Abril','Mayo', 'Junio' , 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            datasets: [
                    {
                    label: '2018',
                    backgroundColor: '#FF0066',
                    data: [ 2, 1, 0, 2, 3, 2, 2, 1, 2, 2, 3, 2]
                    },
                    {
                    label: '2019',
                    backgroundColor: '#F57677',
                    data: [ 1, 0, 3, 3, 2, 1, 1, 2, 3, 4, 1, 0]
                    },
                ]
            }
        }
    }
}
</script>

<style>

</style>