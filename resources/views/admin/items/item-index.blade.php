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
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection