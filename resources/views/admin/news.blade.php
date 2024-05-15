@extends('layouts.admin')
@section('page.title', 'Categories')
@section('content')
<form action="{{ route('category.store') }}" method="post">
    @csrf
    <label for="category">Name</label>
    <input id="category" class="input-field" type="text" @error('unfilled') is-invalid @enderror" name="category" value="{{ old('category') }}" required>

    <label for="description">Description</label>
    <textarea id="description"  class="input-field" @error('unfilled') is-invalid @enderror" name="description" required>{{ old('description') }}</textarea>

    <select id="parent"  class="input-field"  @error('unfilled') is-invalid @enderror" name="parent" required>
        <option value="none">No parent category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>

    @error('unfilled')
        <strong>{{ $message }}</strong>
    @enderror
 
    <button type="submit" class="btn">Save Category</button>
</form>
@endsection