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
                <p>{{ $offer->description }}</p>
                <p><strong>С:</strong> {{ $offer->start_date->format('M d, Y') }}</p>
                <p><strong>По:</strong> {{ $offer->end_date->format('M d, Y') }}</p>
                </a>
            </section>
        @endforeach
    </div>
</div>
@endsection