@extends('layouts.admin')

@section('page.title', 'Категории ')

@section('content')
    <h2 class="float-left">Категории</h2>
    <a class="btn-create float-right" href="{{ route('categories.create') }}" >Создать категорию</a>
    <table class="table">
        <thead class=>
            <tr>
                <th>#</th>
                <th>Название</th>
                <th>Категория-Родитель</th>
                <th>Опции</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $key => $category)
            <tr>
                <td>
                    {{ $key + 1 }}
                </td>
                <td>
                    {{ $category->name }}
                </td>
                <td>
                    @foreach ($category->ancestors as $item)
                        {{ $item->name }},
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn">Изменить</a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены, что хотите удалить данную категорию?')">Удалить</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
