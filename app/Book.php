<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    // model for book api list

    protected $fillable = ['title', 'author', 'description', 'publication'];
}
