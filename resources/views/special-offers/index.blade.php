@extends('layouts.base')
<title>Акции</title>
@section('content')
<div class="main-container">
    <h1>Последние акции</h1>
    <div class="special-offers-list">
        @foreach($specialOffers as $offer)
            <section class="article-preview">
                <a href="/special-offers/{{ $offer->id }}">
                <h2>{{ $offer->title }}</h2>
                <p>{{ strip_tags($offer->description) }}</p>
                <p><strong>С:</strong> {{ $offer->start_date}}</p>
                <p><strong>По:</strong> {{ $offer->end_date}}</p>
                </a>
            </section>
        @endforeach
    </div>
    {{ $specialOffers->links('vendor.pagination.default') }}
</div>
@endsection