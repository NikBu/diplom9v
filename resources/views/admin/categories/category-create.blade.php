@extends('layouts.admin')
@section('page.title', 'Создание категории')
@section('content')
<form action="{{ route('categories.store') }}" method="post">
    @csrf
    <label for="category">Название</label>
    <input id="category" class="input-field" type="text" @error('unfilled') is-invalid @enderror" name="category" value="{{ old('category') }}" required>

    <label for="description">Описание</label>
    <textarea id="description"  class="input-field" @error('unfilled') is-invalid @enderror" name="description" required>{{ old('description') }}</textarea>

    <select id="parent"  class="input-field"  @error('unfilled') is-invalid @enderror" name="parent" required>
        <option value="none">Нет родительской категории</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>

    @error('unfilled')
        <strong>{{ $message }}</strong>
    @enderror
 
    <button type="submit" class="btn">Сохранить категорию</button>
</form>
@endsection