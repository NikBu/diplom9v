@extends('layouts.admin')
@section('page.title', 'Акции')
@section('content')
    <h2 class="float-left">Акции</h2>
    <a class="btn-create float-right" href="{{ route('offers.create') }}">Создать акцию</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Заголоов</th>
                <th>Описание</th>
                <th>Дата начала</th>
                <th>Дата окончания</th>
                <th>Товары</th>
                <th>Опции</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($specialOffers as $key => $offer)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $offer->title }}</td>
                <td>{{ $offer->description }}</td>
                <td>{{ $offer->start_date }}</td>
                <td>{{ $offer->end_date }}</td>
                <td>
                    @foreach ($offer->items as $item)
                        {{ $item->name }} ({{ $item->pivot->discount_amount }}% off),
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('offers.edit', $offer->id) }}" class="btn">Изменить</a>
                    <form action="{{ route('offers.destroy', $offer->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены, что хотите удалить данную акцию?')">Удалить</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection