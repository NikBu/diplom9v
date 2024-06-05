@extends('layouts.admin')
@section('page.title', 'Редактирование новости')
@section('content')
    <form action="{{ route('news.update', $news->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="title" class="input-field">Заголовок</label>
        <input type="text" name="title" class="input-field" value="{{ $news->title }}" required>
        <label for="content" class="input-field">Контент</label>
        <textarea name="content" class="input-field" rows="4" required>{{ $news->content }}</textarea>
        <label for="published_at" class="input-field">Дата публикации</label>
        <input type="datetime-local" name="published_at" class="input-field" value="{{ \Carbon\Carbon::parse($news->published_at)->format('Y-m-d\TH:i') }}" required>
        <button type="submit" class="btn">Обновить</button>
    </form>
@endsection