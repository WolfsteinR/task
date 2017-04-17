@extends('head')
@section('content')
    <h1>Добавить автора</h1>
    <form action="/create_author" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" class="form-control" name="surname" placeholder="Фамилия *">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Имя *">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="patronymic" placeholder="Отчество *">
        </div>
        <div class="form-group">
            <input type="date" class="form-control" name="birthday" placeholder="День Рождения">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-default" value="Добавить">
        </div>
    </form>
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