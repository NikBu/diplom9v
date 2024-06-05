@include('includes.header')
<title>@yield('page.title', config('app.name'))</title>
<div class="main-container">
<main>
    {{ $slot }}
</main>
</div>
@include('includes.footer')