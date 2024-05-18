@extends('layouts.base')
@section('page.title', 'Фенстер Техник')
@section('content')
<div class="main-container">
    <div class="news-block">
        <h2>Latest News</h2>
        @if($newestNews)
            <div class="latest-news">
                <h3>{{ $newestNews->title }}</h3>
                <p>{{ $newestNews->content }}</p>
                <p>Published on: {{ $newestNews->published_at->format('d M Y') }}</p>
            </div>
            <div class="previous-posts">
                <h3>Previous Posts</h3>
                <ul>
                    @foreach($previousNews as $previousPost)
                        <li>{{ $previousPost->title }}</li>
                    @endforeach
                </ul>
            </div>
        @else
            <p>No news available.</p>
        @endif
    </div>
    <div class="special-offer-block">
        <h2>Latest Special Offer</h2>
        @if($newestSpecialOffer)
            <div class="latest-offer">
                <h3>{{ $newestSpecialOffer->title }}</h3>
                <p>{{ $newestSpecialOffer->description }}</p>
                <p>Offer valid from {{ $newestSpecialOffer->start_date->format('d M Y') }} to {{ $newestSpecialOffer->end_date->format('d M Y') }}</p>
            </div>
            <div class="previous-offers">
                <h3>Previous Offers</h3>
                <ul>
                    @foreach($previousOffers as $previousOffer)
                        <li>{{ $previousOffer->title }}</li>
                    @endforeach
                </ul>
            </div>
        @else
            <p>No special offers available.</p>
        @endif
    </div>
</div>
@endsection