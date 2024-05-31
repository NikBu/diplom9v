@extends('layouts.base')
<title>{{ $item->name }}</title>
@section('content')
    <div class="main-container">
        <div class="item-container">
            <h1 class="item-name">{{ $item->name }}</h1>
            
            <div class="item-categories">
                @foreach ($item->categories as $category)
                    <a href="/categories/{{$category->id }}" class="category-tag">{{ $category->name }}</a>
                @endforeach
            </div>
            
            <div class="item-details">
                <div class="carousel-container">
                    @foreach ($item->images as $image)
                        <div>
                            <img class="item-image" src="{{ asset('/storage/' . $image->url) }}" alt="Image">
                        </div>
                    @endforeach
                </div>
                <p>Quantity: {{ $item->quantity }}</p>
                <p>Price: ${{ $item->price }}</p>   
                <p>Description: {{ $item->description }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
