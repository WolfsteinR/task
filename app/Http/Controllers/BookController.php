<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Book;

class BookController extends Controller
{
    public function index() {
        $books = array();
        $books = Book::orderBy('name')->get();
        return view('welcome', ['books' => $books]);
    }

    public function create(Request $request) {

        $this->validate($request, [
            'name' => 'required|max:255',
            'author' => 'required',
        ]);
        $file = $request->file;
        if(!empty($file)) {
            $filename = $file->getClientOriginalName();
            $file->move('uploads', $filename);
        }
        $book = new Book;
        $author_id = $request->author;
        $book->fill($request->all());
        $book->cover = $filename;
        $book->save();
        foreach ($author_id as $id) {
            $book->authors()->attach(1, ['author_id'=>$id,'book_id'=>$book->id]);
        }

        return redirect('/');
    }

    public function create_form() {
        $authors = array();
        $authors = DB::select('select id, name, surname, patronymic from authors');
        return view('form.create_book', ['authors' => $authors]);
    }

}
