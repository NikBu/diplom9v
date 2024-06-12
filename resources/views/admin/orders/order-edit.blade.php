@extends('layouts.admin')
@section('page.title', 'Редактирование заказа')
@section('content')
    <h2 class="float-left">Редактирование заказа</h2>
    <form action="{{ route('orders.update', $order->id) }}" method="post">
        @csrf
        @method('PUT')
        
        <label for="client" class="input-field">Клиент</label>
        <input type="text" class="input-field" value="{{ $order->user->name }}" readonly>
        
        <label for="order_id" class="input-field">ID заказа</label>
        <input type="text" class="input-field" value="{{ $order->id }}" readonly>
  
        <label for="total_price" class="input-field">Общая сумма</label>
        <input type="text" name="total_price" class="input-field" value="{{ $order->total_amount }}" required>
        
        <h3>Выберите товары и количество:</h3>
        <table class="items-table">
            <thead>
                <tr>
                    <th>Товар</th>
                    <th>Количество</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>
                            <input type="number" name="quantity[{{ $item->id }}]" class="input-field" value="{{ $order->orderItems->where('item_id', $item->id)->first()->quantity ?? 0 }}">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        
        
        <label for="status" class="input-field">Статус</label>
        <select name="status" class="input-field" required>
            <option value="Доставка" @if($order->status == 'Доставка') selected @endif>Доставка</option>
            <option value="Завершён" @if($order->status == 'Завершён') selected @endif>Завершен</option>
            <option value="Обработка" @if($order->status == 'Обработка') selected @endif>Ожидание</option>
            <option value="Корзина" @if($order->status == 'Корзина') selected @endif>Корзина</option>
            <option value="Отменён" @if($order->status == 'Отменён') selected @endif>Отменён</option>

            <!-- Add more status options as needed -->
        </select>
        
        <label for="order_date" class="input-field">Дата заказа</label>
        <input type="date" name="order_date"" class="input-field" value="{{ \Carbon\Carbon::parse($order->order_date)->format('Y-m-d') }}" required>

        <button type="submit" class="btn">Обновить</button>
    </form>
    
@endsection