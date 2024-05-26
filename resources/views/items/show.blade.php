@extends('layouts.base')
@section('page.title', 'Фенстер Техник')
@section('content')
    <div class="item-details">
        <h2>{{ $item->name }}</h2>
        <img src="{{ asset($item->image) }}" alt="{{ $item->name }}">
        <p>Description: {{ $item->description }}</p>
        <p>Price: ${{ $item->price }}</p>
        <p>Quantity: {{ $item->quantity }}</p>
    </div>
@endsection