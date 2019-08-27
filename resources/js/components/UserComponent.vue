<template>
    <div class="container">
        <div class="row mt-5">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users Table</h3>

                <div class="card-tools">
                    <button class="btn btn-success" @click="newModal">Add New <i class="fa fa-user-plus"></i></button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Registered At</th>
                        <th>Modify</th>
                  </tr>



                </tbody></table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">

              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>



    <!-- Modal -->

    </div>



</template>

<script>
    export default {
        data() {
            return {
                editmode: false,
                users : {},
                form: {
                    id:'',
                    name : '',
                    email: '',
                    password: '',
                    type: '',
                    bio: '',
                    photo: ''
                }
            }
        },
        methods: {
            newModal(){
                this.editmode = false;
                // this.form.reset();
                alert('carakp');
                $('#addNew').modal('show');
            },
        }
    }
</script>
