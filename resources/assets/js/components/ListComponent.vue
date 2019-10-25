<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">

                        Book List
                    </div>

                    <div class="card-body">
                      <button class='btn btn-primary btn-block'>Add a Book</button>
                    </div>
                    <table class="table" >
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Description</th>
      <th scope="col">Publication</th>
    </tr>
  </thead>
  <tbody >
    
    <tr :v-for="(book, index) in books">
        
      <td>{{index + 1}}</td>
    <td>{{book.title}}</td>
      <td>{{book.author}}</td>
       <td>{{book.description}}</td>
        <td>{{book.publication}}</td>
      <td>
            <button  class="btn btn-info">Edit</button>
            <td><button  class="btn btn-danger">Delete</button></td>
    </tr>
   
  </tbody>
</table>
  <!-- use Bootstrap Modal for Create-->
    <!-- have to create method to load modal -->
    <div class="modal fade" id="create-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add a Book</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <div class="alert alert-danger" v-if="errors.length > 0">
                    <ul>
                        <li :v-for="error in errors">{{error}}</li>
                    </ul>
                    </div>

              <label for="Name">Name</label>
              <!-- vue modal inputs on data() - -->
              <input v-model="book.name" type="text" id="name" class="form-control" />
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <!-- vue modal inputs on data method book.body -->
              <input v-model="book.description" type="text" id="description" class="form-control" />
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button @click="createBook" type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
   
   
   </div>
    </div>
    <div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Modal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="alert alert-danger" v-if="errors.length > 0">
                            <ul>
                                <li :v-for="error in errors">{{error}}</li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input v-model="new_update_book.name" type="text" id="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <input v-model="new_update_book.description" type="text" id="description" class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button @click="updateBook" type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

    
  </div>
                </div>
            </div>
       
</template>

<script>
    export default {
        data(){
       return {
           book:{
    
               title: "",
               author: "",
               description: "",
               publication:""
           },
           books: [],
           uri: "http://localhost:8000/api/books/",
            errors: [],
            new_update_book: [],
            image: 'images/loader1.gif',
            loading: false
      }
    },
    methods:{
       loadCreateModal() {
      $("#create-modal").modal("show");
    },

    loadUpdateModal(index){
            this.errors = [];
            $("#update-modal").modal("show");
            this.new_update_book = this.books[index]; //assigns tasks to new_update_task
    },
    createBook() { //axios call that takes name and body inputs and
    // pushes them into tasks array,  backend controllers, then MySQL database
      axios.post(this.uri, { title: this.book.title, author: this.book.author, 
      
      description: this.book.description, publication: this.book.publication })
      
      .then(response=> 
      {
          this.books.push(response.data.book);

          this.resetData();

          $("#create-modal").modal("hide")
          }).catch(error=>{

              this.errors =[];

              if(error.response.data.errors.title){
                  this.errors.push(error.response.data.errors.title[0])
              }
              if(error.response.data.errors.author){
                  this.errors.push(error.response.data.errors.author[0])
              }
          })
    },

    deleteBook(index){
                //need to confirm if user needs to delete item from list/database
                let confirmBox = confirm("Do you really want to delete this?");

                if(confirmBox == true){

                    axios.delete(this.uri + this.books[index].id)
                            .then(response=>{

                              this.$delete(this.books, index);
                               toastr.success(response.data.message);


                          }).catch(error=>{

                         console.log("Could not delete...")
                    });

                }


            },
        getAllBooks(){
             
            axios.get(this.uri).then(response =>{
                this.books = response.data.books;
                this.loading = true;
            });
        },
        resetData(){

                this.book.title = '';
                this.book.author = '';
                this.book.description= '';
                this.book.publiction= '';

            }
  
    },
    
    mounted() {
       
    this.getAllBooks();
    console.log("mounted")
  }
    }
</script>
