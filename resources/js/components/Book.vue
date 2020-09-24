<template>
    <div class="container">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Select2</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
            <form @submit.prevent="createBook">
              <div class="col-md-8">
                <div class="form-group">
                    <input v-model="form.isbn" :class="{ 'is-invalid': form.errors.has('isbn') }" type="text" name="isbn" placeholder="ISBN" class="form-control">
                    <has-error :form="form" field="email"></has-error>
                </div>

                <div class="form-group">
                    <input v-model="form.book_name" :class="{ 'is-invalid': form.errors.has('book_name') }" type="text" name="book_name" placeholder="Book Name" class="form-control">
                    <has-error :form="form" field="book_name"></has-error>
                </div>

                <div class="form-group">
                    <input v-model="form.author" :class="{ 'is-invalid': form.errors.has('author') }" type="text" name="author" placeholder="Author Name" class="form-control">
                    <has-error :form="form" field="author"></has-error>
                </div>
           
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
             
              
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
            the plugin.
          </div>
        </div>

    </div>


</template>

<script>
    export default {

        data(){
            return{
                form: new Form({
                    isbn:'',
                    book_name:'',
                    author:'',
                })

            }
        },

     
        methods:{
            createBook(){
                // Submit the form via a POST request
                this.form.post('/storeBook')
                .then(({ data }) => { 
                    this.form.reset();
                    Toast.fire({
                    icon: 'success',
                    title: 'Book Stored Succfully'
                }) 
            })
            }
        },


        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
