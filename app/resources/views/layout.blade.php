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
    <nav class=" header navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
        <div class="container-fluid">
            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/greeting">Уведомления</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/4/Vasa">Профиль</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/review">Отзывы</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown"
                           aria-expanded="false">Настройка</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown01">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>

                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>

            </div>
        </div>
    </nav>
</header>
<main>
    <section>
        @yield('main_content')
    </section>
    <aside>
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="#"> Start Bootstrap </a></li>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Shortcuts</a></li>
                <li><a href="#">Overview</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </aside>
</main>
<footer class="footer mt-auto text-white-50 fixed-bottom bg-dark">
    <p>Cover template
        <a href="https://getbootstrap.com/" class="text-white">Bootstrap
        </a>
        <a href="https://twitter.com/mdo" class="text-white">@mdo
        </a>
    </p>
</footer>

</body>
</html>




