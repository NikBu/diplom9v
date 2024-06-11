@extends('layouts.admin')
@section('page.title', 'Изменение товара')
@section('content')
<form action="{{ route('items.update', $item->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="name">Наименование</label>
    <input id="name" class="input-field" type="text" name="name" value="{{ $item->name }}" required>
    <label for="description">Описание</label>
    <textarea id="content" class="input-field" name="description">{{ $item->description }}</textarea>
    <label for="price">Цена(Руб.)</label>
    <input id="price" class="input-field" type="number" step="0.01" name="price" value="{{ $item->price }}" required>
    <label for="quantity">Количество(Шт.)</label>
    <input id="quantity" class="input-field" type="number" name="quantity" value="{{ $item->quantity }}" required>
    <label for="categories">Категории</label><br>
    <select id="categories" name="categories[]" multiple>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" @if(in_array($category->id, $item->categories->pluck('id')->toArray())) selected @endif>{{ $category->name }}</option>
        @endforeach
    </select><br>
    <label for="images">Изобажения</label>
    <div class="carousel-container">
        @foreach ($item->images as $image)
            <div>
                <img src="{{ asset('/storage/' . $image->url) }}" alt="Image" style="max-width: 200px;">
                <input type="checkbox" name="images_to_delete[]" value="{{ $image->id }}"> Удалить
            </div>
        @endforeach
    </div>
    <button type="button" id="prev"><<</button>
    <button type="button" id="next">>></button>
    <br>
    <label for="new_images">Новые изображения</label><br>
    <input type="file" name="new_images[]" accept="image/*" multiple><br><br>
    <button type="submit" class="btn">Обновить</button>
</form>
@include('includes.tinyMCE-script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const container = document.querySelector('.carousel-container');
        document.getElementById('prev').addEventListener('click', function () {
            // Скролл влево на половину ширины контйнера
            container.scrollBy(-container.offsetWidth / 2, 0);
        });
        document.getElementById('next').addEventListener('click', function () {
            // Скролл вправо на половину ширины контйнера
            container.scrollBy(container.offsetWidth / 2, 0);
        });
    });
</script>
@endsection