<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="icon" href="./public/images/favicone/favic.ico" type="image/x-icon">

    <link href={{ asset('css/style.css') }} rel="stylesheet" type="text/css">


</head>
<body>
<header>
    @role('admin|manager')
    @include('inc.nav')
    @endrole
</header>
<main>
    <aside>
        @role('admin|manager')
        @include('inc.admin_aside')
        @endrole
    </aside>
    <section>
            @include('inc.message')
            @yield('main_content')
        </div>
    </section>
</main>
<footer>
    @role('admin|manager')
    @include('inc.footer')
    @endrole
</footer>
<script src={{ asset('js/style.js') }} ></script>
</body>
</html>




