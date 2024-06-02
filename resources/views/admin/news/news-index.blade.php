@extends('layouts.admin')
@section('page.title', 'Новости')
@section('content')
    <h2 class="float-left">Новости</h2>
    <a class="btn-create float-right" href="{{ route('news.create') }}">Создать новую статью</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Заголовок</th>
                <th>Дата публикации</th>
                <th>Содержание</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $article)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->published_at }}</td>
                <td>{{ $article->content}}</td>
                <td>
                    <a href="{{ route('news.edit', $article->id) }}" class="btn">Изменить</a>
                    <form action="{{ route('news.destroy', $article->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены, что хотите удалить данную статью?')">Удалить</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection