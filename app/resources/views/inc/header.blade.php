<div class="top">
    <p><img src="/images/leaf_1.jpg" width="25px" alt="leaf"></p>
    <p><a class="nav-link" href={{ route('home') }}>Mysite</a></p>
</div>
<nav class="header navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
    <div class="container-fluid">
        <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href={{ route('home') }}>Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href={{ route('green') }}>Уведомления</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href={{ route('review') }}>Отзывы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href={{ route('check') }}>Добавить</a>
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
                <li>

                </li>
            </ul>

            <div class="reg_auth">
                <a href="#" class="btn btn-secondary">
                    Войти
                </a>
                <a href="#" class="btn btn-secondary">
                    Регистрация
                </a>
            </div>

            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

        </div>
    </div>
</nav>
