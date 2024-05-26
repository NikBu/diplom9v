@extends('layouts.admin')
@section('page.title', 'Edit Item')
@section('content')
<form action="{{ route('items.update', $item->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="name">Name</label>
    <input id="name" class="input-field" type="text" name="name" value="{{ $item->name }}" required>
    <label for="description">Description</label>
    <textarea id="description" class="input-field" name="description" required>{{ $item->description }}</textarea>
    <label for="price">Price</label>
    <input id="price" class="input-field" type="text" name="price" value="{{ $item->price }}" required>
    <label for="quantity">Quantity</label>
    <input id="quantity" class="input-field" type="number" name="quantity" value="{{ $item->quantity }}" required>
    <label for="categories">Categories</label>
    <select id="categories" name="categories[]" multiple>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" @if(in_array($category->id, $item->categories->pluck('id')->toArray())) selected @endif>{{ $category->name }}</option>
        @endforeach
    </select>
    <label for="images">Images</label>
    <div class="carousel-container">
        @foreach ($item->images as $image)
            <div>
                <img src="{{ asset('/storage/' . $image->url) }}" alt="Image" style="max-width: 200px;">
                <input type="checkbox" name="images_to_delete[]" value="{{ $image->id }}"> Delete
            </div>
        @endforeach
    </div>
    <button type="button" id="prev">Previous</button>
    <button type="button" id="next">Next</button>
    <br>
    <label for="new_images">New Images</label>
    <input type="file" name="new_images[]" accept="image/*" multiple>
    <button type="submit" class="btn">Update Item</button>
</form>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const container = document.querySelector('.carousel-container');
        document.getElementById('prev').addEventListener('click', function () {
            // Scroll left by half the container's width
            container.scrollBy(-container.offsetWidth / 2, 0);
        });
        document.getElementById('next').addEventListener('click', function () {
            // Scroll right by half the container's width
            container.scrollBy(container.offsetWidth / 2, 0);
        });
    });
</script>
@endsection