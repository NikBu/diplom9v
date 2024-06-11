@extends('layouts.admin')
@section('page.title', 'Редактирование категории')
@section('content')
<form action="{{ route('categories.update', $category->id) }}" method="post">
    @csrf
    @method('PUT')
    <label for="category">Название</label>
    <input id="category" class="input-field" type="text" @error('unfilled') is-invalid @enderror" name="category" value="{{ $category->name }}" required>
    <label for="description">Описание</label>
    <textarea id="content" class="input-field" @error('unfilled') is-invalid @enderror" name="description">{{ $category->description }}</textarea>
    <select id="parent" class="input-field" @error('unfilled') is-invalid @enderror" name="parent" required>
        <option value="none">Нет родительской категории</option>
        @foreach ($categories as $cat)
            <option value="{{ $cat->id }}" {{ $cat->id == $category->parent_id ? 'selected' : '' }}>{{ $cat->name }}</option>
        @endforeach
    </select>
    @error('unfilled')
        <strong>{{ $message }}</strong>
    @enderror
    <button type="submit" class="btn">Сохранить изменения</button>
</form>
@include('includes.tinyMCE-script')
@endsection