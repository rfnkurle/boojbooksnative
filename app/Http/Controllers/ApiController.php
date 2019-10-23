<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class ApiController extends Controller

//controller methods need to match api routes
{
    public function getAllBooks() {
        $books = Book::get()->toJson(JSON_PRETTY_PRINT);
    return response($books, 200);
    // will serialize the object data return by eloquent into  JSON. The JSON is returned with the response code 200.
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
        //   checks if a student record with the given id exists. If it does, it queries 
        // the database using eloquent to return the record with matching id in JSON with 200 as the response code.
       
        if (Book::where('id', $id)->exists()) {
            $book = Book::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($book, 200);
          } else {
            return response()->json([
              "message" => "book not found"
            ], 404);
          }
      }
  
      public function updateBook(Request $request, $id) {
        if (Book::where('id', $id)->exists()) {
            $book = Book::find($id);
            $book->title = is_null($request->title) ? $book->title : $request->title;
            $book->author = is_null($request->author) ? $book->author : $request->author;
            $book->description = is_null($request->description) ? $book->description : $request->description;
            $book->publication = is_null($request->publication) ? $book->publication : $request->publication;
            $book->save();
    
            return response()->json([
                "message" => "updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "book not found"
            ], 404);
            
        }
      }
  
      public function deleteBook ($id) {
        if(Book::where('id', $id)->exists()) {
            $book = Book::find($id);
            $book->delete();
    
            return response()->json([
              "message" => "book infromation deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "Book not found"
            ], 404);
          }
      }
    
}
