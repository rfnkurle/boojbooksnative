<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booklist extends Model
{
    protected $table = 'Booklist';
    // model for book api list

    protected $fillable = ['title', 'author', 'description', 'publication date'];
}
