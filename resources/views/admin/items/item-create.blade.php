@extends('layouts.admin')
@section('page.title', 'Create Item')
@section('content')
<form action="{{ route('item.store') }}" method="post">
    @csrf
    <label for="name">Name</label>
    <input id="name" class="input-field" type="text" name="name" value="{{ old('name') }}" required>
    <label for="description">Description</label>
    <textarea id="description" class="input-field" name="description" required>{{ old('description') }}</textarea>
    <label for="price">Price</label>
    <input id="price" class="input-field" type="text" name="price" value="{{ old('price') }}" required>
    <label for="quantity">Quantity</label>
    <input id="quantity" class="input-field" type="number" name="quantity" value="{{ old('quantity') }}" required>
    
    <label for="categories">Categories</label>
    <select id="categories" name="categories[]" multiple>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
      
    <button type="submit" class="btn">Save Item</button>
</form>
@endsection