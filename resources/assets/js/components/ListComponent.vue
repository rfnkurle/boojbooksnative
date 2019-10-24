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
  <tbody>
    
    <tr >
      <td>{{id}}</td>
    
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
               title: '',
               author: '',
               description: '',
               publication:''
           },
           books: [],
           uri: "http://localhost:8000/api/books/"
       }
    },
    methods:{
       
        loadBooks(){
             
            axios.get(this.uri).then(response =>{
                this.books = response.data.books;
                this.loading = true;
            });
        }
    },
    mounted() {
       
    this.loadBooks();
    console.log("mounted")
  }
    }
</script>
