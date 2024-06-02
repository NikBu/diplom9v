@extends('layouts.admin')
@section('page.title', 'Edit Special Offer')
@section('content')
    <h2 class="float-left">Edit Special Offer</h2>
    <form action="{{ route('offers.update', $offer->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="title" class="input-field">Title</label>
        <input type="text" name="title" class="input-field" value="{{ $offer->title }}" required>
        <label for="description" class="input-field">Description</label>
        <textarea name="description" class="input-field" rows="4" required>{{ $offer->description }}</textarea>
        <label for="start_date" class="input-field">Start Date</label>
        <input type="date" name="start_date" class="input-field" value="{{ \Carbon\Carbon::parse($offer->start_date)->format('Y-m-d') }}" required>
        <label for="end_date" class="input-field">End Date</label>
        <input type="date" name="end_date" class="input-field" value="{{ \Carbon\Carbon::parse($offer->end)->format('Y-m-d') }}" required>
        <label for="items" class="input-field">Select Items</label>
        <select name="items[]" multiple class="input-field">
            @foreach ($items as $item)
                <option value="{{ $item->id }}" {{ $offer->items->contains($item->id) ? 'selected' : '' }}>{{ $item->name }}</option>
            @endforeach
        </select>
        <label for="discount_amount" class="input-field">Discount Amount (%)</label>
        <input type="number" name="discount_amount" class="input-field" value="{{ $offer->discount_amount }}" required>
        <button type="submit" class="btn">Update Special Offer</button>
    </form>
@endsection