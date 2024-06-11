@extends('layouts.base')
<title>Мои заказы</title>
@section('content')
    <div class="main-container">
        <h1 class="gradient-header">Мои заказы</h1>
        @foreach ($orders as $order)
            <div class="order-card">
                <div class="order-header">
                    <h2>ID Заказа: {{ $order->id }}</h2>
                    <p>Дата Заказа: {{ $order->order_date }}</p>
                    <p>Состояние Заказа: {{ $order-> status }}</p>
                </div>
                <div class="order-body">
                    <p>Общая сумма: {{ $order->total_amount }} руб.</p>
                    <h3>Товары:</h3>
                    <ul class="item-list">
                        @foreach ($order->orderItems as $orderItem)
                            <li class="item">
                                <a href="{{ route('main.item.show', ['itemID' => $orderItem->item->id]) }}">{{ $orderItem->item->name }}</a>
                                <span class="item-info">Количество: {{ $orderItem->quantity }} | Цена:{{ $orderItem->price }} руб.</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
@endsection