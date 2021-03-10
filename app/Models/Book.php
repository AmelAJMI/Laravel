<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
   'name', 'author', 'book_type'
 ];
 
 public function bookType() {
	 
	 return $this->hasOne(BookType::class);
 }
}
