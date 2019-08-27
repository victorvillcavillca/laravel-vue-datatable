<template>
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

</template>

<script>

    import datables from 'datatables';
    export default {
        mounted() {
            this.getCategories()
        },

        data(){
            return{
                categories: []
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
               this.mytable()

           });
          },


        }



    }
</script>
