<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookType extends Model
{
    protected $fillable = [
   'book_type_name'
 ];
 
  public function book(){
	  
	  return $this->belongsTo(Book::class);
  }
}
