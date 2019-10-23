<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booklist extends Model
{
    protected $table = 'Booklist';

    protected $fillable = ['title', 'author', 'description', 'publication date'];
}
