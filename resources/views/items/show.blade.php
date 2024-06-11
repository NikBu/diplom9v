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
                <h3>Количество: {{ $item->quantity }} шт.</h3>
                <h3>Цена: {{ $item->price }} руб.</h3>   
                @auth
                    <form action="{{ route('add.item.to.order') }}" method="POST">
                        @csrf
                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                        <label for="quantity">Количество:</label>
                        <input type="number" name="quantity" id="quantity" value="1">
                        <button type="submit" class="btn-red">Добавить в корзину</button>
                    </form>
                    {{-- ! Окно уведомления / Modal window --}}
                    @if (session('success'))
                        @include('components.notification-window', ['modalId' => 'successModal', 'modalTitle' => 'Успешно добавлено в корзину', 'modalContent' => 'Товар успешно добавлен в вашу корзину.'])
                    @endif   
                @else
                    <p>Пожалуйста <a href="{{ route('login') }}">войдите</a> , чтобьы добавить товар в корзину.</p>
                @endauth
                <h3>Описание:</h3> 
                {!! $item->description !!}
                </div>
            </div>
        </div>
    </div>
@endsection
