<template>
  <div>
    <form @submit.prevent="editarNota(category)" v-if="modoEditar">
      <h3>Editar categoria</h3>
      <input type="text" class="form-control mb-2"
        placeholder="Nombre de la category" v-model="category.name">
      <input type="text" class="form-control mb-2"
        placeholder="Descripción de la category" v-model="category.description">
      <button class="btn btn-warning" type="submit">Editar</button>
      <button class="btn btn-danger" type="submit"
        @click="cancelarEdicion">Cancelar</button>
    </form>
    <form @submit.prevent="agregar" v-else>
      <h3>Agregar categoria</h3>
      <input type="text" class="form-control mb-2"
        placeholder="Nombre de la category" v-model="category.name">
      <input type="text" class="form-control mb-2"
        placeholder="Descripción de la category" v-model="category.description">
      <button class="btn btn-primary" type="submit">Agregar</button>
    </form>
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
       <tr v-for= "category in categories">
         <th scope="row">{{ category.id}}</th>
         <td>{{category.name}}</td>
         <td>{{category.description}}</td>
         <td>
             <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Mostrar"><i class="fa fa-eye"></i></button>
             <button type="button" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-pencil"></i></button>
             <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fa fa-trash"></i></button>
         </td>
       </tr>

     </tbody>
   </table>
  </div>
</template>

<script>

    import datables from 'datatables';

    export default {
        mounted() {
          this.getCategories()
        },

        data() {
          return{
            categories: [],
            modoEditar: false,
            category: {name: '', description: ''}
          }
        },

        methods:{
          mytable(){
            $(function() {
              $('#example').DataTable();

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
              })
          },

          editarFormulario(item){
            this.nota.nombre = item.nombre;
            this.nota.descripcion = item.descripcion;
            this.nota.id = item.id;
            this.modoEditar = true;
          },

          editarNota(nota){
            const params = {nombre: nota.nombre, descripcion: nota.descripcion};
            axios.put(`/notas/${nota.id}`, params)
              .then(res=>{
                this.modoEditar = false;
                const index = this.notas.findIndex(item => item.id === nota.id);
                this.notas[index] = res.data;
              })
          },

          eliminarNota(nota, index){
            const confirmacion = confirm(`Eliminar nota ${nota.nombre}`);
            if(confirmacion){
              axios.delete(`/notas/${nota.id}`)
                .then(()=>{
                  this.notas.splice(index, 1);
                })
            }
          },

          cancelarEdicion(){
            this.modoEditar = false;
            this.nota = {nombre: '', descripcion: ''};
          }


        }



    }
</script>
