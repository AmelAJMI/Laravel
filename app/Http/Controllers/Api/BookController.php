<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookType;

class BookController extends Controller
{
	
    public function getAllBooks() {
     $books = Book::get()->toJson(JSON_PRETTY_PRINT);
     return response($books, 200);
   }
   
    public function getBook($id) {
	   $book = Book::find($id);
	   if (is_null($book)){
		   return response()->json(['message' => 'Book not found'], 404);   
	   }
	   return response()->json($book::find($id),200);
    }
   
    public function createBook(Request $request) {
	   
	    $book = new Book;
        $book->book_type = $request->input('book_type');
        $book->name = $request->input('name');
        $book->author = $request->input('author');
		$book->save();

        return 'Book record successfully created with id ' . $book->id;    
   }
   
    public function updateBook(Request $request, $id) {
		
		$book = Book::find($id);
        $book->book_type = $request->input('book_type');
		$book->name = $request->input('name');
		$book->author = $request->input('author');
		$book->save();

        return "Successfully updated book #" . $book->id;
		 
    }
	
    public function deleteBook($id) {	
		
     if(Book::where('id', $id)->exists()) {
       $book = Book::find($id);
       $book->delete();

       return response()->json([
         "message" => "book deleted"
       ], 202);
     } else {
       return response()->json([
         "message" => "Book not found"
       ], 404);
     }
    }
}
