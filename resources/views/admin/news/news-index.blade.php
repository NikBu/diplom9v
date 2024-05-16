@extends('layouts.admin')
@section('page.title', 'Новости')
@section('content')
    <h2 class="float-left">Новости</h2>
    <a class="btn-create float-right" href="{{ route('news.create') }}">Create News Article</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Заголовок</th>
                <th>Дата публикации</th>
                <th>Содержание</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $article)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->published_at }}</td>
                <td>{{ $article->content}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection