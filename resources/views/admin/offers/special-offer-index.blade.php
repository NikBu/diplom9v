@extends('layouts.admin')
@section('page.title', 'Акции')
@section('content')
    <h2 class="float-left">Special Offers</h2>
    <a class="btn-create float-right" href="{{ route('offers.create') }}">Create Special Offer</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Items</th>
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
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection