<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    {{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}

    <title>@yield('title')</title>
    <!-- Fonts -->
    <link rel="icon" href="/images/favicone/favic.ico" type="image/x-icon">
    <!-- Styles -->
    <link href={{ asset('css/style.css') }} rel="stylesheet" type="text/css">
    <!-- Scripts -->
    <script src={{ asset('js/style.js') }}></script>

</head>
<body>
<header>
    @include('inc.header')
</header>
<main>
    <aside>
        {{--        @if (Auth::user() && Auth::user()->name === 'super-user')--}}
        {{--            @include('inc.admin_aside')--}}
        {{--        @else--}}
        {{--            @include('inc.aside')--}}
        {{--        @endif--}}

        @role('admin')
            @include('inc.admin_aside')
        @else
            @include('inc.aside')
        @endrole

    </aside>
    <section>
        @include('inc.message')
        @yield('main_content')
    </section>
</main>
<footer>
    @include('inc.footer')
</footer>
</body>
</html>




