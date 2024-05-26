@extends('layouts.admin')
@section('page.title', 'Items')
@section('content')
    <h2 class="float-left">Items</h2>
    <a class="btn-create float-right" href="{{ route('items.create') }}">Create Item</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Название</th>
                <th>Описание</th>
                <th>Количество</th>
                <th>Цена</th>
                <th>Категории</th>
                <th>Изображение</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $key => $item)
            <tr>
                <td>
                    {{ $key + 1 }}
                </td>
                <td>
                    {{ $item->name }}
                </td>
                <td>
                    {{ $item->description }}
                </td>
                <td>
                    {{ $item->quantity }}
                </td>
                <td>
                    {{ $item->price }}
                </td>
                <td>
                    @foreach ($item->categories as $category)
                        {{ $category->name }},
                    @endforeach
                </td>
                <td>
                    <div class="carousel-container image-column">
                        @foreach ($item->images as $image)
                            <div>
                                <img src="{{ asset('/storage/' . $image->url) }}" alt="Image" style="max-width: 200px;">
                            </div>
                        @endforeach
                    </div>
                </td>
                <td>
                    <a href="{{ route('items.edit', $item->id) }}" class="btn">Edit</a>
                    <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection