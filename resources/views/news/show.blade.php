@extends('layouts.base')
<title>{{$news->title}}</title>
@section('content')
<div class="main-container">
    <a href="{{route('main.news.index')}}">Все новости</a>
    <section class="news-article">
        <h1>{{ $news-> title }}</h2>
            <span class="article-date">{{$news->published_at}}</span>
        {!! $news-> content !!}
    </section>
</div>
@endsection