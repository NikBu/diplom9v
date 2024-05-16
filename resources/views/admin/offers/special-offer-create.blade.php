@extends('layouts.admin')
@section('page.title', 'Создание акции')
@section('content')
    <h2 class="float-left">Create Special Offer</h2>
    <form action="{{ route('offers.store') }}" method="post">
        @csrf
        <label for="title" class="input-field">Title</label>
        <input type="text" name="title" class="input-field" required>
        <label for="description" class="input-field">Description</label>
        <textarea name="description" class="input-field" rows="4" required></textarea>
        <label for="start_date" class="input-field">Start Date</label>
        <input type="date" name="start_date" class="input-field" required>
        <label for="end_date" class="input-field">End Date</label>
        <input type="date" name="end_date" class="input-field" required>
        
        <label for="items" class="input-field">Select Items</label>
        <select name="items[]" multiple class="input-field">
            @foreach ($items as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        
        <label for="discount_amount" class="input-field">Discount Amount (%)</label>
        <input type="number" name="discount_amount" class="input-field" required>
        
        <button type="submit" class="btn">Create Special Offer</button>
    </form>
@endsection