@extends('layouts.admin')
@section('page.title', 'Edit News')
@section('content')
    <form action="{{ route('news.update', $news->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="title" class="input-field">Title</label>
        <input type="text" name="title" class="input-field" value="{{ $news->title }}" required>
        <label for="content" class="input-field">Content</label>
        <textarea name="content" class="input-field" rows="4" required>{{ $news->content }}</textarea>
        <label for="published_at" class="input-field">Published At</label>
        <input type="datetime-local" name="published_at" class="input-field" value="{{ \Carbon\Carbon::parse($news->published_at)->format('Y-m-d\TH:i') }}" required>
        <button type="submit" class="btn">Update News Article</button>
    </form>
@endsection