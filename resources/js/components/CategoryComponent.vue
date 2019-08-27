<template>
  <div>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Crear</button>

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form @submit.prevent="editarNota(category)" v-if="modoEditar">
        <div class="modal-body">
          <h3>Editar categoria</h3>
            <input type="text" class="form-control mb-2"
            placeholder="Nombre de la category" v-model="category.name">
          <input type="text" class="form-control mb-2"
            placeholder="Descripción de la category" v-model="category.description">
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" @click="cancelarEdicion" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
          <button class="btn btn-warning" type="submit"><i class="fa fa-save"></i> Editar</button>
        </div>
      </form>

      <form @submit.prevent="agregar" v-else>
        <div class="modal-body">
          <h3>Agregar categoria</h3>
          <input type="text" class="form-control mb-2"
            placeholder="Nombre de la category" v-model="category.name">
          <input type="text" class="form-control mb-2"
            placeholder="Descripción de la category" v-model="category.description">
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
          <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

    <hr>
   <table class="table" id="example">
     <thead class="thead-dark">
       <tr>
         <th scope="col">#</th>
         <th scope="col">Name</th>
         <th scope="col">Descripción</th>
        <th scope="col">Acciones</th>
       </tr>
     </thead>

     <tbody>
        <tr v-for="(category, index) in categories" :key="index" >
          <th scope="row">{{ category.id}}</th>
          <td>{{category.name}}</td>
          <td>{{category.description}}</td>
          <td>
             <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Mostrar" ><i class="fa fa-eye"></i></button>
             <button type="button" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Editar" @click="editarFormulario(category)"><i class="fa fa-pencil"></i></button>
             <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Eliminar" @click="eliminarNota(category, index)"><i class="fa fa-trash"></i></button>
         </td>
       </tr>

     </tbody>
   </table>
  </div>
</template>

<script>

    import datables from 'datatables';
    import toastr from 'toastr';

    export default {
        mounted() {
          
          this.getCategories();

          
        },

        data() {
          return{
            categories: [],
            modoEditar: false,
            category: {name: '', description: ''},
            table : null,
          }
        },

        methods:{
          mytable(){
            $(function() {
              // $('#example').DataTable();
              this.table = $('#example').DataTable();

              $('[data-toggle="tooltip"]').tooltip()
            });
          },

          getCategories(){
            var urlCategories= "categories";
            axios.get(urlCategories).then(response=>{
              this.categories = response.data;
              this.mytable();
            });
          },
          // new methods
          agregar(){
            if(this.category.name.trim() === '' || this.category.description.trim() === ''){
              alert('Debes completar todos los campos antes de guardar');
              return;
            }
            const categoryNueva = this.category;
            this.category = {name: '', description: ''};

            axios.post('categories', categoryNueva)
              .then((res) =>{
                const categoryServidor = res.data;
                this.categories.push(categoryNueva);

                
                $('#exampleModal').modal('hide');
                toastr.success('Nueva categoria registrada');
              // this.table.ajax.reload();

                // this.getCategories();
                // $('#example').DataTable().data.reload();

                // $('#example').DataTable().draw();
                // .draw();
              })
          },

          editarFormulario(item){
            this.category.name = item.name;
            this.category.description = item.description;
            this.category.id = item.id;
            this.modoEditar = true;

            $('#exampleModal').modal('show');
          },

          editarNota(category){
            const params = {name: category.name, description: category.description};
            axios.put(`/categories/${category.id}`, params)
              .then(res=>{
                this.modoEditar = false;
                const index = this.categories.findIndex(item => item.id === category.id);
                this.categories[index] = res.data;

                $('#exampleModal').modal('hide');
                toastr.info('Nueva categoria editadas');
              })
          },

          eliminarNota(category, index){
            const confirmacion = confirm(`Eliminar category ${category.name}`);
            if(confirmacion){
              axios.delete(`/categories/${category.id}`)
                .then(()=>{
                  this.categories.splice(index, 1);
                  toastr.error('Categoria eliminada');
                })
            }
          },

          cancelarEdicion(){
            $('#exampleModal').modal('hide');
            this.category = {name: '', description: ''};
            this.modoEditar = false;
          }
        }
    }
</script>
