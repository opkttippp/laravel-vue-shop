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
    <link href={{ asset('css/app.css') }} rel="stylesheet" type="text/css">
{{--    <link href={{ asset('css/name.css') }} rel="stylesheet" type="text/css">--}}
<!-- Scripts -->
    <script src={{ asset('js/style.js') }}></script>

</head>
<style>
    body {
        display: grid;
        grid-template-areas:
    "header header header"
    "nav nav nav"
    "aside section section"
    "footer footer footer";
        grid-template-rows: 5% 5% 1fr 5%;
        grid-template-columns: 20% 1fr;
        grid-gap: 5px;
        height: 100vh;
        margin: 0;
    }

    @media all and (max-width: 575px) {
        body {
            grid-template-areas:
      "header"
      "nav"
      "aside"
      "section"
      "footer";
            grid-template-rows: 80px 80px 1fr 1fr 80px;
            grid-template-columns: 1fr;
        }
    }

    header, footer, section, nav, aside, div {
        padding: 5px;
        /*background: gold;*/
    }

    #pageHeader {
        grid-area: header;
    }

    #pageFooter {
        grid-area: footer;
    }

    #mainSection {
        grid-area: section;
    }

    #mainNav {
        grid-area: nav;
    }

    #mainAside {
        grid-area: aside;
    }
</style>
<body>
<header id="pageHeader">
    @include('inc.headerer')
</header>
<nav id="mainNav">
    @include('inc.header')
</nav>
<main>
    <aside id="mainAside">
        @role('admin|manager')
        @include('inc.admin_aside')
        @else
            @include('inc.aside')
            @endrole
    </aside>
    <section id="mainArticle">
        @include('inc.message')
        @yield('main_content')
    </section>
</main>
<footer id="pageFooter">
    @include('inc.footer')
</footer>
</body>
