@extends('layouts.admin')
@section('page.title', 'Создание лота')
@section('content')
<form action="{{ route('items.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="name">Наименование</label>
    <input id="name" class="input-field" type="text" name="name" value="{{ old('name') }}" required>
    <label for="description">Описание</label>
    <textarea id="description" class="input-field" name="description" required>{{ old('description') }}</textarea>
    <label for="price">Цена(Руб.)</label>
    <input id="price" class="input-field" type="number" name="price" step="0.01" value="{{ old('price') }}" required>
    <label for="quantity">Количество(Шт.)</label>
    <input id="quantity" class="input-field" type="number" name="quantity" value="{{ old('quantity') }}" required>
    <label for="categories">Категории</label>
    <br>
    <select id="categories" name="categories[]" multiple>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <br>
    <label for="image">Изображения</label><br>
    <input type="file" name="images[]" accept="image/*" multiple><br><br>
    <button type="submit" class="btn">Создать</button>
</form>
@endsection