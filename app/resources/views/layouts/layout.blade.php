<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    {{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}

    <title>@yield('title')</title>
    <!-- Fonts -->
    <link rel="icon" href="/images/favicone/favic.ico" type="image/x-icon">
    <!-- Styles -->
    <link href={{ asset('css/style.css') }} rel="stylesheet" type="text/css">
{{--    <link href={{ asset('css/name.css') }} rel="stylesheet" type="text/css">--}}
<!-- Scripts -->

</head>
<body>

<div id="app">
    <header>
        @include('inc.nav')
    </header>
    <main>
        <aside>
            @role('admin|manager')
            @include('inc.admin_aside')
            @else
                @include('inc.aside')
                @endrole
        </aside>
        <section>
            <div class="container">
                <cart-modal></cart-modal>
                @include('inc.message')
                @yield('main_content')
            </div>
        </section>
    </main>
    <footer>
        @include('inc.footer')
    </footer>
</div>
<script src={{ asset('js/style.js') }}></script>
</body>
</html>




