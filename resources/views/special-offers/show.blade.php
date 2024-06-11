@extends('layouts.base')
<title>{{ $specialOffer->title }}</title>
@section('content')
<div class="main-container">
    <a href="{{ route('main.special_offers.index') }}">Все акции</a>
    <section class="special-offer-article">
        <h1>{{ $specialOffer->title }}</h1>
        <span>Предложение действительно с {{ $specialOffer->start_date->format('d M Y') }} По {{ $specialOffer->end_date->format('d M Y') }}</span>
        {!! $specialOffer->description !!}
        @if($specialOffer->items->isNotEmpty())
            <h2>Акция распростроняется на следующие товары:</h2>
            <ul>
                @foreach($specialOffer->items as $item)
                    <li><a href="{{ route('main.item.show', $item->id) }}">{{ $item->name }}</a></li>
                @endforeach
            </ul>
        @endif
    </section>
</div>
@endsection