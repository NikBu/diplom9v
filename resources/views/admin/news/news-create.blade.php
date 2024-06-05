@extends('layouts.admin')
@section('page.title', 'Создание новости')
@section('content')
    <form action="{{ route('news.store') }}" method="post">
        @csrf
        <label for="title" class="input-field">Заголовок</label>
        <input type="text" name="title" class="input-field" required>
        <label for="content" class="input-field">Контент</label>
        <textarea name="content" class="input-field" rows="4" required></textarea>
        <label for="published_at" class="input-field">Дата публикации</label>
        <input type="datetime-local" name="published_at" class="input-field" required>
        <button type="submit" class="btn">Создать</button>
    </form>
@endsection