@extends('layouts.base')
@section('page.title', 'Фенстер Техник')
@section('content')
<div class="main-container">
    <div class="feed">
        <div class="news-block">
            <div class="current-post">
                <a href="/news/" ><h2>Свежие новости</h2></a>
                <div>
                    @foreach($latestNews as $newsItem)
                        <input name="news-tab" id="news-tab{{ $newsItem-> id}}" type="radio" checked />
                        <section class="tab-content">
                            <a href="/news/{{ $newsItem->id }}">
                                <h2>{{ $newsItem-> title }} </h2>
                                <p>{{ $newsItem-> content }}</p>
                            </a>
                        </section>
                   @endforeach
                </div>
            </div>
            <div class="posts-list tabs-container">
                @foreach($latestNews as $newsItem)
                    <label for="news-tab{{ $newsItem-> id}}"> {{ $newsItem-> title }} </label>
                @endforeach
            </div>
        </div>
        <div class="special-offer-block">
            <div class="current-post">
                <a href="/special-offers/" ><h2>Свежие акции</h2></a>
                <div class="offer">
                    @foreach($latestSpecialOffers as $offersItem)
                        <input name="offers-tab" id="offers-tab{{ $offersItem-> id}}" type="radio" checked />
                        <section class="tab-content">
                            <a href="/special-offers/{{ $newsItem->id }}" >
                                <h2> {{ $offersItem-> title }} </h2>
                                <p> {{ $offersItem-> description }}</p>
                            </a>
                        </section>
                    @endforeach
                </div>
            </div>
            <div class="posts-list tabs-container">
                @foreach($latestSpecialOffers as $offersItem)
                    <label for="offers-tab{{ $offersItem-> id}}">{{ $offersItem-> title }}</label>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection