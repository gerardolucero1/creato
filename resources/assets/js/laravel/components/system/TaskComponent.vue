<template>
   <div id="crud" class="row">
       <div class="col-xs-12">
           <h1>Tareas</h1>
       </div>
       <div class="col-sm-7">
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
                   <tr v-for="tarea in tareas" :key="tarea.index">
                       <td width="10px">{{tarea.id}}</td>
                       <td>{{tarea.name}}</td>
                       <td width="10px">
                           <a href="#" class="btn btn-warning btn-sm">editar</a>
                       </td>
                       <td width="10px">
                           <button @click="eliminarTarea(tarea)" class="btn btn-danger btn-sm">eliminar</button>
                       </td>
                   </tr>
               </tbody>
           </table>
       </div>
       <!-- Modal agregar tareas
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
                                <input v-model="tarea.listTask_id" type="text" class="form-control" id="lista" name="listTask_id" placeholder="lista">
                            </div>
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" @click="guardarTarea()" >Save changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                    </div>
                </div>
            </div>   -->  
   </div>
</template>

<script>
    export default {
         props:["tareas"],
        data(){
            return{

                tarea:{
                    'listTask_id': '',
                    'name': '',
                    'slug': '',
                    'category': '',
                },
  
            }
        },
        created(){
            this.obtenerTareas()
        },

        methods: {
        
            agregarTarea: function(){
                    $('#agregarTarea').modal('show');
               
            },

            guardarTarea: function(){
                console.log(this.tarea)
                let URL = 'tareas';

                axios.put(URL, 
                    this.tarea
                ).then((response) => {
                    $('#agregarTarea').modal('hide');
                    location.reload();
                    console.log('se inserto datos');
                    }

                )}, 

            eliminarTarea: function(tarea){
                let URL = 'tarea/' + tarea.id;
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
        }

    };
</script>

<style>

</style>
