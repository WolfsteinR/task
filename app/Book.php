<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    protected $fillable = ['name', 'publishing_office', 'year', 'edition', 'language', 'cover'];
    //
    public function authors()
    {
        return $this->belongsToMany('App\Author', 'author_book', 'book_id', 'author_id'); //->withPivot('column1', 'column2'); //, 'book_id', 'author_id'
    }
}
