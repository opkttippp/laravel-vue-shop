<style>
    .menu-list {
        position: relative;
        width: 30%;
        height: 60px;
    }

    .menu_categ {
        position: absolute;
        width: 100%;
        height: 65%;
        left: 130px;
        bottom: 0;
        right: 0;
        top: 18px;
        padding: 5px;
        display: none;
    }

    .menu-list > ul > li > a:hover, .list:hover {
        color: #10707f;
    }

    .menu-list > ul > li > .menu_category:hover .menu_categ {
        display: block;
    }
</style>


{{--<div class="top fixed-top">--}}
{{--    <p><img src="{{ asset('images/leaf_1.jpg') }}" width="25px" alt="leaf"></p>--}}
{{--    <p><a class="nav-link" href={{ route('home') }}>Mysite</a></p>--}}
{{--</div>--}}
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
                <li class="nav-item">
                    <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#myModal">Categories</a>
                </li>
            </ul>
            <div class="showScroll"></div>
            {{----------------------------------------------------------------------------------------------}}
            @role('admin')
            <div class="reg_auth">
                <i class="nav-icon far fas fa-table"></i>

                {{--                <a href="{{ url('/admin/users') }}">Users</a>--}}
                {{--                <a href="{{ url('/admin/roles') }}">Roles</a>--}}
                <a href={{url('/admin')}}>admin</a>
                <a href="{{ route('logout') }}">Выход</a>
            </div>
            @endrole
            @role('manager')
            <div class="reg_auth">
                <a href="{{url('/admin')}}">manager</a>
                <a href="{{ route('logout') }}">Выход</a>
            </div>
            @endrole
            @role('user')
            <div class="reg_auth">
                <a href='#'>
                    <img src='/images/user.jpg' width='20' height='20' alt='user'>
                </a>
                <a href="#">
                    {{ Auth::user()->name }}
                </a>
                <a href="{{ route('logout') }}">Выход</a>
            </div>
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
            <ul class="navbar-nav nav-flex-icon cart">
                @if(Cart::content())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('cart.index')}}">
                        <span class="badge red mr-1">
                            {{Cart::count()}}
                        </span>
                            <i class="fa fa-shopping-cart"></i>
                            <span class="clearfix d-none d-sm-inline-block">
                            Cart
                        </span>
                        </a>
                    </li>
                @endif
            </ul>
            <form class="d-flex">
                <input class="form-control me-2 search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Product selection</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body d-flex flex-row">
                <div class="menu-list">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li><a class="dropdown-item menu_goods" href="{{ url('/product') }}">Товары</a></li>
                        <li>
                            <div class="menu_category"><a class="dropdown-item"
                                                          href="{{ asset(route('category.index')) }}">Категории
                                    <img class='i' style="margin-left: 40px;"
                                         src="{{ asset('images/icon-slider-right.png') }}" alt="" height="10"
                                         width="10">
                                </a>
                                <div class="menu_categ navbar-nav me-auto mb-2 mb-lg-0">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li><a class="dropdown-item list"
                                               href="{{ asset(route('category.show', ['id' => 1])) }}">TV</a></li>
                                        <li><a class="dropdown-item list"
                                               href="{{ asset(route('category.show', ['id' => 2])) }}">Mobile</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li><a class="dropdown-item menu_manuf" href="{{ route('manufactor.index') }}">Производители</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    document.addEventListener('DOMContentLoaded', function () {

        const top = document.querySelector('.top');

        window.addEventListener('scroll', function () {
            let scrol = document.querySelector('.showScroll').innerHTML = pageYOffset + 'px';

            if(scrol > 0)
            {
                // top.style = 'disp
            }

        });
    });
</script>
