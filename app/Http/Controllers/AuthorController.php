<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorController extends Controller
{
    /**
     * Создание нового автора
     *
     * @var array
     */
    public function create(Request $request) {

        $this->validate($request, [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'patronymic' => 'required|max:255'
        ]);

        $author = new Author;
        $author->fill($request->all());
        $author->save();

        return redirect('/');
    }
}
