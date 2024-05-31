@extends('layouts.base')
<title>{{$currentCategory->name}}</title>
@section('content')
<div class="main-container">
    <div class="category-details">
        <h2>{{ $currentCategory->name }}</h2>
        <p>{{ $currentCategory->description }}</p>
    </div>
    <div class="item-block">
        @foreach($items as $item)
            <div class="item">
                <a href="/items/{{$item->id}}">
                @if($item->firstImage())
                    <img src="{{ asset('/storage/' . $item->firstImage()->url) }}" alt="{{ $item->name }}">
                @else
                    <img src="{{ asset('storage/images/placeholder.png') }}" alt="No Image Available">
                @endif
                <h3>{{ $item->name }}</h3>
                </a>
                <p>Quantity: {{ $item->quantity }}</p>
                <p>Price: ${{ $item->price }}</p>
            </div>
        @endforeach
    </div>

    {{ $items->links('vendor.pagination.default') }}
</div>
@endsection