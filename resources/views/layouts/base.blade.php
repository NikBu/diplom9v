@include('includes.header')
<title>@yield('page.title', config('app.name'))</title>
<main>
@yield('content')
</main>
@include('includes.footer')