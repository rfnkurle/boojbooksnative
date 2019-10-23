<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class ApiController extends Controller

//controller methods need to match api routes
{
    public function getAllBooks() {
        // 
      }
  
      public function createBook(Request $request) {
    $book = new Book;
    $book->title = $request->title;
    $book->author = $request->author;
    $book->description = $request->description;
    $book->publication =$request->publication;
    $book->save();

    return response()->json([
        "message" => "book added"
    ], 201);
      }
  
      public function getBook($id) {
        // 
      }
  
      public function updateBook(Request $request, $id) {
        // 
      }
  
      public function deleteBook ($id) {
        // 
      }
    
}
