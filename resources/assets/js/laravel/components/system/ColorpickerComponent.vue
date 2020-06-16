<style  scoped>
    .margin-negativo{
        margin-left: 0px;
    }

    .margin-negativo2{
        margin-left: 30px;
    }
</style>
<template>
    <div class="col-md-6 justify-content-around d-flex align-items-center  margin-negativo" v-if="color.length !== 0">
        <ColorPicker class="" :width="150" :height="200" :disabled="false" :startColor="color" @colorChange="onColorChange"/>
            <div class="margin-negativo2">
            <p>Selected color: </p>
            <p>{{ color }}</p>
            <svg height="32" width="32">
            <circle cx="16" cy="16" r="15" :fill="color" />
            </svg>
        </div>
        
    </div>
</template>

<script>
import ColorPicker from 'vue-color-picker-wheel';

export default {
  name: 'app',
  data(){
        return{
            color: "",
            colorNuevo: {
                'color' : ''
            }
        }
    },
    created(){
            this.obtenerDatos();
        },
  components: {
    ColorPicker
  },
  computed: {
            setColor: function(){
                let color = this.color;
                return color;
            },
  },

  methods: {
      obtenerDatos: function(){
                let URL = '/index/color';
                axios.get(URL).then((response)=>{
                    this.color = response.data.color;
                    console.log(response.data.color)
                });     
            },
    onColorChange(color) {
        this.color = color;
        this.colorNuevo.color = color;
      console.log('Color has changed to: ', color);
      this.enviarColor();
    },
    enviarColor(){
  
               let URL = '/configuracion/color/' + 1;

                axios.post(URL, 
                    this.colorNuevo
                ).then((response) => {
        
                })
        },
  }
};
</script>


