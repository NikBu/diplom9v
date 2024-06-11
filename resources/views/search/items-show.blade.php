@extends('layouts.base')
<title>Результаты поиска: {{ $query }}</title>
@section('content')
<div class="main-container">
    <h2>Результаты поиска: {{ $query }}</h2>
    @if($results->isEmpty())
        <p>По вашему запросу ничего не найдено.</p>
    @else
        <div class="item-block">
            @foreach($results as $item)
                <div class="item">
                    <a href="/items/{{$item->id}}">
                        @if($item->firstImage())
                            <img src="{{ asset('/storage/'. $item->firstImage()->url) }}" alt="{{ $item->name }}">
                        @else
                            <img src="{{ asset('storage/images/placeholder.png') }}" alt="Изображение недоступно">
                        @endif
                        <h3>{{ $item->name }}</h3>
                    </a>
                    <p>Количество: {{ $item->quantity }} шт</p>
                    <p>Цена: {{ $item->price }} руб.</p>
                </div>
            @endforeach
        </div>
        {{ $results->links('vendor.pagination.default') }}
    @endif
</div>
@endsection