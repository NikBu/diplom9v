<head>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
</head>
<title>@yield('page.title', config('app.name'))</title>
<header>
    <a href="/" class="main-logo"><img class="logo-img" src="{{ asset('images/logo_ft1.png') }}" alt="Логотип"></a>
    <h class="centered">Фенстер Техник</h>
</header>
<main>
@yield('content')
</main>
@include('includes.footer')