<div class="top fixed-top">
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
                    <a class="nav-link" href={{ route('reviewAdd') }}>Добавить</a>
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
            {{----------------------------------------------------------------------------------------------}}
            @role('admin')
            <div class="reg_auth">
                <a href="{{ url('/admin/users') }}">Users</a>
                <a href="{{ url('/admin/roles') }}">Roles</a>
                <a href={{url('/admin')}}>admin</a>
                <a href="{{ route('logout') }}">Выход</a>
            </div>
            @endrole
            @role('manager')
            <div class="reg_auth">
                <a href="{{ url('/admin/roles') }}">Roles</a>
                <a href="#">manager</a>
                <a href="{{ route('logout') }}">Выход</a>
            </div>
            @endrole
            @role('user')
            {{--@auth()--}}
            <div class="reg_auth">
                <a href='#'>
                    <img src='/images/user.jpg' width='20' height='20' alt='user'>
                </a>
                <a href="#">
                    {{ Auth::user()->name }}
                </a>
                <a href="{{ route('logout') }}">Выход</a>
            </div>
            {{--@endauth--}}
            @endrole
            @guest
                <div class="reg_auth">
                    <a href="{{ route('login') }}" class="btn btn-secondary">
                        Войти
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-secondary">
                        Регистрация
                    </a>
                </div>
            @endguest
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

        </div>
    </div>
</nav>
