<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="/images/favicone/favic.ico" type="image/x-icon">

    <link href={{ asset('css/style.css') }} rel="stylesheet" type="text/css">
    <script src={{ asset('js/style.js') }}></script>

</head>
<body>
<header>
    @include('inc.header')
</header>
<main>
    <section>
        @include('inc.message')
        @yield('main_content')
    </section>
    <aside>
        @include('inc.aside')
    </aside>
</main>
<footer class="footer mt-auto text-white-50 fixed-bottom bg-dark">
    @include('inc.footer')
</footer>

</body>
</html>




