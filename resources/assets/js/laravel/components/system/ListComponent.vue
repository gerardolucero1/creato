<template>
   <div id="crud" class="row">
       <div class="col-xs-12">
           <h1>Tareas</h1>
       </div>
       <div class="col-sm-7">
           
            <button type="button" class="btn btn-primary pull-right" @click="agregarTarea()">
                            <i class=""></i> Tarea nueva
                        </button>
            
            <!-- lista de  listas tareas -->
           <table class="table table-hover table-sprite">
               <thead>
                   <tr>
                       <th>ID</th>
                       <th>Lista</th>
                       <th colspan="2">
                           &nbsp;
                       </th>
                   </tr>
               </thead>
               <tbody>
                   <tr v-for="lista in listas" :key="lista.index">
                       <td width="10px">{{lista.id}}</td>
                       <td>{{lista.name}}</td>
                       <td width="10px">
                           <a :href="'tarea/' + lista.id" class="btn btn-warning btn-sm">Ver</a>
                       </td>
                       <td width="10px">
                           <button @click="eliminarLista(lista)" class="btn btn-danger btn-sm">eliminar</button>
                       </td>
                   </tr>
               </tbody>
           </table>
       </div>
<!-- Modal agregar tareas -->  
       <div class="modal" id="agregarTarea" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar tarea nueva</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                            <div class="modal-body">
                            <div class="form-group">
                                <label for="nombre">nombre de tarea</label>
                                <input v-model="tarea.name" type="text" class="form-control" id="nombre" name="name" placeholder="nombre">
                            </div>
                            <div class="form-group">
                                <label for="otro">slug</label>
                                <input v-model="tarea.slug" type="text" class="form-control" id="otro" name="slug" placeholder="slug">
                            </div>
                            <div class="form-group">
                                <label for="categoria">categoria</label>
                                <input v-model="tarea.category" type="text" class="form-control" id="categoria" name="category" placeholder="categoria">
                            </div>
                            <div class="form-group">
                                <label for="lista">lista a la que pertenese</label>
                                
                               <select v-model="tarea.listTask_id" name="listTask_id" id="lista">
                                   <option value="">elije la lista</option>
                                    <option v-for="lista in listas" :key="lista.index" :value="lista.id">{{lista.name}}</option>
                               </select>
                                <!--<input v-model="tarea.listTask_id" type="text" class="form-control" id="lista" name="listTask_id" placeholder="lista"> -->
                            </div>
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" @click="guardarTarea()" >Save changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                    </div>
                </div>
            </div>      
   </div>
</template>

<script>
    export default {
         props:["listas"],
        data(){
            return{

                lista:{
                    'name': '',
                    'slug': '',
                    'blockList_id': '',
                },

                tarea:{
                    'listTask_id': '',
                    'name': '',
                    'slug': '',
                    'category': '',
                },
  
            }
        },
        created(){
            this.obtenerListas()
        },

        methods: {
        
            agregarLista: function(){
                   $('#agregarLista').modal('show');
            },

            guardarLista: function(){
                console.log(this.lista)
                let URL = 'lista';

                axios.post(URL, 
                    this.lista
                ).then((response) => {
                    location.reload();
                    $('#agregarLista').modal('hide');
                    console.log('se inserto datos');
                    })

            },

            verLista: function(lista){
                
            }, 
            eliminarLista: function(lista){
                let URL = 'lista/' + lista.id;
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'You wont be able to revert this!',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.value) {
                                axios.delete(URL).then((response) => {
                                    location.reload();
                                });
                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                            }
                        });       
            },
/* Tareas */
            agregarTarea: function(){
                $('#agregarTarea').modal('show');
               
            },

            guardarTarea: function(){
                console.log(this.tarea)
                let URL = 'tarea';

                axios.post(URL, 
                    this.tarea
                ).then((response) => {
                    $('#agregarTarea').modal('hide');
                    location.reload();
                    console.log('se inserto datos');
                    }

                )}, 

        }

    };
</script>

<style>

</style>
