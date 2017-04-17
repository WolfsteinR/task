@extends('head')
@section('content')
    <h1>Добавить книгу</h1>
    @if(count($authors) > 0)
        <form action="/create_book" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Название *">
            </div>
            <div class="form-group">
                <select name="author[]" class="form-control" multiple>
                    @foreach ($authors as $author)
                        <option value="{{$author->id}}">{{$author->surname}} {{$author->name}} {{$author->patronymic}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="publishing_office" placeholder="Издательство">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="year" placeholder="Год издания">
            </div>
            <div class="form-group">
                <input type="file" name="file">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-default" value="Добавить">
            </div>
        </form>
    @else
        <p class="alert alert-danger">Нет доступных авторов. <a href="/create-author">Добавьте автора</a></p>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection