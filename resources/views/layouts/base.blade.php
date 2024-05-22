@include('includes.header')
<title>@yield('page.title', config('app.name'))</title>
@yield('content')
@include('includes.footer')