23@extends('layouts.admin')
@section('page.title', 'Заказы')
@section('content')
    <h2 class="float-left">Заказы</h2>
    <a class="btn-create float-right" href="{{ route('orders.create') }}">Создать заказ</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Пользователь</th>
                <th>Дата заказа</th>
                <th>Общая сумма</th>
                <th>Статус</th>
                <th>Опции</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $key => $order)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->order_date }}</td>
                <td>{{ $order->total_amount }}</td>
                <td>{{ $order->status }}</td>
                <td>
                    <a href="{{ route('orders.edit', $order->id) }}" class="btn">Изменить</a>
                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены, что хотите удалить данный заказ?')">Удалить</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection