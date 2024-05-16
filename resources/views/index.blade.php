@extends('layouts.base')
@section('page.title', 'Фенстер Техник')
@section('content')
<div class="container">
            <h2>Latest News</h2>
            @if($newestNews)
                <h3>{{ $newestNews->title }}</h3>
                <p>{{ $newestNews->content }}</p>
                <p>Published on: {{ $newestNews->published_at->format('d M Y') }}</p>
            @else
                <p>No news available.</p>
            @endif
            <h2>Latest Special Offer</h2>
            @if($newestSpecialOffer)
                <h3>{{ $newestSpecialOffer->title }}</h3>
                <p>{{ $newestSpecialOffer->description }}</p>
                <p>Offer valid from {{ $newestSpecialOffer->start_date->format('d M Y') }} to {{ $newestSpecialOffer->end_date->format('d M Y') }}</p>
            @else
                <p>No special offers available.</p>
            @endif
</div>
@endsection