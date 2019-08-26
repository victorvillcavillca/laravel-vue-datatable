<template>
   <table class="table" id="example">
     <thead class="thead-dark">
       <tr>
         <th scope="col">#</th>
         <th scope="col">Name</th>
         <th scope="col">Email</th>
        <th scope="col">Acciones</th>
       </tr>
     </thead>
     <tbody>
       <tr v-for= "user in users">
         <th scope="row">{{ user.id}}</th>
         <td>{{user.name}}</td>
         <td>{{user.email}}</td>
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
            this.getUsers()
        },

        data(){
            return{
                users: []
            }
        },



        methods:{

            mytable(){
                 $(function() {
                 $('#example').DataTable();

                 $('[data-toggle="tooltip"]').tooltip()
               });   
            },
           
           getUsers(){
               var urlUsers= "users";
               axios.get(urlUsers).then(response=>{
               this.users = response.data;
               this.mytable()

           });   
          },


        }


        
    }
</script>
