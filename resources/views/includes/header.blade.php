<html lang = "ru">
<head>
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
<div class="wrapper">
  <div class="top_navbar">
    <div class="hamburger">☰</div>
    <header>
        <a href="/" class="main-logo"><img class="logo-img" src="{{ asset('images/logo_ft1.png') }}" alt="Логотип"></a>
         <!-- Search bar -->
        <form action="/search" method="GET" class="search-bar">
            <input type="text" name="query" placeholder="Поиск...">
            <button type="submit">Поиск</button>
        </form>
        <!-- End of search bar -->
        <h class="centered">Фенстер Техник</h>
        <a href="/about">О компании</a>
        <a href="/contacts">Контакты</a>
        <a href="/vacancies">Вакансии</a>
        <a href="/orders"><i class="fa-solid fa-cart-shopping"></i></a>
        @auth
            <div class="profile-options">
                <a href="/profile">Личный кабинет</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="header-btn">Выйти</button>
                </form>
           </div>
         @else
            <a href="/login">Войти</a>
            <a href="/register">Зарегистрироваться</a>
        @endauth
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