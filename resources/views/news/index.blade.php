@extends('layouts.base')
<title>Новости</title>
@section('content')
<div class="main-container">
    <h1>Последние новости:</h1>
        <div class="news-list">
            @foreach($news as $newsItem)
                <section class="article-preview">
                    <a href="/news/{{ $newsItem->id }}">
                        <h2>{{ $newsItem-> title }} </h2>
                        <p>{{ strip_tags($newsItem->content) }}</p>
                        <span>{{$newsItem -> published_at}}</span>
                    </a>
                </section>
            @endforeach
        </div>
        {{ $news->links('vendor.pagination.default') }}
</div>
@endsection