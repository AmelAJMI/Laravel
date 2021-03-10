<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookType;

class BookTypeController extends Controller
{
	
	
    public function getAllBookType() {
     $book_Types = BookType::get()->toJson(JSON_PRETTY_PRINT);
     return response($book_Types, 200);
    }
	
    public function getBookType($id) {
       $bookType = BookType::find($id);
	   if (is_null($bookType)){
		   return response()->json(['message' => 'BookType not found'], 404);
		   
	   }
	   
	   return response()->json($bookType::find($id),200);
    }
	
    public function createBookType(Request $request) {
		
       $book_Type = new BookType;
       $book_Type->book_type_name = $request->book_type_name;
       $book_Type->save();
	   
       return response()->json([
       "message" => "BookType record created"
     ], 201);
    }
	
    public function updateBookType(Request $request, $id) {
		
        $book_Type = BookType::find($id);
        $book_Type->book_type_name = $request->input('book_type_name');
		$book_Type->save();

        return "Successfully updated book #" . $book_Type->id; 
    }
	
	public function deleteBookType($id) {	
		
     if(BookType::where('id', $id)->exists()) {
       $book_Type = BookType::find($id);
       $book_Type->delete();

       return response()->json([
         "message" => "bookType deleted"
       ], 202);
     } else {
       return response()->json([
         "message" => "BookType not found"
       ], 404);
     }
    }
}
