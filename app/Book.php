<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name', 'publishing_office', 'year', 'edition', 'language', 'cover'];
    //
    public function authors()
    {
        return $this->belongsToMany('App\Author', 'author_book', 'book_id', 'author_id');
    }
}
