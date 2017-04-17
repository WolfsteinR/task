<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Book;

class BookController extends Controller
{
    /**
     * Вывод списка книг
     *
     * @var array
     */
    public function index() {
        $books = array();
        $books = Book::orderBy('name')->get();
        return view('welcome', ['books' => $books]);
    }

    /**
     * Создание новой книги
     *
     * @var array
     */
    public function create(Request $request) {

        $this->validate($request, [
            'name' => 'required|max:255',
            'author' => 'required',
			'cover' => 'mimes:jpeg,jpg,bmp,png'
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
		$book->authors()->sync($author_id);

        return redirect('/');
    }

    /**
     * Вывод формы для создания новой книги
     *
     * @var array
     */
    public function create_form() {
        $authors = array();
        $authors = DB::select('select id, name, surname, patronymic from authors');
        return view('form.create_book', ['authors' => $authors]);
    }

}
