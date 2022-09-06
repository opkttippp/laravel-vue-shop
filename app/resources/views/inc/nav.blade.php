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

@include('inc.header');
{{--<div class="top fixed-top">--}}
{{--    <p><img src="{{ asset('images/leaf_1.jpg') }}" width="25px" alt="leaf"></p>--}}
{{--    <p><a class="nav-link" href={{ route('home') }}>Mysite</a></p>--}}
{{--</div>--}}
<nav class="header navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">

    <div class="container-fluid product_menu">
        <div class="nav-item">
            <a class="nav-link" style="color: #00b44e;" href={{ route('home') }}>Главная</a>
        </div>
        <div class="nav-item">
            <a class="nav-link" href={{ route('green') }}>Уведомления</a>
        </div>
        <div class="nav-item">
            <a class="nav-link" href={{ route('review') }}>Отзывы</a>
        </div>
        <div class="nav-item">
            <a class="nav-link" href={{ route('reviewAdd') }}>Добавить</a>
        </div>
        <div class="nav-item">
            <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#myModal">Categories</a>
        </div>
                    <div class="showScroll"></div>
{{---------------------------------------------------------------------------------------------}}
        @role('admin')
        <div class="reg_auth">
            <i class="nav-icon far fas fa-table"></i>
            {{ Auth::user()->name }}
            <a href="{{ route('logout') }}">Выход</a>
        </div>
        @endrole
        @role('manager')
        <div class="reg_auth">
            {{ Auth::user()->name }}
            <a href="{{ route('logout') }}">Выход</a>
        </div>
        @endrole
        @role('user')
        <div class="reg_auth">
            <img src="{{asset('storage/'.Auth::user()->avatar)}}" alt="image" height="20px">
            <a href="{{ route('user.index',['user' => Auth::user()]) }}">
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

        <form class="d-flex" method="get" action="{{route('product.search')}}">
                            @csrf
            <input id="search" value="" onkeyup="checkEvent()" aria-label="Search" name='search'
                   autocomplete="off">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
</nav>
{{-----------------------------Modal Category-------------------------------------}}
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Product selection</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
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
                                               href="{{ asset(route('category.show', ['category' => 1])) }}">TV</a></li>
                                        <li><a class="dropdown-item list"
                                               href="{{ asset(route('category.show', ['category' => 2])) }}">Mobile</a>
                                        </li>
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

{{-----------------------------Modal Search-------------------------------------}}
<div class="modal" id="myModal_Search">
    <div class="arrow-5 arrow-5-top">
        <div class="modal-dialog">
            <div class="modal-content">
                <ul class="results navbar-nav me-auto m-2 p-2 mb-lg-0">
                </ul>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
/*---------------------------live Search-----------------------------------*/
    const modal = document.querySelector('#myModal_Search');

    async function checkEvent() {
        let val = document.querySelector("#search").value;
        if (val.length >= 3) {
            console.log(val);
            const rawResponse = await fetch('/api/search/',
                {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({val})
                });
            let content = await rawResponse.json();
            console.log(content);
            if (content.length !== 0) {
                let output = '';
                for (let cont of content) {
                    let Html = '<li>' + cont.title + '</li>';
                    output += Html;
                }
                const res = document.querySelector('.results');
                res.innerHTML = output;
                modal.style = ('display:block');
                EventAdd(res);
            } else resultHide();
        } else resultHide();

        function resultHide() {
            document.querySelector('.results').innerHTML = '';
            modal.style = ('display:none');
        }

        function addInSearch(event) {
            document.querySelector('#search').value = event;
            resultHide();
        }

        document.onclick = function () {
            resultHide();
        }

        function EventAdd(res) {
            for (let i = 0; i < res.children.length; i++) {
                res.children[i].addEventListener('click', event => {
                    addInSearch(event.target.innerText);
                });
            }
        }
    }

/*---------------------------Top hide-----------------------------------*/
    document.addEventListener('DOMContentLoaded', function () {
        const top = document.querySelector('.top');
        const header = document.querySelector('.header');

        window.addEventListener('scroll', function () {

            if (pageYOffset > 0) {
                top.style = 'margin-top: -2rem; transition: all 0.3s;'
                header.style = 'margin-top: 0px; transition: all 0.3s;'
            } else {
                top.style = 'margin-top: 0px; transition: all 0.3s;'
                header.style = 'margin-top: 1.9rem; transition: all 0.3s;'
            }
        });
    });

/*----------------------------------------------------------------------*/

</script>
