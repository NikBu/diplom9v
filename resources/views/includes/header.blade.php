<!DOCTYPE html>
<head>
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
</head>
<body>
<div class="wrapper">
  <div class="top_navbar">
    <div class="hamburger">☰</div>
    <header>
        <a href="/" class="main-logo"><img class="logo-img" src="{{ asset('images/logo_ft1.png') }}" alt="Логотип"></a>
        <h class="centered">Фенстер Техник</h>
        <a href="/about">О компании</a>
        <a href="/contacts">Контакты</a>
        <a href="/link2">Link 2</a>
        <a href="/link3">Link 3</a>
        <a href="/link4">Link 4</a>
    </header>
  </div>
  <div class="sidebar">
    <ul class="accordion">
        @foreach($categories as $category)
            <li class="accordion-item">
                <a href="/categories/{{$category->id }}" class="accordion-header">{{ $category->name }}<span class="arrow"></span></a>
                <ul class="sub-categories">
                    @foreach($category->children as $child)
                        <li><a href="/categories/{{$child->id }}">{{ $child->name }}</a></li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</div>