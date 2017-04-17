@extends('head')
@section('content')
    <h1>Список книг</h1>
    @if(count($books) > 0)
        <table class="table table-striped">
            <thead>
                <th>Название</th>
                <th>Автор</th>
                <th>Обложка</th>
                <th>Год издания</th>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{$book->name}}</td>
                        <td>
                            @if(count($book->authors) > 0)
                                @foreach ($book->authors as $author)
                                    {{$author->surname}} {{$author->name}}
                                @endforeach
                            @endif
                        </td>
                        <td><img src="/uploads/{{$book->cover}}" style="max-height:80px" class="img-responsive"></td>
                        <td>{{$book->year}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="alert alert-info">Список книг пуст</p>
    @endif
@endsection