@extends('layouts.admin')

@section('page.title', 'Категории ')

@section('content')
    <h2 class="float-left">Category</h2>
    <a class="btn-create float-right" href="{{ route('category.create') }}" >Create Category</a>
    <table class="table">
        <thead class=>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Ancestors</th>
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
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
